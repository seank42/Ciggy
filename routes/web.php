<?php

use App\Http\Controllers\CiggyController;
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
