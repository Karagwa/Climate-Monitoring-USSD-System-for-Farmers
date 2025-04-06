<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Climate Companion - @yield('title')</title>
    @include('admin.css')
</head>
<body class="login-bg">
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('admin.script')
</body>
</html>