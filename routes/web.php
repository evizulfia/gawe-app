<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

Route::get('/',[WebsiteController::class, 'index'])->name('home');
Route::get('/dashboard',[WebsiteController::class, 'dashboard'])->name('dashboard');

Route::get('/login',[WebsiteController::class, 'login'])->name('login');
Route::get('/registration',[WebsiteController::class, 'registration'])->name('registration');
Route::post('/registration_submit',[WebsiteController::class, 'registration_submit'])->name('registration_submit');

Route::get('/registration/verify/{token}/{email}',[WebsiteController::class, 'registration_verify']);
Route::get('/forget-password',[WebsiteController::class, 'forget_password'])->name('forget_password');
