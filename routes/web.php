<?php

use App\Livewire\Auth\Login;
use App\Livewire\Dashboard\Main;
use App\Livewire\Occupant\Create;
use App\Livewire\Occupant\Edit;
use App\Livewire\Occupant\Index;
use App\Livewire\Occupant\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// BACKEND
Route::middleware('auth', 'verified')->group(function(){
    Route::get('/', Main::class);
    Route::get('/occupant', Index::class);
    Route::get('/occupant/create', Create::class);
    Route::get('/occupant/{occupant}/view', View::class);
    Route::get('/occupant/{occupant}/edit', Edit::class);
});

// AUTH
Route::get('/login', Login::class)->name('login');
Route::get('/logout', function(){
    Auth::logout();
    return redirect()->to('login');
});
