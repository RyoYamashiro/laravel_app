<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\Sample\SampleController;
use App\Http\Controllers\CsvController;
use App\Http\Middleware\HelloMiddleware;
use App\Services\Eat;


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

Route::get('/sample', [SampleController::class, 'index']);
Route::get('/sample/other', [SampleController::class, 'other']);
Route::get('/hello/baby', [HelloController::class, 'baby'])->name('baby');
Route::middleware([HelloMiddleware::class])->group(function(){
    Route::get('/hello', [HelloController::class, 'index'])->name('hello');
    Route::post('/hello', [HelloController::class, 'importCsv']);
    Route::get('/hello/other', [HelloController::class, 'other']);
    Route::get('/hello/baby', [HelloController::class, 'baby']);
});
Route::get('/setCsv', [CsvController::class, 'index']);
Route::post('/setCsv', [CsvController::class, 'importCsv'])->name('importCsv');
Route::post('/showCsv', [CsvController::class, 'showCsv'])->name('showCsv');
