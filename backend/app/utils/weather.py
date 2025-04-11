import httpx
from datetime import datetime
from fastapi import HTTPException

API_KEY = "4f24d63dca7048f2a1b225649250304"
BASE_URL = "https://api.weatherapi.com/v1"

async def get_weather(location: str) -> dict:
    url = f"{BASE_URL}/current.json?key={API_KEY}&q={location}"
    try:
        async with httpx.AsyncClient() as client:
            response = await client.get(url)

            # If the request fails or the API returns a non-200 status
            response.raise_for_status()

            return response.json()
    except httpx.HTTPStatusError as http_err:
        raise HTTPException(status_code=500, detail=f"HTTP error occurred: {http_err}")
    except httpx.RequestError as req_err:
        raise HTTPException(status_code=500, detail=f"Request error occurred: {req_err}")
    except Exception as err:
        raise HTTPException(status_code=500, detail=f"An unexpected error occurred: {err}")

async def get_forecast(location: str, days: int) -> dict:
    url = f"{BASE_URL}/forecast.json?key={API_KEY}&q={location}&days={days}"
    try:
        async with httpx.AsyncClient() as client:
            response = await client.get(url)

            # If the request fails or the API returns a non-200 status
            response.raise_for_status()

            return response.json()
    except httpx.HTTPStatusError as http_err:
        raise HTTPException(status_code=500, detail=f"HTTP error occurred: {http_err}")
    except httpx.RequestError as req_err:
        raise HTTPException(status_code=500, detail=f"Request error occurred: {req_err}")
    except Exception as err:
        raise HTTPException(status_code=500, detail=f"An unexpected error occurred: {err}")

async def get_weather_alert(location: str) -> dict:
    url = f"{BASE_URL}/alerts.json?key={API_KEY}&q={location}"
    try:
        async with httpx.AsyncClient() as client:
            response = await client.get(url)

            # If the request fails or the API returns a non-200 status
            response.raise_for_status()

            return response.json()
    except httpx.HTTPStatusError as http_err:
        raise HTTPException(status_code=500, detail=f"HTTP error occurred: {http_err}")
    except httpx.RequestError as req_err:
        raise HTTPException(status_code=500, detail=f"Request error occurred: {req_err}")
    except Exception as err:
        raise HTTPException(status_code=500, detail=f"An unexpected error occurred: {err}")
