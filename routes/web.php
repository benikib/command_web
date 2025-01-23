<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepportingController;
use App\Http\Controllers\SurveillantController;
use App\Http\Controllers\ExamenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    
    Route::middleware('admin')->group(function () {

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/dashboard', [HomeController::class, 'index'])->name("dashboard");
        Route::get('/administrateur', [RepportingController::class, 'admin'])->name("admin");
        Route::get('/users/general', [RepportingController::class, 'users'])->name("users");
        Route::get('/administrateur/delete', [RepportingController::class, 'admin'])->name("admin.delete");
        Route::post('/administrateur/store', [RepportingController::class, 'admin_store'])->name("admin_store");
        Route::get('/session', [RepportingController::class, 'session'])->name("session");
        Route::post('/session/store', [RepportingController::class, 'session_store'])->name("session_store");
        Route::get('/session/{id}/examens', [RepportingController::class, 'session_examens'])->name("session.examen");
        Route::get('/session/{id}', [RepportingController::class, 'session_delete'])->name("session.delete");
        Route::get('/session/{id}/edit', [RepportingController::class, 'session_edit'])->name('session.edit');
        Route::put('/session/{id}', [RepportingController::class, 'session_update'])->name('session.update');
        // Route::get('/session/examens', [RepportingController::class, 'session_store'])->name("examen_store");

        Route::get('/examens', [RepportingController::class, 'examens'])->name("examens");
        Route::post('/session/examen/store', [RepportingController::class, 'examen_store'])->name("examen_store");
        Route::get('/session/examen/store/{id}', [RepportingController::class, 'examen_delete'])->name("examen.delete");
        Route::get('/suveillants/{id}', [RepportingController::class, 'surveillants'])->name("surveillants");
        Route::post('/suveillants/store', [RepportingController::class, 'surveillant_store'])->name("surveillant_store");
        Route::get('/pvs/{id}', [RepportingController::class, 'pvx'])->name("pvx");

        Route::get('/users/surveillant/{id}', [RepportingController::class, 'surveillant_delete'])->name("surveillant.delete");
        Route::get('/user/statistique/{id}', [RepportingController::class, 'statistique'])->name("statistique");
        //Route::get('/users/programme/{id}', [SurveillantController::class, 'programme'])->name("programme");
    });
    Route::get('/users/pvs/{id}', [SurveillantController::class, 'index'])->name("users.pvs");
    Route::get('/users/pvs/{id}/{ex}', [SurveillantController::class, 'pv'])->name("pv.soumis");
    Route::get('/users/programme/{id}', [SurveillantController::class, 'programme'])->name("programme_surveillant");
    Route::get('/examens/download/{format}', [RepportingController::class, 'download'])->name('examens.download');
    Route::post('/users/pvs/store', [SurveillantController::class, 'pv_store'])->name("soumis.stor");

    Route::get('/examens/{id}/download-pdf', [ExamenController::class, 'downloadPDF'])->name('examens.download.pdf');
    Route::get('/session/{id}/horaire-pdf', [ExamenController::class, 'downloadAllExamens'])->name('session.horaire.pdf');
    Route::get('/session/{session_id}/surveillance/{user_id}/pdf', [App\Http\Controllers\SurveillantController::class, 'downloadSurveillancesPDF'])
        ->name('session.surveillance.pdf');E
    Route::get('/pv/{id}/download', [SurveillantController::class, 'downloadPV'])->name('pv.download');
    Route::get('/pv/download/{id}', [App\Http\Controllers\PvController::class, 'download'])->name('pv.download');
    Route::get('/surveillance/all/{user_id}/pdf', [App\Http\Controllers\SurveillantController::class, 'downloadAllSurveillancesPDF'])
        ->name('surveillance.all.pdf');

});

Route::post('/repporting/store', [RepportingController::class, 'store'])->name('repporting.store');

Route::get('/examens/{session_id}', [ExamenController::class, 'index'])->name('examens.index');

require __DIR__ . '/auth.php';
