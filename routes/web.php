<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('auth.login');
// });


// Route::get('/', function () {
//     return view('main-sidebar');
// });

// Auth::routes();
//Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles',RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionsController::class);
   
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
