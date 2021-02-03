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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\AgentController::class, 'show'])->name('home');

//Displaying available bus routes in index page
Route::get('/index', [App\Http\Controllers\RouteController::class, 'show'])->name('index');

// Roles
Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role');
Route::get('/addrole', [App\Http\Controllers\RoleController::class, 'create'])->name('addrole');
Route::post('/addrole-submit', [App\Http\Controllers\RoleController::class, 'store'])->name('addrole-submit');
Route::get('/editrole/{id}', [App\Http\Controllers\RoleController::class, 'editrole'])->name('editrole');
Route::post('/updaterole/{id}', [App\Http\Controllers\RoleController::class, 'updaterole'])->name('updaterole');
Route::get('/deleterole/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('deleterole');

//Permissions
Route::get('/addPermission', [App\Http\Controllers\PermissionController::class, 'create'])->name('addPermission');
Route::post('/addPermission-submit', [App\Http\Controllers\PermissionController::class, 'store'])->name('addPermission-submit');
Route::get('/editPermission/{id}', [App\Http\Controllers\PermissionController::class, 'edit'])->name('editPermission');
Route::post('/updatePeprmission/{id}', [App\Http\Controllers\PermissionController::class, 'update'])->name('updatePermission');
// Route::get('/deleterole/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('deleterole');

//Users
Route::get('/adduser', [App\Http\Controllers\UserController::class, 'create'])->name('adduser');
Route::post('/adduser-submit', [App\Http\Controllers\UserController::class, 'store'])->name('adduser-submit');
Route::get('/edituser/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edituser');
Route::post('/updateuser/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('updateuser');
Route::get('/deleteuser/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('deleteuser');

//CRUD of Bus 
Route::get('/bus', [App\Http\Controllers\BusController::class, 'index'])->name('bus');
Route::get('/addbus', [App\Http\Controllers\BusController::class, 'create'])->name('addbus');
Route::post('/addbus-submit', [App\Http\Controllers\BusController::class, 'store'])->name('addbus-submit');
Route::get('/editbus/{id}', [App\Http\Controllers\BusController::class, 'edit'])->name('editbus');
Route::post('/updatebus/{id}', [App\Http\Controllers\BusController::class, 'update'])->name('updatebus');
Route::get('/deletebus/{id}', [App\Http\Controllers\BusController::class, 'destroy'])->name('deletebus');

//CRUD of Routes
Route::get('/route', [App\Http\Controllers\RouteController::class, 'index'])->name('route');
Route::get('/addroute', [App\Http\Controllers\RouteController::class, 'create'])->name('addroute');
Route::post('/addroute-submit', [App\Http\Controllers\RouteController::class, 'store'])->name('addroute-submit');
Route::get('/editroute/{id}', [App\Http\Controllers\RouteController::class, 'edit'])->name('editroute');
Route::post('/updateroute/{id}', [App\Http\Controllers\RouteController::class, 'update'])->name('updateroute');
Route::get('/deleteroute/{id}', [App\Http\Controllers\RouteController::class, 'destroy'])->name('deleteroute');
Route::get('/find-district/{id}', [App\Http\Controllers\RouteController::class, 'findDisWithStateID'])->name('find-disctrict');

//Reservation
Route::get('/book/{id}', [App\Http\Controllers\CustomerController::class, 'index'])->name('book');
Route::post('/booknow', [App\Http\Controllers\CustomerController::class, 'store'])->name('booknow');
Route::get('/morebooking/{id}', [App\Http\Controllers\AgentController::class, 'booking'])->name('morebooking');
Route::get('/confirmbooking/{id}', [App\Http\Controllers\AgentController::class, 'confirm'])->name('confirmbooking');







