<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\EventController;

//routes
Route::get('/', [EventController::class, 'index']);
Route::post('/events', [EventController::Class, 'store']);
Route::get('/events/{i}', [EventController::Class, 'show']);
Route::get('/contact', function () {
    return view('contact');
});


Route::get('/create', [EventController::class, 'create'])->middleware('auth');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
