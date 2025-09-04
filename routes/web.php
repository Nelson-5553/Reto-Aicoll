<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresasController;

Route::get('/', function () {
    return view('index');
});

Route::get('/', [EmpresasController::class, 'index'])->name('empresas.index');
Route::post('/empresas/create', [EmpresasController::class, 'store'])->name('empresas.store');
Route::get('/empresas/{empresas}/edit', [EmpresasController::class, 'edit'])->name('empresas.edit');
Route::put('/empresas/{empresas}', [EmpresasController::class, 'update'])->name('empresas.update');
Route::delete('/empresas/{empresas}', [EmpresasController::class, 'destroy'])->name('empresas.destroy');
