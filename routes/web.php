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
// Route::get('/reset', function (){
//     Artisan::call('route:clear');
//     Artisan::call('cache:clear');
//     Artisan::call('config:clear');
//     Artisan::call('config:cache');
//     return 'Done';
// });
// Route::get('/migrate', function (){
//     Artisan::call('migrate');
//     return 'Migrated :)';
// });
// Route::get('/key-generate', function (){
//     Artisan::call('key:generate');
//     return 'Done';
// });

Auth::routes(["register"=>false]);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::group(['prefix' => 'artists'], function() {
        Route::get('/list', [App\Http\Controllers\ArtistController::class, 'list'])->name('/admin/artists/list');
        Route::get('/artist', [App\Http\Controllers\ArtistController::class, 'artist'])->name('/admin/artists/artist');
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard.index');
    })->name('/dashboard');
    Route::get('/clients', function () {
        return view('dashboard.clients.index');
    });

    Route::prefix('dashboard')->group(function () {
        Route::get('/artists', [App\Http\Controllers\ArtistController::class, 'index'])->name('/dashboard/artists');
        Route::group(['prefix' => 'artists'], function() {
            Route::get('/list', [App\Http\Controllers\ArtistController::class, 'list'])->name('/dashboard/artists/list');
            Route::post('/store', [App\Http\Controllers\ArtistController::class, 'store'])->name('/dashboard/artists/store');
            Route::get('/edit', [App\Http\Controllers\ArtistController::class, 'edit'])->name('/dashboard/artists/edit');
            Route::post('/update', [App\Http\Controllers\ArtistController::class, 'update'])->name('/dashboard/artists/update');
            Route::get('/delete', [App\Http\Controllers\ArtistController::class, 'delete'])->name('/dashboard/artists/delete');
            Route::post('/store-asset', [App\Http\Controllers\ArtistAssetController::class, 'storeAsset'])->name('/dashboard/artists/store-asset');
            Route::post('/show-asset', [App\Http\Controllers\ArtistAssetController::class, 'showAsset'])->name('/dashboard/artists/show-asset');
            Route::post('/delete-asset', [App\Http\Controllers\ArtistAssetController::class, 'deleteAsset'])->name('/dashboard/artists/delete-asset');
        });
        
        Route::get('/assets', [App\Http\Controllers\AssetController::class, 'index'])->name('/dashboard/assets');
        Route::group(['prefix' => 'assets'], function() {
            Route::post('/store-asset', [App\Http\Controllers\AssetController::class, 'storeAsset'])->name('/dashboard/artists/store-asset');
            Route::post('/show-asset', [App\Http\Controllers\AssetController::class, 'showAsset'])->name('/dashboard/artists/show-asset');
            Route::post('/delete-asset', [App\Http\Controllers\AssetController::class, 'deleteAsset'])->name('/dashboard/artists/delete-asset');
        });
    });
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
