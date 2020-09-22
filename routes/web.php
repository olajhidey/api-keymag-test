<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('mailable', function () {
    $user = App\Models\User::find(1);

    return new App\Mail\WelcomeMail($user);
});
Route::get("verifyEmail/{token}/{id}", [UserController::class, 'verify'])->name('verify');
