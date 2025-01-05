<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

// Route to show the welcome page
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Routes for authentication
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// Logout route
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes (requires authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Define the route for showing the edit profile form
    Route::get('/edit-profile', [ProfileController::class, 'showEditProfileForm'])->name('editProfile');

    // Define the route for updating the profile
    Route::post('/update-profile', [ProfileController::class, 'updateProfile'])->name('updateProfile');

    // Define the route for updating the profile picture
    Route::post('/update-profile-picture', [ProfileController::class, 'updateProfilePicture'])->name('updateProfilePicture');
});
