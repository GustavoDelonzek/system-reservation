<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('hotels', HotelController::class);
    Route::apiResource('hotels.rooms', RoomController::class)->scoped()->except(['show', 'destroy', 'update']);
    Route::apiResource('hotels.reservations', ReservationController::class)->scoped()->except(['show', 'destroy', 'update']);
    Route::get('filter', [HotelController::class, 'filter']);
});

Route::get('reservations/{reservation}', [ReservationController::class, 'show']);
Route::get('rooms/{room}', [RoomController::class, 'show']);


