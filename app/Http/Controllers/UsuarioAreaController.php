<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
Use App\Models\Area;
Use App\Models\UsuarioArea;

use Illuminate\Http\Request;

class UsuarioAreaController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        $areas = Area::all();
        return view('asignar', compact('usuarios', 'areas'));
    }
    
    public function area_alta(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:tb_usuario,id',
            'id_area' => 'required|exists:tb_area,id',
        ]);
    
        UsuarioArea::create([
            'id_usuario' => $request->id_usuario,
            'id_area' => $request->id_area,
        ]);
    
        return redirect()->route('asignar.usuario.area')->with('success', 'Usuario asignado al área correctamente');
    }

    
    
}
