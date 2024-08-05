<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProfessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('skills/create', [SkillController::class, 'create'])->name('skills.create');
    Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
    Route::get('/skills/{skill:slug}/edit', [SkillController::class, 'edit'])->name('skills.edit');
    Route::put('/skills/{skill:slug}', [SkillController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{skill:slug}', [SkillController::class, 'destroy'])->name('skills.delete');
});
Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
Route::get('/skills/{skill:slug}', [SkillController::class, 'show'])->name('skills.show');


Route::middleware('auth')->group(function () {
    Route::get('professions/create', [ProfessionController::class, 'create'])->name('professions.create');
    Route::post('/professions', [ProfessionController::class, 'store'])->name('professions.store');
    Route::get('/professions/{profession:slug}/edit', [ProfessionController::class, 'edit'])->name('professions.edit');
    Route::put('/professions/{profession:slug}', [ProfessionController::class, 'update'])->name('professions.update');
    Route::delete('/professions/{profession:slug}', [ProfessionController::class, 'destroy'])->name('professions.delete');
});
Route::get('/professions', [ProfessionController::class, 'index'])->name('professions.index');
Route::get('/professions/{profession:slug}', [ProfessionController::class, 'show'])->name('professions.show');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
