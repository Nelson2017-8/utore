<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\Auth\AuthController;
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

// API routes
Route::prefix('api/v1')->group(function () {
    // Auth routes
	Route::prefix('auth')->group(function () {
		Route::controller(AuthController::class)->group(function () {
            Route::post('login', 'login');
            Route::post('register', 'register');
            Route::post('logout', 'logout');
            Route::post('refresh', 'refresh');
        });
		Route::post('user-data', [AuthController::class, 'userProfile']);
		Route::post('profile/update/{id}', [ProfileController::class, 'update']);
	});
});

// Dashboard routes
Route::prefix('dashboard')->middleware('auth')->group(function () {
	Route::view('/', 'dashboard');
	Route::view('/profile', 'dashboard');
	Route::view('/statistics', 'dashboard');
	Route::view('/shopping', 'dashboard');
});

// Web routes
Route::view('/', 'spa');
Route::view('/home', 'spa');
Route::view('/cart', 'spa');
Route::view('/shop', 'spa');
Route::view('/login', 'spa')->name('login');
Route::view('/register', 'spa')->name('register');
Route::view('/forgot', 'spa')->name('forgot');
Route::view('/reset', 'spa')->name('reset');
Route::get('/terms', function (){
	$md = file_get_contents(resource_path('markdown/es/terms.md'));
	$md = Str::of($md)->markdown();
	return view('terms', ['md' => $md]);
});
Route::get('/conditions', function (){
	$md = file_get_contents(resource_path('markdown/es/conditions.md'));
	$md = Str::of($md)->markdown();
	return view('terms', ['md' => $md]);
});

// Forms routes
Route::prefix('postman')->group(function () {
	Route::view('/register', 'postman', ['form' => 'register']);
	Route::view('/login', 'postman', ['form' => 'login']);
});

Route::post('users', function(){
	echo 'hola mundo';
});
