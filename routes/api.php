<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerActivityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/user', [UserController::class, 'store']); // Done tested
Route::get('/keys', [ServiceController::class, 'keys']); // Done tested
Route::get('/services', [ServiceController::class, 'services']); // Done tested

Route::middleware('authorized')->group(function () {

    // Users Endpoint
    Route::group(['prefix' => 'user'], function () {
        Route::get('/{id}', [UserController::class, 'show']); // Done and tested
        Route::post('/update', [UserController::class, 'update']); // Done and tested
        Route::get('/profile/{id}', [ProfileController::class, 'show']); // Done and tested
        Route::post('/profile/create', [ProfileController::class, 'store']); // Done and tested
        Route::put('/profile/update/{id}', [ProfileController::class, 'update']); // Done and tested
    });

    // Customers Endpoint
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/', [CustomerController::class, 'index']); // Done and tested
        Route::post('/create', [CustomerController::class, 'store']); // Done and tested
        Route::put('/update/{id}', [CustomerController::class, 'update']); // Done and tested
        Route::get('/{id}', [CustomerController::class, 'show']); // Done and tested
        Route::delete('/{id}', [CustomerController::class, 'destroy']);


        // Customer's activity endpoint
        Route::group(['prefix' => 'activity'], function () {
            Route::get('/', [CustomerActivityController::class, 'index']);
            Route::post('/create/{id}', [CustomerActivityController::class, 'store']);
            Route::get('/{id}', [CustomerActivityController::class, 'show']);
            Route::put('/{id}', [CustomerActivityController::class, 'update']);
            Route::delete('/{id}', [CustomerActivityController::class, 'destroy']); 
        });

    });
   
    
    

});