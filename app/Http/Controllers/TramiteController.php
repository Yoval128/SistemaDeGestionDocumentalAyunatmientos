<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tramite;
use App\Models\Usuario;
use App\Models\Area;

class TramiteController extends Controller
{
    /*      public function __construct()
        {
            $this->middleware('auth'); 
        } */


    /*  public function tramite_index()
    {
        return view('tramite.tramite_index')->with([
            'tramite' => Tramite::all(),
            'usuarios' => Usuario::all()
        ]);
    } */

    public function tramite_index(Request $request)
    {
        $buscar = $request->get('buscar', ''); 
        $fecha_inicio = $request->get('fecha_inicio', ''); 
        $fecha_limite = $request->get('fecha_limite', '');
    
        // Construir la consulta de los trámites
        $tramites = Tramite::with(['usuario', 'area'])
            ->buscar($buscar) // Aplica la búsqueda por usuario, área o estado
            ->fechaInicio($fecha_inicio) // Aplica el filtro por fecha de inicio
            ->fechaLimite($fecha_limite) // Aplica el filtro por fecha límite
            ->paginate(5); // Paginación
    
        return view('tramite.tramite_index')->with([
            'tramites' => $tramites,
            'usuarios' => Usuario::all(),
            'areas' => Area::all(),
            'buscar' => $buscar,
            'fecha_inicio' => $fecha_inicio,
            'fecha_limite' => $fecha_limite,
        ]);
    }
    


    public function tramite_alta()
    {
        return view('tramite.tramite_alta')->with([
            'usuarios' => Usuario::all(),
            'areas' => Area::all(),
        ]);
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
        $areas = Area::all();
        $usuarios = Usuario::all();
        return view('tramite.tramite_modificacion')->with([
            'tramite' => $id,
            'usuarios' => $usuarios,
            'areas' => $areas
        ]);
    }

    public function tramite_actualizar(Request $request, Tramite $id)
    {
        $this->validate($request, [
            'id_area' => 'required',
            'id_usuario' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_limite' => 'required|date',
            'estado' => 'required',
            'observaciones' => 'nullable',
            'documentos_adjuntos' => 'nullable|array',
            'documentos_adjuntos.*' => 'file|mimes:pdf|max:2048',
        ]);

        $documentos = json_decode($id->documentos_adjuntos, true) ?: [];

        if ($request->has('documentos_a_eliminar')) {
            foreach ($request->input('documentos_a_eliminar') as $index) {

                if (isset($documentos[$index])) {
                    $filePath = public_path('pdfs/' . $documentos[$index]);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                    unset($documentos[$index]);
                }
            }
        }

        if ($request->file('documentos_adjuntos')) {
            foreach ($request->file('documentos_adjuntos') as $file) {
                $pdfName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('pdfs'), $pdfName);
                $documentos[] = $pdfName;
            }
        }

        $id->update([
            'id_area' => $request->input('id_area'),
            'id_usuario' => $request->input('id_usuario'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_limite' => $request->input('fecha_limite'),
            'estado' => $request->input('estado'),
            'observaciones' => $request->input('observaciones'),
            'documentos_adjuntos' => json_encode(array_values($documentos)), // Reindexar array
        ]);

        return redirect()->route('tramite_index')->with('success', 'Trámite actualizado con éxito.');
    }

    // Debugging
    /*   dd($request->all());
         // Debugging
        /*  dd('Actualización exitosa'); */



    public function tramite_detalle($id)
    {
        $tramite = Tramite::find($id);

        $areas = Area::find($id);
        $usuario = Usuario::find($tramite->id_usuario);

        return view('tramite.tramite_detalle')->with([
            'tramite' => $tramite,
            'usuario' => $usuario,
            'areas' => $areas,
        ]);
    }
}
