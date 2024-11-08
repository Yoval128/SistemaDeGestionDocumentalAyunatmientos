<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioAreaRol;
use App\Models\Usuario;
use App\Models\Area;
use App\Models\Rol;

class UsuarioAreaRolController extends Controller
{
    public function usuario_area_rol_index(Request $request)
    {
        // Recibimos los datos de búsqueda desde el formulario
        $buscar = $request->get('buscar', '');
        $fecha_asignacion = $request->get('fecha_asignacion', '');
    
        // Iniciamos la consulta con las relaciones necesarias
        $asignacionesQuery = UsuarioAreaRol::with(['usuario', 'area', 'rol']);
    
        // Si hay un término de búsqueda
        if ($buscar != '') {
            $asignacionesQuery->buscar($buscar);
        }
    
        // Si hay una fecha de asignación seleccionada, filtramos por fecha
        if ($fecha_asignacion != '') {
            $asignacionesQuery->whereDate('fecha_asignacion', $fecha_asignacion);
        }
    
        // Paginar los resultados
        $asignaciones = $asignacionesQuery->paginate(5);
    
        // Devolver los datos a la vista
        return view('UsuarioAreaRol.usuario_area_rol_index', [
            'asignaciones' => $asignaciones,
            'areas' => Area::all(),
            'roles' => Rol::all(),
            'usuarios' => Usuario::all(),
            'buscar' => $buscar,
            'fecha_asignacion' => $fecha_asignacion,
        ]);
    }
    


    public function usuario_area_rol_registrar(Request $request)
    {
        $this->validate($request, [
            'id_usuario' => 'required|exists:tb_usuarios,id_usuario',
            'id_area' => 'required|exists:tb_areas,id_area',
            'id_rol' => 'required|exists:tb_roles,id_rol',
        ]);

        UsuarioAreaRol::create([
            'id_usuario' => $request->input('id_usuario'),
            'id_area' => $request->input('id_area'),
            'id_rol' => $request->input('id_rol'),
        ]);

        return redirect()->route('usuario_area_rol_index')->with('success', 'Asignación creada con éxito.');
    }

    public function usuario_area_rol_modificar(UsuarioAreaRol $id)
    {
        $id->fecha_asignacion = \Carbon\Carbon::parse($id->fecha_asignacion);

        return view('UsuarioAreaRol.usuario_area_rol_modificar')->with([
            'asignacion' => $id,
            'usuarios' => Usuario::all(),
            'areas' => Area::all(),
            'roles' => Rol::all(),
        ]);
    }


    public function usuario_area_rol_actualizar(Request $request, UsuarioAreaRol $id)
    {

        $this->validate($request, [
            'id_usuario' => 'required|exists:tb_usuarios,id_usuario',
            'id_area' => 'required|exists:tb_areas,id_area',
            'id_rol' => 'required|exists:tb_roles,id_rol',
        ]);

        $id->update([
            'id_usuario' => $request->input('id_usuario'),
            'id_area' => $request->input('id_area'),
            'id_rol' => $request->input('id_rol'),
        ]);

        return redirect()->route('usuario_area_rol_index')->with('success', 'Asignación actualizada con éxito.');
    }

    public function usuario_area_rol_eliminar(UsuarioAreaRol $id)
    {
        $id->delete();
        return redirect()->route('usuario_area_rol_index')->with('success', 'Asignación eliminada con éxito.');
    }

    public function usuario_area_rol_detalle($id)
    {
        $asignacion = UsuarioAreaRol::with(['usuario', 'area', 'rol'])->find($id);
        return view('UsuarioAreaRol.usuario_area_rol_detalle')->with(['asignacion' => $asignacion]);
    }
}
