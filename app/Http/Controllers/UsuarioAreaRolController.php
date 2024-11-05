<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioAreaRol;
use App\Models\Usuario;
use App\Models\Area;
use App\Models\Rol;

class UsuarioAreaRolController extends Controller
{
    public function usuario_area_rol_index()
    {
        $asignaciones = UsuarioAreaRol::with(['usuario', 'area', 'rol'])->get();

        return view('UsuarioAreaRol.usuario_area_rol_index', [
            'usuarios' => Usuario::all(),
            'areas' => Area::all(),
            'roles' => Rol::all(),
            'asignaciones' => $asignaciones,
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
