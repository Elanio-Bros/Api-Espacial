<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

    // Listar Reports
    Route::get(
        'reports',
        [ReportController::class, 'listReports']
    )->name('reports.list');

    // Criar Reports
    Route::match(
        ['put', 'post'],
        'reports',
        [ReportController::class, 'createReport']
    )->name('reports.create');

    // Deletar Reports
    Route::match(
        ['delete', 'post'],
        'reports/{id}',
        [ReportController::class, 'deleteReport']
    )->name('reports.delete');
});
