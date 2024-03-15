<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

# ==================================================== Homepage Group Route ===================================================
Route::get('/', function () {
    return view('welcome');
});

# ================================================ Authentication Routes Group ================================================
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

# ================================================ Administrator Route Group ==================================================
Route::get('administrator' , [AdminController::class , 'index']);
# ================================================ Offline Student Route Group ================================================

# ================================================ Online Student Route Group =================================================

# ================================================ School/Instance Route Group ================================================

# ==================================================== Another Route Group ====================================================
Route::middleware('auth')->get('/home', function () {
    $roles = Auth::user()->roles->pluck('name');
    return redirect($roles[0]);
})->name('authenticated');

require_once __DIR__ . '/farah.php';
require_once __DIR__ . '/nesa.php';