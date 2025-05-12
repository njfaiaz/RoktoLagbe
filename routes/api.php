<?php

use App\Http\Controllers\Admin\AdminController;
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


Route::get('/dashboard/user-stats', [AdminController::class, 'userStats']);
Route::get('/dashboard/blood-group-stats', [AdminController::class, 'bloodGroupStats']);
Route::get('/dashboard/user-location-stats', [AdminController::class, 'userLocationStats']);
Route::get('/dashboard/top-donors', [AdminController::class, 'topDonors']);
Route::get('/dashboard/blood-donation-stats', [AdminController::class, 'bloodDonationStats']);
