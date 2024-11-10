<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Area;
use App\Models\Usuario;

class AreaController extends Controller
{
    public function areas_index(Request $request)
    {
        $areas = Area::Buscar($request->buscar)->paginate(8);
        return view('area.areas_index')->with(['areas' => $areas]);
    }


    public function areas_alta()
    {
        return view('area.areas_alta');
    }

    public function areas_registrar(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'descripccion' => 'required',
            'activo' => 'nullable|boolean',
        ]);


        Area::create([
            'nombre' => $request->input('nombre'),
            'descripccion' => $request->input('descripccion'),
            'activo' => $request->input('activo') ? 1 : 0,
        ]);

        return redirect()->route('areas_index')->with('success', 'Area creado con éxito.');
    }


    public function areas_eliminar(Area $id)
    {
        $id->delete();
        return redirect()->route('areas_index');
    }

    public function areas_modificar(Area $id)
    {
        return view('area.areas_modificacion')->with('areas', $id);
    }


    public function areas_actualizar(Request $request, Area $id)
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

        return redirect()->route('areas_index')->with('success', 'Area actualizado con éxito.');
    }

    public function areas_detalle($id)
    {
        $query = Area::find($id);
        return view('area.areas_detalle')->with(['areas' => $query]);
    }
}
