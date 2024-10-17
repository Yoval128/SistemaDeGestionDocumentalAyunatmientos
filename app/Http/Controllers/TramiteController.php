<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tramite;

class TramiteController extends Controller
{

    public function tramite_index()
    {
        return view('tramite.tramite_index')->with(['tramite' => Tramite::all()]);
    }
    public function tramite_alta()
    {
        return view('tramite.tramite_alta');
    }

    public function tramite_registrar(Request $request)
    {
        $this->validate($request, [
            'id_area' => 'required',
            'id_usuario' => 'required',
            'fecha_inicio' => 'required',
            'fecha_limite' => 'required',
            'estado' => 'required',
            'observaciones' => 'nullable', 
            'documentos_adjuntos' => 'nullable|array', 
            'documentos_adjuntos.*' => 'file|mimes:pdf|max:2048',
        ]);

       
        $documentos = [];
        if ($request->file('documentos_adjuntos')) {
            foreach ($request->file('documentos_adjuntos') as $file) {
                $pdfName = time() . '_' . $file->getClientOriginalName();
           
                $file->move(public_path('pdfs'), $pdfName);
                $documentos[] = $pdfName; 
            }
        }

        Tramite::create([
            'id_area' => $request->input('id_area'),
            'id_usuario' => $request->input('id_usuario'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_limite' => $request->input('fecha_limite'),
            'estado' => $request->input('estado'),
            'observaciones' => $request->input('observaciones'),
            
            'documentos_adjuntos' => json_encode($documentos),
        ]);

        return redirect()->route('tramite_index')->with('success', 'Trámite creado con éxito.');
    }

    public function tramite_eliminar(Tramite $id)
    {
        $id->delete();
        return redirect()->route('tramite_index');
    }

    public function tramite_modificar(Tramite $id)
    {
        return view('tramite.tramite_modificacion')->with('tramite', $id);
    }


    public function tramite_actualizar(Request $request, Tramite $id)
    {

        $this->validate($request, [
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email',
            'password' => 'nullable',
            'rol' => 'required',
            'activo' => 'nullable|boolean',
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $img = $file->getClientOriginalName();
            $ldate = date('Ymd_His_');
            $img2 = $ldate . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        } else {
            $img2 = $tramite->foto;
        }

        $id->update([
            'nombre' => $request->input('nombre'),
            'apellidoP' => $request->input('apellidoP'),
            'apellidoM' => $request->input('apellidoM'),
            'sexo' => $request->input('sexo'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'email' => $request->input('email'),
            'rol' => $request->input('rol'),
            'foto' => $img2,
            'activo' => $request->input('activo') ? 1 : 0,
        ]);

        if ($request->filled('password')) {
            $id->password = bcrypt($request->input('password'));
            $id->save();
        }

        return redirect()->route('tramite_index')->with('success', 'Tramite actualizado con éxito.');
    }

    public function tramite_detalle($id)
    {
        $query = Tramite::find($id);
        return view('tramite.tramite_detalle')->with(['tramite' => $query]);
    }
}
