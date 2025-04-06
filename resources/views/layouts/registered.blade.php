<!DOCTYPE html>
<html lang="en">
<head>
  <style type="text/css">
    /* Your existing styles */
    .div_center {
        text-align: center;
        padding-top: 40px;
    }
    .h2_font {
        font-size: 40px;
        padding-bottom: 40px;
    }
    .table_container {
        width: 90%;
        margin: auto;
        padding: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
    }
    table th, table td {
        border: 1px solid #ccc;
        padding: 12px 15px;
        text-align: left;
        color: black !important; /* Force black text */
    }
    table th {
        background-color: #28a745;
        color: white !important; /* Keep headers white */
    }
    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    
    /* Add this to ensure text stays black */
    body, .content-wrapper, .table_container, table, tbody, tr, td {
        color: black !important;
    }
</style>
    
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content-wrapper">
            <h2 class="h2_font div_center">REGISTERED FARMERS</h2>
            <div class="table_container">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Farmer Name</th>
                            <th>Phone Number</th>
                            <th>Location</th>
                            <th>National ID</th>
                            <th>Type of Farming</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($farmers as $index => $farmer)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $farmer->name }}</td>
                                <td>{{ $farmer->phone }}</td>
                                <td>{{ $farmer->location }}</td>
                                <td>{{ $farmer->national_id }}</td>
                                <td>{{ ucfirst($farmer->farming_type) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align:center;">No farmers registered yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.script')
    @include('admin.css')
</body>
</html>
