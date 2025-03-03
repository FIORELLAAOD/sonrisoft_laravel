<?php

use Illuminate\Support\Facades\Route;
use App\Models\Estaciones;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cargarcosto',[App\Http\Controllers\AjaxController::class, 'cargarCosto'])->name('cargar.costo');
Route::get('/cargaracalendario',[App\Http\Controllers\AjaxController::class, 'cargarCalendario'])->name('cargar.calendariocitas');
Route::get('/validardocu',[App\Http\Controllers\AjaxController::class, 'validarDocumento'])->name('validar.documento');
Route::get('/validardni',[App\Http\Controllers\AjaxController::class, 'validarDni'])->name('validar.dni');
Route::get('/registrarse',[App\Http\Controllers\AjaxController::class, 'registrarse'])->name('registrarse');

Route::post('/borrarlista',[App\Http\Controllers\EspecialidadController::class, 'borrarLista'])->name('borrar.lstespecialidad');
Route::post('/borrartratamientos',[App\Http\Controllers\TratamientoController::class, 'borrarTratamientos'])->name('borrar.lsttratamientos');
Route::get('/historialpaciente/{id}',[App\Http\Controllers\UserController::class, 'imprimirHistorial'])->name('paciente.historial');
Route::get('/historialmedico/{id}',[App\Http\Controllers\MedicoController::class, 'imprimirHistorial'])->name('medico.historial');
Route::get('acceder', function () {
   return view('auth.acceso');
});
 


Route::resource('users',App\Http\Controllers\UserController::class);
Route::resource('especialidades',App\Http\Controllers\EspecialidadController::class);
Route::resource('medicos',App\Http\Controllers\MedicoController::class);
Route::resource('pacientes',App\Http\Controllers\PacientesController::class);
Route::resource('citas',App\Http\Controllers\CitaController::class);
Route::resource('hcitas',App\Http\Controllers\HcitaController::class);
Route::resource('tratamientos',App\Http\Controllers\TratamientoController::class);
Route::resource('reportes',App\Http\Controllers\ReporteController::class);
Route::resource('pagos',App\Http\Controllers\PagosController::class);

Route::resource('citasp',App\Http\Controllers\CitasPController::class);
Route::resource('hcitasp',App\Http\Controllers\HcitaPController::class);
Route::resource('pagosp',App\Http\Controllers\PagosPController::class);

Route::resource('citasm',App\Http\Controllers\CitasMController::class);
Route::resource('hcitasm',App\Http\Controllers\HcitaMController::class);
Route::resource('pagosm',App\Http\Controllers\PagosMController::class);
Route::resource('configs',App\Http\Controllers\ConfigController::class);



Route::get('/rptpacientes',[App\Http\Controllers\ReporteController::class, 'pacientes'])->name('rpt.pacientes');
Route::get('/rptpacientestodo/{datos}',[App\Http\Controllers\ReporteController::class, 'pacientestodo'])->name('rpt.pacientestodo');
Route::get('/rptpacienteindiv/{datos}',[App\Http\Controllers\ReporteController::class, 'rptpacienteindiv'])->name('rpt.rptpacienteindiv');
Route::get('/rptcitas',[App\Http\Controllers\ReporteController::class, 'rptcitas'])->name('rpt.rptcitas');
Route::get('/rpttendencia',[App\Http\Controllers\ReporteController::class, 'rpttendencia'])->name('rpt.tendencia');

Route::get('/calendario',[App\Http\Controllers\CitaController::class, 'calendario'])->name('ver.calendario');
Route::get('/calendariop',[App\Http\Controllers\CitasPController::class, 'calendario'])->name('ver.calendariop');
Route::get('/calendariom',[App\Http\Controllers\CitasMController::class, 'calendario'])->name('ver.calendariom');
Route::get('/validarregistro',[App\Http\Controllers\AjaxController::class, 'validarRegistro'])->name('validar.registro');

 

Route::get('/rpt_odontograma',[App\Http\Controllers\ReporteController::class, 'rpt_odontograma'])->name('rpt.odontograma');

Route::get('/rpt_medicos',[App\Http\Controllers\ReporteController::class, 'rpt_medicos'])->name('rpt.medicos');
Route::get('/rpt_pacientes',[App\Http\Controllers\ReporteController::class, 'rpt_pacientes'])->name('rpt.pacientes');


Route::get('/odontograma',[App\Http\Controllers\OdontogramaController::class, 'index'])->name('odontograma');
Route::get('/dni_search',[App\Http\Controllers\AjaxController::class, 'buscarDni'])->name('buscar.dni');
Route::post('/save_odontograma',[App\Http\Controllers\OdontogramaController::class, 'store'])->name('guardar.odontograma');
Route::get('/diente_detalles',[App\Http\Controllers\OdontogramaController::class, 'detalles_diente'])->name('diente.detalles');
Route::get('/borrar_odonto/{id}',[App\Http\Controllers\OdontogramaController::class, 'borrar_odonto'])->name('odnto.borrar');