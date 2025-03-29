<?php

require __DIR__.'/../vendor/autoload.php'; // Load Composer's autoloader

$app = require_once __DIR__.'/../bootstrap/app.php'; // Bootstrap the Laravel application

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class); // Get the HTTP kernel

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture() // Capture the incoming request
);

$response->send(); // Send the response back to the browser

$kernel->terminate($request, $response); // Terminate the application