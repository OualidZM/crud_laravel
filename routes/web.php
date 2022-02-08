<?php

use App\Http\Controllers\contactsController;
use App\Http\Controllers\Controller;
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


Route::resource('dashboard', contactsController::class)->middleware(['auth']);

Route::fallback(function () {
    return redirect('dashboard');
});


Route::get('set_language/{lang}', [Controller::class, 'set_language'])->name('set_language');

require __DIR__.'/auth.php';
