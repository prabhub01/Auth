<?php

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();
//CRUD of Bus 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\AgentController::class, 'show'])->name('home');
Route::get('/addbus', [App\Http\Controllers\AgentController::class, 'create'])->name('addbus');
Route::post('/submit', [App\Http\Controllers\AgentController::class, 'store'])->name('submit');
Route::get('/editbus/{id}', [App\Http\Controllers\AgentController::class, 'edit'])->name('editbus');
Route::post('/updatebus/{id}', [App\Http\Controllers\AgentController::class, 'update'])->name('updatebus');
Route::get('/deletebus/{id}', [App\Http\Controllers\AgentController::class, 'destroy'])->name('deletebus');

//displaying routes in index page
Route::get('/', [App\Http\Controllers\AgentController::class, 'displayroute'])->name('index');

//CRUD of Routes
Route::get('/addroute', [App\Http\Controllers\AgentController::class, 'createroute'])->name('addroute');
Route::post('/submitdata', [App\Http\Controllers\AgentController::class, 'addroute'])->name('submitdata');
Route::get('/editroute/{id}', [App\Http\Controllers\AgentController::class, 'editroute'])->name('editroute');
Route::post('/updateroute/{id}', [App\Http\Controllers\AgentController::class, 'updateroute'])->name('updateroute');
Route::get('/deleteroute/{id}', [App\Http\Controllers\AgentController::class, 'destroyroute'])->name('deleteroute');

//Reservation
Route::get('/book/{id}', [App\Http\Controllers\CustomerController::class, 'index'])->name('book');
Route::post('/booknow', [App\Http\Controllers\CustomerController::class, 'store'])->name('booknow');
Route::get('/morebooking/{id}', [App\Http\Controllers\AgentController::class, 'showbooking'])->name('morebooking');
Route::get('/confirmbooking/{id}', [App\Http\Controllers\AgentController::class, 'confirm'])->name('confirmbooking');








