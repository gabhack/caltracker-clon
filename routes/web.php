<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\FoodController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('meal')->group(function () {
    Route::get('/', [MealController::class, 'index']);
    Route::post('/', [MealController::class, 'store']);
    Route::delete('/{id}', [MealController::class, 'destroy']);
});


Route::middleware('auth')->resource('food', FoodController::class)->names([
    'get' => 'food.build'
]);
