<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [HomeController::class , 'index'])->name('home-page');
// Route::get('/login',function(){return view('auth.login');});
Route::get('/users', [AdminController::class , 'user']);
Route::get('/food_menu', [AdminController::class , 'foodMenu']);
Route::get('/delete-food-menu/{id}', [AdminController::class , 'deleteFoodMenu']);
Route::get('/update-food-menu/{id}', [AdminController::class , 'updateFoodMenu']);
Route::post('/update-food-item/{id}', [AdminController::class , 'updateFoodItem']);
Route::get('/reservations-page', [AdminController::class , 'reservationPage']);
Route::post('/upload_food', [AdminController::class , 'upload']);
Route::post('/reservation', [AdminController::class , 'reservation']);
Route::get('/delete_user/{id}', [AdminController::class , 'deleteUser']);
Route::get('/view-chef', [AdminController::class , 'viewChef']);
Route::post('/upload-chef', [AdminController::class , 'uploadChef']);
Route::get('/update-chef/{id}', [AdminController::class , 'updateChef']);
Route::post('/update-chef/{id}', [AdminController::class , 'updateFoodChef']);
Route::post('/delete-chef-food/{id}', [AdminController::class , 'updateFoodChef']);
Route::post('/add-cart/{id}', [HomeController::class , 'addCart']);

Route::get('/redirects', [HomeController::class , 'redirects']);

Route::middleware([  
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
