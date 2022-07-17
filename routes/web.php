<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Show all listings
Route::get('/', [ListingController::class, 'index']);

// Show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Store edited form
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'delete'])->middleware('auth');

// Manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Show specific listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show register form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

// Show login form (name function is needed for redirection in auth -> redirect to login if not authorized)
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Show messages
Route::get('/messages/view', [MessageController::class, 'view'])->middleware('auth');

// Create (send) message
Route::post('/messages', [MessageController::class, 'create'])->middleware('auth');
