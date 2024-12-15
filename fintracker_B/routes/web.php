<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\FineController;


Route::get('/', function () {
    return view('welcome');
});

// Protect all routes using auth middleware
Route::middleware('auth')->group(function () {
    // Dashboard Route
    Route::get('/dashboard', [dashboardController::class, 'dashboard'])->name('dashboard');


    // Members Routes
    Route::resource('members', MemberController::class);

    // Deposits Routes
    Route::resource('deposits', DepositController::class);
    Route::get('deposits/member/{member}', [DepositController::class, 'showMemberDeposits'])->name('deposits.show');

    // Expenses Routes
    Route::resource('expenses', ExpenseController::class);

    // Investments Routes
    Route::resource('investments', InvestmentController::class);

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Fine calculator
    Route::get('finecalculator', [FineController::class, 'calculator'])->name('fine');
});

// Authentication Routes
require __DIR__.'/auth.php';
