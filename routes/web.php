<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalSuppliers = \App\Models\Suppliers::count();
    $totalSeles = \App\Models\Seles::count();
    $salesToday = \App\Models\Seles::whereDate('created_at', today())->sum('total');
    $monthlySales = \App\Models\Seles::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->sum('total');
    $transactionsToday = \App\Models\Seles::whereDate('created_at', today())->count();
    $recentSeles = \App\Models\Seles::with('supplier')->latest()->take(5)->get();
    $recentSuppliers = \App\Models\Suppliers::latest()->take(5)->get();

    return view('dashboard', compact(
        'totalSuppliers', 'totalSeles', 'salesToday', 'monthlySales',
        'transactionsToday', 'recentSeles', 'recentSuppliers'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('suppliers', \App\Http\Controllers\SuppliersController::class);
    Route::resource('seles', \App\Http\Controllers\SelesController::class);
});

require __DIR__.'/auth.php';
