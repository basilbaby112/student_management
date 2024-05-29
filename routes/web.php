<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\MarkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('students.index');
});

// Grouping routes for StudentController
Route::controller(StudentController::class)->group(function () {
    Route::get('/students', 'index')->name('students.index');
    Route::get('/students/create', 'create')->name('students.create');
    Route::post('/students', 'store')->name('students.store');
    Route::get('/students/{student}/edit', 'edit')->name('students.edit');
    Route::put('/students/{student}', 'update')->name('students.update');
    Route::delete('/students/{student}', 'destroy')->name('students.destroy');
});

Route::controller(MarkController::class)->group(function () {
    Route::get('/marks', 'index')->name('marks.index');
    Route::get('/marks/create', 'create')->name('marks.create');
    Route::post('/marks', 'store')->name('marks.store');
    Route::get('/marks/{mark}/edit', 'edit')->name('marks.edit');
    Route::put('/marks/{mark}', 'update')->name('marks.update');
    Route::delete('/marks/{mark}', 'destroy')->name('marks.destroy');
});
