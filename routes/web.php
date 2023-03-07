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
Route::get('/reset', function (){
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    return 'Done';
});
Route::get('/key-generate', function (){
    Artisan::call('key:generate');
    return 'Done';
});

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/carlos', [App\Http\Controllers\ArtistsController::class, 'artistCarlos'])->name('carlos');
Route::get('/aida', [App\Http\Controllers\ArtistsController::class, 'artistAida'])->name('aida');
Route::get('/mario', [App\Http\Controllers\ArtistsController::class, 'artistMario'])->name('mario');
Route::get('/rekzone', [App\Http\Controllers\ArtistsController::class, 'artistRekzone'])->name('rekzone');
Route::get('/lukas', [App\Http\Controllers\ArtistsController::class, 'artistLukas'])->name('lukas');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard.index');
    });
    Route::get('/clients', function () {
        return view('dashboard.clients.index');
    });
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
