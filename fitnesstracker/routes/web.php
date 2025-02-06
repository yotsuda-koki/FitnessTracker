<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/workouts', [App\Http\Controllers\WorkoutController::class, 'index'])->name('workouts.index');
    Route::get('/workouts/create', [App\Http\Controllers\WorkoutController::class, 'create'])->name('workouts.create');
    Route::post('/workouts', [App\Http\Controllers\WorkoutController::class, 'store'])->name('workouts.store');
    Route::get('/workouts/{workout}', [App\Http\Controllers\WorkoutController::class, 'show'])->name('workouts.show');
    Route::get('/workouts/{workout}/edit', [App\Http\Controllers\WorkoutController::class, 'edit'])->name('workouts.edit');
    Route::put('/workouts/{workout}', [App\Http\Controllers\WorkoutController::class, 'update'])->name('workouts.update');
    Route::delete('/workouts/{workout}', [App\Http\Controllers\WorkoutController::class, 'destroy'])->name('workouts.destroy');

    Route::get('/userInfo', [App\Http\Controllers\UserInfoController::class, 'index'])->name('userInfo.index');
    Route::get('/userInfo/edit', [App\Http\Controllers\UserInfoController::class, 'edit'])->name('userInfo.edit');
    Route::put('/userInfo', [App\Http\Controllers\UserInfoController::class, 'update'])->name('userInfo.update');

    Route::get('/progress', [App\Http\Controllers\ProgressController::class, 'index'])->name('progress.index');
});
