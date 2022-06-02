<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\MemeberController;
use App\Http\Controllers\ScheduleImportController;

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/schedules', [ScheduleImportController::class, 'index'])->middleware(['auth'])->name('schedules.index');
Route::post('/schedules/import', [ScheduleImportController::class, 'import'])->middleware(['auth'])->name('schedule.import');
Route::get('/add-user',[MemeberController::class,'add_member']);

Route::get('/add-event',[EventsController::class,'add_users']);