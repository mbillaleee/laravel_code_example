<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
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
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/chart', [ChartController::class, 'index'])->name('chart.index');

Route::get('/high-chart', [ChartController::class, 'HighChart'])->name('high.chart.index');

Route::get('/pie-chart', [ChartController::class, 'pieChart'])->name('pie.chart.index');
