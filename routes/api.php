<?php

use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
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
// user controller routes
Route::post("register", [UserController::class, 'register']);
Route::post("login", [UserController::class, 'login']);

// sanctum auth middleware routes
Route::middleware('auth:api')->group(function() {
    Route::get("user", [UserController::class, "user"]);
    Route::resource('tasks', TaskController::class);    //patch/put   =>  x-www-form-urlencode
});