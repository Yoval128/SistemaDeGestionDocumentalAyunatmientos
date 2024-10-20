<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ConcentracionController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SensonController;
use App\Http\Controllers\TramiteController;
use App\Http\Controllers\UsuarioController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::name('login')->get('/login', [UsuarioController::class, 'login']);
Route::name('login_post')->post('/login_post', [UsuarioController::class, 'login_post']);
Route::name('logout')->post('/logout', [UsuarioController::class, 'logout']);

Route::name('usuario_index')->get('/usuarios', [UsuarioController::class, 'usuario_index']);
Route::name('usuario_alta')->get('/usuario_alta', [UsuarioController::class, 'usuario_alta']);
Route::name('usuario_registrar')->post('/usuario_registrar', [UsuarioController::class, 'usuario_registrar']);
Route::name('usuario_modificar')->get('/usuario_modificar/{id}', [UsuarioController::class, 'usuario_modificar']);
Route::name('usuario_actualizar')->put('/usuario_actualizar/{id}', [UsuarioController::class, 'usuario_actualizar']);
Route::name('usuario_eliminar')->get('/usuario_eliminar/{id}', [UsuarioController::class, 'usuario_eliminar']);
Route::name('usuario_detalle')->get('/usuario_detalle/{id}', [UsuarioController::class, 'usuario_detalle']);

Route::name('tramite_index')->get('/tramites', [TramiteController::class, 'tramite_index']);
Route::name('tramite_alta')->get('/tramite_alta', [TramiteController::class, 'tramite_alta']);
Route::name('tramite_registrar')->post('/tramite_registrar', [TramiteController::class, 'tramite_registrar']);
Route::name('tramite_modificar')->get('/tramite_modificar/{id}', [TramiteController::class, 'tramite_modificar']);
Route::name('tramite_actualizar')->put('/tramite_actualizar/{id}', [TramiteController::class, 'tramite_actualizar']);
Route::name('tramite_eliminar')->get('/tramite_eliminar/{id}', [TramiteController::class, 'tramite_eliminar']);
Route::name('tramite_detalle')->get('/tramite_detalle/{id}', [TramiteController::class, 'tramite_detalle']);

Route::name('concentracion_index')->get('/concentracion', [ConcentracionController::class, 'concentracion_index']);
Route::name('concentracion_alta')->get('/concentracion_alta', [ConcentracionController::class, 'concentracion_alta']);
Route::name('concentracion_registrar')->post('/concentracion_registrar', [ConcentracionController::class, 'concentracion_registrar']);
Route::name('concentracion_modificar')->get('/concentracion_modificar/{id}', [ConcentracionController::class, 'concentracion_modificar']);
Route::name('concentracion_actualizar')->put('/concentracion_actualizar/{id}', [ConcentracionController::class, 'concentracion_actualizar']);
Route::name('concentracion_eliminar')->get('/concentracion_eliminar/{id}', [ConcentracionController::class, 'concentracion_eliminar']);
Route::name('concentracion_detalle')->get('/concentracion_detalle/{id}', [ConcentracionController::class, 'concentracion_detalle']);

Route::name('historico_index')->get('/historico', [HistoricoController::class, 'historico_index']);
Route::name('historico_alta')->get('/historico_alta', [HistoricoController::class, 'historico_alta']);
Route::name('historico_registrar')->post('/historico_registrar', [HistoricoController::class, 'historico_registrar']);
Route::name('historico_modificar')->get('/historico_modificar/{id}', [HistoricoController::class, 'historico_modificar']);
Route::name('historico_actualizar')->put('/historico_actualizar/{id}', [HistoricoController::class, 'historico_actualizar']);
Route::name('historico_eliminar')->get('/historico_eliminar/{id}', [HistoricoController::class, 'historico_eliminar']);
Route::name('historico_detalle')->get('/historico_detalle/{id}', [HistoricoController::class, 'historico_detalle']);

Route::name('iot_index')->get('/iot', [SensonController::class, 'iot_index']);
Route::name('iot_detalle')->get('/iot_detalle/{id}', [SensonController::class, 'iot_detalle']);


