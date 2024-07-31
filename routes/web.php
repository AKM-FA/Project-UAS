<?php

// web.php
use App\Http\Controllers\ProjectController;

Route::get('/', [ProjectController::class, 'index']);
Route::post('/register', [ProjectController::class, 'register'])->name('register');
Route::post('/submit-link', [ProjectController::class, 'submitLink'])->name('submitLink');

