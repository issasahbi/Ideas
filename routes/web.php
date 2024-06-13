<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IdeaController;

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

Route::get('/', [DashboardController::class, 'index'])->name("dashboard");
Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');
Route::delete('/ideas/{id}', [IdeaController::class, 'destroy'])->name('ideas.destroy');
Route::get('/profile', [ProfileController::class, 'index']);
