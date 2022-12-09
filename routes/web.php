<?php

use App\Http\Controllers\Admin\CiggyController as AdminCiggyController;
use App\Http\Controllers\User\CiggyController as UserCiggyController;
use App\Http\Controllers\Admin\ManufacturerController as AdminManufacturerController;
use App\Http\Controllers\User\ManufacturerController as UserManufacturerController;
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

Route::get('/dashboard', function () {
    return redirect('/../ciggies');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::resource('/ciggies', CiggyController::class)->middleware(['auth']);
require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/home/manufacturers', [App\Http\Controllers\HomeController::class, 'manufacturerIndex'])->name('home.manufacturer.index');
//this will create all the routes for ciggies
//and the routes will only be avaliable when a user is logged in
Route::resource('/admin/ciggies', AdminCiggyController::class)->middleware(['auth']) ->names ('admin.ciggies');

Route::resource('/user/ciggies', UserCiggyController::class)->middleware(['auth'])->names('user.ciggies')->only(['index','show']);

Route::resource('/admin/manufacturer', AdminManufacturerController::class)->middleware(['auth']) ->names('admin.manufacturer');

Route::resource('/user/manufacturer', UserManufacturerController::class)->middleware(['auth'])->names('user.manufacturer')->only(['index','show']);

