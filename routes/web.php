<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectosController;

Route::get('/', [ProyectosController::class, 'home'])->name('proyectos.home');

Route::get('/agregar', [ProyectosController::class, 'add'])->name('proyectos.add');

Route::post('/proyectos', [ProyectosController::class, 'store'])->name('proyectos.store');

Route::get('/editar/{id}', [ProyectosController::class, 'edit'])->name('proyectos.edit');

Route::post('/editar/{id}', [ProyectosController::class, 'update'])->name('proyectos.update');

Route::delete('/proyectos/{id}', [ProyectosController::class, 'delete'])->name('proyectos.delete');

Route::get('/proyectos/pdf', [ProyectosController::class, 'generatePDF'])->name('proyectos.pdf');

Route::get('/proyectos/pdf/download', [ProyectosController::class, 'downloadPDF'])->name('proyectos.pdf.download');