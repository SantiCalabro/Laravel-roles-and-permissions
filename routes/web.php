<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;

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

Route::group(['middleware' => ['auth']], function () { // Se aplica el middleware a todo el grupo de rutas
    Route::resource('roles', RoleController::class); //resource() genera todas las posibilidades del CRUD sin necesidad declararlas una por una
    Route::resource('users', UserController::class); //Cuando se usa resource, primero va el recurso y luego el controller
    Route::resource('blogs', BlogController::class); //Es posible usar resource si al controller lo creaste con la flag --resource
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
