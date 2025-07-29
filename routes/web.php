<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Roles\Index as RolesIndex;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [AuthController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/loginv', [AuthController::class, 'loginUser'])->name('loginUser');

Route::get('/inicio', Dashboard::class)->name('inicio');
Route::get('/roles', RolesIndex::class)->name('seguridad.roles.index');
