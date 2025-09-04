<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [EmpresasController::class, 'index'])->name('empresas.index');
Route::post('/empresas/create', [EmpresasController::class, 'store'])->name('empresas.store');
