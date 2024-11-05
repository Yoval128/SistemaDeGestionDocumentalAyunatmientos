<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ConcentracionController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TramiteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UsuarioAreaController;
use App\Http\Controllers\UsuarioAreaRolController;

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
Route::name('logout')->post('/logout', [UsuarioController::class, 'logout'])->middleware('auth');
//Route::name('dashboard')->get('/dashboard', [UsuarioController::class, 'dashboard'])->middleware('auth');
Route::name('dashboard')->get('/dashboard', [UsuarioController::class, 'dashboard'])->middleware('auth');


Route::name('usuario_index')->get('/usuarios', [UsuarioController::class, 'usuario_index']);
Route::name('usuario_alta')->get('/usuario_alta', [UsuarioController::class, 'usuario_alta']);
Route::name('usuario_registrar')->post('/usuario_registrar', [UsuarioController::class, 'usuario_registrar']);
Route::name('usuario_modificar')->get('/usuario_modificar/{id}', [UsuarioController::class, 'usuario_modificar'])->middleware('auth');
Route::name('usuario_actualizar')->put('/usuario_actualizar/{id}', [UsuarioController::class, 'usuario_actualizar'])->middleware('auth');
Route::name('usuario_eliminar')->get('/usuario_eliminar/{id}', [UsuarioController::class, 'usuario_eliminar'])->middleware('auth');
Route::name('usuario_detalle')->get('/usuario_detalle/{id}', [UsuarioController::class, 'usuario_detalle'])->middleware('auth');

Route::name('areas_index')->get('/areas_index', [AreaController::class, 'areas_index']);
Route::name('areas_alta')->get('/areas_alta', [AreaController::class, 'areas_alta']);
Route::name('areas_registrar')->post('/areas_registrar', [AreaController::class, 'areas_registrar']);
Route::name('areas_modificar')->get('/areas_modificar/{id}', [AreaController::class, 'areas_modificar'])->middleware('auth');
Route::name('areas_actualizar')->put('/areas_actualizar/{id}', [AreaController::class, 'areas_actualizar'])->middleware('auth');
Route::name('areas_eliminar')->get('/areas_eliminar/{id}', [AreaController::class, 'areas_eliminar'])->middleware('auth');
Route::name('areas_detalle')->get('/areas_detalle/{id}', [AreaController::class, 'areas_detalle'])->middleware('auth');

Route::name('rol_index')->get('/rol_index', [RolController::class, 'rol_index']);
Route::name('rol_alta')->get('/rol_alta', [RolController::class, 'rol_alta']);
Route::name('rol_registrar')->post('/rol_registrar', [RolController::class, 'rol_registrar']);
Route::name('rol_modificar')->get('/rol_modificar/{id}', [RolController::class, 'rol_modificar'])->middleware('auth');
Route::name('rol_actualizar')->put('/rol_actualizar/{id}', [RolController::class, 'rol_actualizar'])->middleware('auth');
Route::name('rol_eliminar')->get('/rol_eliminar/{id}', [RolController::class, 'rol_eliminar'])->middleware('auth');
Route::name('rol_detalle')->get('/rol_detalle/{id}', [RolController::class, 'rol_detalle'])->middleware('auth');

Route::name('usuario_area_rol_index')->get('/usuario_area_rol_index', [UsuarioAreaRolController::class, 'usuario_area_rol_index']);
Route::name('usuario_area_rol_alta')->get('/usuario_area_rol_alta', [UsuarioAreaRolController::class, 'usuario_area_rol_alta']);
Route::name('usuario_area_rol_registrar')->post('/usuario_area_rol_registrar', [UsuarioAreaRolController::class, 'usuario_area_rol_registrar']);
Route::name('usuario_area_rol_modificar')->get('/usuario_area_rol_modificar/{id}', [UsuarioAreaRolController::class, 'usuario_area_rol_modificar'])->middleware('auth');
Route::name('usuario_area_rol_actualizar')->put('/usuario_area_rol_actualizar/{id}', [UsuarioAreaRolController::class, 'usuario_area_rol_actualizar'])->middleware('auth');
Route::name('usuario_area_rol_eliminar')->get('/usuario_area_rol_eliminar/{id}', [UsuarioAreaRolController::class, 'usuario_area_rol_eliminar'])->middleware('auth');
Route::name('usuario_area_rol_detalle')->get('/usuario_area_rol_detalle/{id}', [UsuarioAreaRolController::class, 'usuario_area_rol_detalle'])->middleware('auth');


Route::name('tramite_index')->get('/tramites', [TramiteController::class, 'tramite_index'])->middleware('auth');
Route::name('tramite_alta')->get('/tramite_alta', [TramiteController::class, 'tramite_alta'])->middleware('auth');
Route::name('tramite_registrar')->post('/tramite_registrar', [TramiteController::class, 'tramite_registrar'])->middleware('auth');
Route::name('tramite_modificar')->get('/tramite_modificar/{id}', [TramiteController::class, 'tramite_modificar'])->middleware('auth');
Route::name('tramite_actualizar')->put('/tramite_actualizar/{id}', [TramiteController::class, 'tramite_actualizar'])->middleware('auth');
Route::name('tramite_eliminar')->get('/tramite_eliminar/{id}', [TramiteController::class, 'tramite_eliminar'])->middleware('auth');
Route::name('tramite_detalle')->get('/tramite_detalle/{id}', [TramiteController::class, 'tramite_detalle'])->middleware('auth');

Route::name('concentracion_index')->get('/concentracion', [ConcentracionController::class, 'concentracion_index'])->middleware('auth');
Route::name('concentracion_alta')->get('/concentracion_alta', [ConcentracionController::class, 'concentracion_alta'])->middleware('auth');
Route::name('concentracion_registrar')->post('/concentracion_registrar', [ConcentracionController::class, 'concentracion_registrar'])->middleware('auth');
Route::name('concentracion_modificar')->get('/concentracion_modificar/{id}', [ConcentracionController::class, 'concentracion_modificar'])->middleware('auth');
Route::name('concentracion_actualizar')->put('/concentracion_actualizar/{id}', [ConcentracionController::class, 'concentracion_actualizar'])->middleware('auth');
Route::name('concentracion_eliminar')->get('/concentracion_eliminar/{id}', [ConcentracionController::class, 'concentracion_eliminar'])->middleware('auth');
Route::name('concentracion_detalle')->get('/concentracion_detalle/{id}', [ConcentracionController::class, 'concentracion_detalle'])->middleware('auth');

Route::name('historico_index')->get('/historico', [HistoricoController::class, 'historico_index'])->middleware('auth');
Route::name('historico_alta')->get('/historico_alta', [HistoricoController::class, 'historico_alta'])->middleware('auth');
Route::name('historico_registrar')->post('/historico_registrar', [HistoricoController::class, 'historico_registrar'])->middleware('auth');
Route::name('historico_modificar')->get('/historico_modificar/{id}', [HistoricoController::class, 'historico_modificar'])->middleware('auth');
Route::name('historico_actualizar')->put('/historico_actualizar/{id}', [HistoricoController::class, 'historico_actualizar'])->middleware('auth');
Route::name('historico_eliminar')->get('/historico_eliminar/{id}', [HistoricoController::class, 'historico_eliminar'])->middleware('auth');
Route::name('historico_detalle')->get('/historico_detalle/{id}', [HistoricoController::class, 'historico_detalle'])->middleware('auth');


Route::name('asignacion_areas_index')->get('/asignacion_area', [UsuarioAreaController::class, 'asignacion_area'])->middleware('auth');
Route::name('asignacion_areas_alta')->get('/asignacion_areas_alta', [UsuarioAreaController::class, 'asignacion_areas_alta'])->middleware('auth');
Route::name('asignacion_areas_registrar')->post('/asignacion_areas_registrar', [UsuarioAreaController::class, 'asignacion_areas_registrar'])->middleware('auth');
Route::name('asignacion_areas_modificar')->get('/asignacion_areas_modificar/{id}', [UsuarioAreaController::class, 'asignacion_areas_modificar'])->middleware('auth');
Route::name('asignacion_areas_actualizar')->put('/asignacion_areas_actualizar/{id}', [UsuarioAreaController::class, 'asignacion_areas_actualizar'])->middleware('auth');
Route::name('asignacion_areas_eliminar')->get('/asignacion_areas_eliminar/{id}', [UsuarioAreaController::class, 'asignacion_areas_eliminar'])->middleware('auth');


Route::get('/test-login', [UsuarioController::class, 'testLogin'])->middleware('auth');
