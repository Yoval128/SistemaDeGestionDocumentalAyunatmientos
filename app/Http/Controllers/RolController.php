<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
class RolController extends Controller
{
    public function rol_index()
    {
        return view('roles.roles_index')->with(['roles' => Rol::all()]);
    }
    public function rol_alta()
    {
        return view('roles.roles_alta');
    }

    public function rol_registrar(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'descripccion' => 'required',
            'activo' => 'nullable|boolean',
        ]);


        Rol::create([
            'nombre' => $request->input('nombre'),
            'descripccion' => $request->input('descripccion'),
            'activo' => $request->input('activo') ? 1 : 0,
        ]);

        return redirect()->route('rol_index')->with('success', 'Rol creado con éxito.');
    }


    public function rol_eliminar(Rol $id)
    {
        $id->delete();
        return redirect()->route('rol_index');
    }

    public function rol_modificar(Rol $id)
    {
        return view('roles.roles_modificacion')->with('roles', $id);
    }


    public function rol_actualizar(Request $request, Rol $id)
    {

        $this->validate($request, [
            'nombre' => 'required',
            'descripccion' => 'required',
            'activo' => 'nullable|boolean',
        ]);



        $id->update([
            'nombre' => $request->input('nombre'),
            'descripccion' => $request->input('descripccion'),
            'activo' => $request->input('activo') ? 1 : 0,
        ]);

        return redirect()->route('rol_index')->with('success', 'Rol actualizado con éxito.');
    }

    public function rol_detalle($id)
    {
        $query = Rol::find($id);
        return view('roles.roles_detalle')->with(['roles' => $query]);
    }
}
