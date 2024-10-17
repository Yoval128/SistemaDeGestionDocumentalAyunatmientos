<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Usuario;

class AreaController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function login_post()
    {
       
    }

    public function usuario_index()
    {
        return view('usuario.index')->with(['alumno' => Usuario::all()]);
    }
    public function alumno_alta()
    {
        return view('alumno_alta');
    }

    public function alumno_registrar(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'fn' => 'required'
        ]);
        if ($request->file('foto') != '') {
            $file = $request->file('foto');
            $img = $file->getClientOriginalName();
            $ldate = date('Ymd_His_');
            $img2 = $ldate . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        } else {
            $img2 = "logo_utvt_.png";
        }

        Usuario::create(array(
            'nombre' => $request->input('nombre'),
            'fn' => $request->input('fn'),
            'foto' => $img2
        ));
        return redirect()->route('alumno');
    }


    public function alumno_borrar(Usuario $id)
    {
        $id->delete();
        return redirect()->route('alumno');
    }

    public function alumno_editar(Usuario $id)
    {
        return view('alumno_editar')->with('alumno', $id);
    }

    public function alumno_actualizar(Request $request, Usuario $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'fn' => 'required'
        ]);

        if ($request->file('foto') != '') {
            $file = $request->file('foto');
            $img = $file->getClientOriginalName();
            $ldate = date('Ymd_His_');
            $img2 = $ldate . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        } else {
            $img2 = $id->foto;
        }

        $id->update([
            'nombre' => $request->input('nombre'),
            'fn' => $request->input('fn'),
            'foto' => $img2
        ]);

        return redirect()->route('alumno');
    }

    public function alumno_detalle($id)
    {
        $query = Usuario::find($id);
        return view('alumno_detalle')->with(['alumno' => $query]);
    }
}
