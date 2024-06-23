<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VocabularyController;
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

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth.backend'])->group(function(){
    Route::get('/login', [AuthController::class, 'index'])->name('login.index');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::group([
    'prefix' => 'admin',
    'middleware' => 'admin'
], function(){
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('admin.index');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/vocabulary', [AuthController::class, 'vocabulary'])->name('admin.vocabulary.index');

    //API
    Route::group(['prefix' => 'api'], function(){
        Route::group(['prefix' => 'vocabulary'], function(){
            Route::get('/get-all-items/{course}', [VocabularyController::class, 'getAllItems'])->name('api.vocabulary.get');
            Route::post('/store', [VocabularyController::class, 'store'])->name('api.vocabulary.store');
        });
    });
});

