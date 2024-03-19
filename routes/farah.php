<?php

use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\JournalController;
use Illuminate\Support\Facades\Route;

Route::get('division', [DivisionController::class, 'index'])->name('division.index');
Route::post('division/store', [DivisionController::class, 'store'])->name('division.store');
Route::patch('division/{division}', [DivisionController::class, 'update'])->name('division.update');
Route::delete('division/{division}', [DivisionController::class, 'destroy'])->name('division.delete');

Route::get('announcement', function() {
    return view('admin.page.announcement.index');
});

Route::get('absent', function() {
    return view('admin.page.absent.index');
});

Route::put('journal/{journal}', [JournalController::class, 'update']);
Route::get('siswa-online/jurnal', [JournalController::class, 'studentOnline']);

Route::get('siswa-online/materi', function() {
    return view('student_online.material.index');
});
Route::get('siswa-online/materi/detail', function() {
    return view('student_online.material.detail');
});
Route::get('siswa-online/materi/detail/detail-jawaban', function() {
    return view('student_online.material.answer-detail');
});
Route::get('siswa-online/materi/detail/pelajari', function() {
    return view('student_online.material.learn-more');
});