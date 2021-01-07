<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("/auth", function (\Illuminate\Http\Request $request) {
    return 'Hello auth';
});

Route::middleware('auth:api')->get('/user', function () {
    $user = \Illuminate\Support\Facades\Auth::user();
    return $user->uid;
});
