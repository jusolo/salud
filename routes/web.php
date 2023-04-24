<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InicioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\CitaMedicamentoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/', InicioController::class);
Route::resource('pacientes', PacienteController::class);
Route::resource('medicos', MedicoController::class);
Route::resource('consultorios', ConsultorioController::class);
Route::resource('citas', CitaController::class);
Route::resource('diagnosticos', DiagnosticoController::class);
Route::resource('agendas', AgendaController::class);
Route::resource('cita-medicamento', CitaMedicamentoController::class);

Route::get('diagnosticos/create/{cita_id}/{medico_id}', [DiagnosticoController::class, 'create'])->name('diagnosticos.create');

Route::get('/cita-medicamento/create/{cita}', [CitaMedicamentoController::class, 'create'])->name('cita-medicamento.create');

Route::get('/diagnosticos/{diagnostico}/pdf', [DiagnosticoController::class, 'generarPdf'])->name('diagnosticos.pdf');

// Rutas para cancelar cita
Route::put('citas/{cita}/cancelar', 'CitaController@cancelar')->name('citas.cancelar');
