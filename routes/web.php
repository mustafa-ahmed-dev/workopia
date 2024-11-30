<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::resource('jobs', JobController::class);
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
Route::get('/jobs/{id}', [JobController::class, 'show'])->whereNumber('id')->name('jobs.show');
Route::post('/jobs/{id}/bookmark', [JobController::class, 'bookmark'])->name('jobs.bookmark');
Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->whereNumber('id')->name("jobs.edit");
Route::put('/jobs/{id}', [JobController::class, 'update'])->whereNumber('id')->name('jobs.update');
Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->whereNumber('id')->name('jobs.destroy');
