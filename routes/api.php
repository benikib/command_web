<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CommandeController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('commandes')->group(function () {
    Route::get('/', [CommandeController::class, 'index']);
    Route::post('/', [CommandeController::class, 'store']);
    Route::get('/{id}', [CommandeController::class, 'show']);
    Route::put('/{id}', [CommandeController::class, 'update']);
    Route::delete('/{id}', [CommandeController::class, 'destroy']);
});
