<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concentracion;

class ConcentracionController extends Controller
{
    /*      public function __construct()
        {
            $this->middleware('auth');
        } */

    public function concentracion_index()
    {
        return view('concentracion.concentracion_index')->with(['concentraciones' => Concentracion::all()]);
    }
    public function concentracion_alta()
    {
        return view('concentracion.concentracion_alta');
    }

    public function concentracion_registrar(Request $request)
    {
        $this->validate($request, [
            'id_usuario_asigando' => 'required',
            'id_tramite' => 'required',
            'tipo_documento' => 'required|string',
            'valor_historico' => 'required|string',
            'acceso_publico' => 'required|boolean',
            'restricciones_acceso' => 'nullable|string',
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

        Concentracion::create([
            'id_usuario_asigando' => $request->input('id_usuario_asigando'),
            'id_tramite' => $request->input('id_tramite'),
            'tipo_documento' => $request->input('tipo_documento'),
            'valor_historico' => $request->input('valor_historico'),
            'acceso_publico' => $request->input('acceso_publico'),
            'restricciones_acceso' => $request->input('restricciones_acceso'),
            'documentos_adjuntos' => json_encode($documentos),
        ]);

        return redirect()->route('concentracion_index')->with('success', 'Registro creado con éxito.');
    }



    public function concentracion_eliminar(Concentracion $id)
    {
        $id->delete();
        return redirect()->route('concentracion_index');
    }

    public function concentracion_modificar(Concentracion $id)
    {
        return view('concentracion.concentracion_modificacion')->with('historico', $id);
    }


    public function concentracion_actualizar(Request $request, Concentracion $historico)
    {

        $this->validate($request, [
            'id_usuario_asigando' => 'required',
            'id_tramite' => 'required',
            'tipo_documento' => 'required|string',
            'valor_historico' => 'required|string',
            'acceso_publico' => 'required|boolean',
            'restricciones_acceso' => 'nullable|string',
            'documentos_adjuntos.*' => 'file|mimes:pdf|max:2048',
        ]);

        $documentos = json_decode($historico->documentos_adjuntos, true) ?: [];

        if ($request->file('documentos_adjuntos')) {
            foreach ($request->file('documentos_adjuntos') as $file) {
                $pdfName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('pdfs'), $pdfName);
                $documentos[] = $pdfName;
            }
        }

        $historico->update([
            'id_usuario_asigando' => $request->input('id_usuario_asigando'),
            'id_tramite' => $request->input('id_tramite'),
            'tipo_documento' => $request->input('tipo_documento'),
            'valor_historico' => $request->input('valor_historico'),
            'acceso_publico' => $request->input('acceso_publico'),
            'restricciones_acceso' => $request->input('restricciones_acceso'),
            'documentos_adjuntos' => json_encode($documentos), // Actualiza con la lista completa de documentos
        ]);

        return redirect()->route('concentracion_index')->with('success', 'Registro actualizado con éxito.');
    }



    public function concentracion_detalle($id)
    {
        $query = Concentracion::find($id);
        return view('concentracion.concentracion_detalle')->with(['historico' => $query]);
    }
}
