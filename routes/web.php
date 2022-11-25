<?php

use App\Http\Controllers\CiggyController as AdminCiggyController;
use App\Http\Controllers\User\BookController as UserCiggyController;
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

Route::resource('/ciggies', CiggyController::class)->middleware(['auth']);
require __DIR__.'/auth.php';

//this will create all the routes for ciggies
//and the routes will only be avaliable when a user is logged in
Route::resource('/admin/ciggies', AdminCiggyController::class)->middleware(['auth']) ->names ('admin.ciggies');

Route::resource('/user/ciggies', UserCiggyController::class)->middleware(['auth'])->names('user.ciggies')->only(['index','show']);

