<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/generate-import-file', function () {
    return response()->streamDownload(function () {
        echo 'name,email,password' . PHP_EOL;

        for ($i = 0; $i < 2000; $i++) {
            $name = fake()->name();
            $email = fake()->safeEmail();
            $password = fake()->password();

            echo "$name,$email,\"$password\"" . PHP_EOL;
        }
    }, 'generated-import-file.csv', [
        'Content-Type' => 'text/csv',
    ]);
});
