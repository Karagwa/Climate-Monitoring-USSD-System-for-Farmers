<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }
        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .form_container {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .form_container label {
            color: black; /* Ensure labels are visible */
            font-weight: bold;
        }
        .form_container input, .form_container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            color: black;
        }
        .form_container button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form_container button:hover {
            background-color: #218838;
        }
        .input_color{
            color:black;
        }
    </style>

    
</head>
<body>
  @include('admin.header')
    @include('admin.sidebar')
   
    <div class="main-panel">
        <div class="content-wrapper">
            <h2 class="h2_font div_center">ADD FARMER</h2>
            <div class="form_container">
                
<form action="{{ route('admin.farmers.store') }}" method="POST">

                    @csrf
                    <label for="name">Farmer Name:</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" required>
                    
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required>
                    
                    <label for="national_id">National ID:</label>
                    <input type="text" id="national_id" name="national_id" required>
                    
                    <label for="farming_type">Type of Farming:</label>
                    <select id="farming_type" name="farming_type" required>
                        <option value="crop">Crop Farming</option>
                        <option value="livestock">Livestock Farming</option>
                        <option value="mixed">Mixed Farming</option>
                    </select>
                    
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
  
     @include('admin.css')
     @include('admin.script')
    
</body>
</html>
