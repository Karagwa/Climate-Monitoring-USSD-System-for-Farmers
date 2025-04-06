from fastapi import APIRouter, Depends, Request, Form
from fastapi.responses import PlainTextResponse
from sqlmodel import Session, select
from app.database import get_session
from app.models import Farmer, USSDSession, WeatherData
from datetime import datetime
from app.utils.weather import get_weather, get_forecast

router = APIRouter()

@router.post("/ussd/")
async def ussd_callback(
    request: Request,
    sessionId: str = Form(...),
    serviceCode: str = Form(...),
    phoneNumber: str = Form(...),
    text: str = Form(...),
    session: Session = Depends(get_session)
):
    response = ""
    text = text.strip()
    menu_stack = text.split('*') if text else []

    # Get or create session
    db_session = session.exec(select(USSDSession).where(USSDSession.session_id == sessionId)).first()
    if not db_session:
        db_session = USSDSession(session_id=sessionId, farmer_id=None, last_step="INITIAL")
        session.add(db_session)
        session.commit()
        session.refresh(db_session)

    # Get or create farmer
    farmer = session.exec(select(Farmer).where(Farmer.phone == phoneNumber)).first()

    # Main menu
    if not menu_stack:
        if farmer:
            response = """CON Welcome back to ChapFarm
1. Get Weather Update
2. Report Farm Issue
3. Get Advice
4. View Weather Alerts"""
        else:
            response = """CON Welcome to Climate Monitoring
1. Register
2. Get Weather (Guest)"""
        db_session.last_step = "MAIN_MENU"
        session.add(db_session)
        session.commit()

    # Registration flow
    elif menu_stack[0] == "1" and not farmer:
        if len(menu_stack) == 1:
            response = "CON Enter your full name:"
            db_session.last_step = "REGISTER_NAME"
        elif len(menu_stack) == 2:
            response = "CON Enter your location:"
            db_session.last_step = "REGISTER_LOCATION"
            db_session.temp_data = {"name": menu_stack[1]}
        elif len(menu_stack) == 3:
            new_farmer = Farmer(
                name=db_session.temp_data["name"],
                phone=phoneNumber,
                location=menu_stack[2]
            )
            session.add(new_farmer)
            session.commit()
            response = f"""END Registration successful!
Name: {new_farmer.name}
Location: {new_farmer.location}
You can now access full features."""
            db_session.farmer_id = new_farmer.id
            db_session.last_step = "REGISTER_COMPLETE"
        session.add(db_session)
        session.commit()

    # Weather flow
    elif (menu_stack[0] == "1" and farmer) or menu_stack[0] == "2":
        if len(menu_stack) == 1:
            response = """CON Weather Options:
1. Current Weather
2. 3-Day Forecast"""
            db_session.last_step = "WEATHER_MENU"
        elif len(menu_stack) == 2:
            location = farmer.location if farmer else None
            if not location:
                response = "CON Enter your location:"
                db_session.last_step = f"WEATHER_LOCATION_{menu_stack[1]}"
            else:
                try:
                    if menu_stack[1] == "1":
                        weather = await get_weather(location)
                        current = weather.get("current", {})
                        condition= current.get("condition",{}).get("text","NA")
                        temp_c= current.get("temp_c",0)
                        precip_mm= current.get("precip_mm",0)
                        response = f"""END Current Weather in {location}:
Temp: {temp_c}°C
Rain: {precip_mm}mm"""
                    elif menu_stack[1] == "2":
                        forecast = await get_forecast(location, 3)
                        forecast = forecast.get("forecast", {}).get("forecastday", [])
                        forecast_text = ""
                        for day in forecast[:3]:
                            date = day.get("date", "")
                            condition = day.get("day", {}).get("condition", {}).get("text", "")
                            max_temp = day.get("day", {}).get("maxtemp_c", "N/A")
                            min_temp = day.get("day", {}).get("mintemp_c", "N/A")
                            forecast_text += f"\n{date} - {condition}: {min_temp}°C to {max_temp}°C"
                    response = f"""END 3-Day Forecast for {location}:{forecast_text}"""
                    db_session.last_step = "WEATHER_COMPLETE"

                except Exception as e:
                    response = "END Error fetching weather data. Please try again later."
            

        elif len(menu_stack) == 3:
            location = menu_stack[2]
            try:
                    if menu_stack[1] == "1":
                        weather = await get_weather(location)
                        current = weather.get("current", {})
                        condition= current.get("condition",{}).get("text","NA")
                        temp_c= current.get("temp_c",0)
                        precip_mm= current.get("precip_mm",0)
                        response = f"""END Current Weather in {location}:
Temp: {temp_c}°C
Rain: {precip_mm}mm"""
                    elif menu_stack[1] == "2":
                        forecast = weather.get("forecast", {}).get("forecastday", [])
                        forecast_text = ""
                        for day in forecast[:3]:
                            date = day.get("date", "")
                            condition = day.get("day", {}).get("condition", {}).get("text", "")
                            max_temp = day.get("day", {}).get("maxtemp_c", "N/A")
                            min_temp = day.get("day", {}).get("mintemp_c", "N/A")
                            forecast_text += f"\n{date} - {condition}: {min_temp}°C to {max_temp}°C"
                    response = f"""END 3-Day Forecast for {location}:{forecast_text}"""
                    db_session.last_step = "GUEST WEATHER_COMPLETE"

            except Exception as e:
                response = "END Error fetching weather data. Please try again later."

    else:
        response = "END Invalid option. Please try again."

    return PlainTextResponse(response)
