<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\EventController;

//routes
Route::get('/', [EventController::class, 'index']);
Route::post('/events', [EventController::Class, 'store']);
Route::get('/events/{i}', [EventController::Class, 'show']);
Route::delete('/events/{id}', [EventController::Class, 'destroy']);

Route::get('/contact', function () {
    return view('contact');
});

//if user is log -> then this views is accessible
Route::get('/events/edit/{id}', [EventController::Class, 'edit'])->middleware('auth');
Route::get('/create', [EventController::class, 'create'])->middleware('auth');
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');
Route::put('/events/update/{id}', [EventController::Class, 'update'])->middleware('auth');
Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');



