<?php

use App\Http\Controllers\Admin\ContactSubmissionController as AdminContactSubmissionController;
use App\Http\Controllers\Admin\LawyerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\Admin\SuccessCaseController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ContactSubmissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::post('/contacto', [ContactSubmissionController::class, 'store'])->name('contact.store');
Route::get('/politica-de-privacidad', [LegalPageController::class, 'privacy'])->name('privacy-policy');
Route::get('/aviso-legal', [LegalPageController::class, 'legal'])->name('legal-notice');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/configuracion', [SiteSettingsController::class, 'edit'])->name('settings.edit');
        Route::put('/configuracion', [SiteSettingsController::class, 'update'])->name('settings.update');

        Route::resource('services', ServiceController::class)->except('show');
        Route::resource('lawyers', LawyerController::class)->except('show');
        Route::resource('success-cases', SuccessCaseController::class)
            ->parameters(['success-cases' => 'successCase'])
            ->except('show');
        Route::resource('testimonials', TestimonialController::class)->except('show');

        Route::get('/contact-submissions', [AdminContactSubmissionController::class, 'index'])
            ->name('contact-submissions.index');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
