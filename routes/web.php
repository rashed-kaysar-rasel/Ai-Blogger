<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AIWriterController;
use App\Http\Controllers\Admin\AdminDashboardController;

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

Route::get('/', function () {
    return view('landing-page');
})->name('home');



Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('dashboard','index')->name('admin.dashboard');
        Route::get('stream-data','streamData')->name('stream');
    });
    Route::controller(AIController::class)->group(function () {
        Route::get('test-integration','testIntegration')->name('test.integration');
        Route::get('stream-text','streamTextOutput')->name('stream.text.output');
    });

    Route::controller(AIWriterController::class)->group(function () {
        Route::get('article-writer','articleWriter')->name('article.writer');
    });
});


require __DIR__.'/auth.php';
