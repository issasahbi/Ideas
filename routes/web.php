<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaLikeController;

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

Route::group(["prefix" => "ideas/", "middleware" => ["auth"]], function () {
    Route::post('', [IdeaController::class, 'store'])->name('ideas.store');
    Route::Get('/{idea}', [IdeaController::class, 'show'])->name('ideas.show')->withoutMiddleware('auth');
    Route::Get('/{idea}/edit', [IdeaController::class, 'edit'])->name('ideas.edit');
    Route::put('/{idea}', [IdeaController::class, 'update'])->name('ideas.update');
    Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');
    Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('ideas.comments.store');
});
Route::resource('users', UserController::class)->only('show');
Route::resource('users', UserController::class)->only('edit', 'update')->middleware('auth');
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');
Route::get('/', [DashboardController::class, 'index'])->name("dashboard");
Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');
Route::post('ideas/{idea}/like', [IdeaLikeController::class, 'like'])->middleware('auth')->name('ideas.like');
Route::post('ideas/{idea}/deslike', [IdeaLikeController::class, 'unlike'])->middleware('auth')->name('ideas.unlike');
Route::get('/feed', FeedController::class)->middleware('auth')->name("feed");




Route::get('/terms', function () {
    return view('terms');
})->name('terms');
