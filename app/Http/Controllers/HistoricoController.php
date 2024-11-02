<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historico;
use App\Models\Usuario;
use App\Models\Tramite;

class HistoricoController extends Controller
{

    /*      public function __construct()
        {
            $this->middleware('auth');
        } */

    public function historico_index()
    {
        $query = \DB::select(" SELECT 
                t.id_tramite AS id_tramite, 
                t.observaciones AS descripcion_tramite, 
                u.nombre AS usuario_nombre,
                u.apellidoP AS usuario_apellidoP,
                u.apellidoM AS usuario_apellidoM,
                h.id_historico AS id_historico,
                h.tipo_documento,
                h.valor_historico,
                h.acceso_publico,
                h.restricciones_acceso,
                h.documentos_adjuntos
            FROM 
                tb_tramite AS t
            JOIN 
                tb_usuarios AS u ON t.id_usuario = u.id_usuario
            LEFT JOIN 
                tb_historico AS h ON t.id_tramite = h.id_tramite ");

        return view('historico.historico_index', [
            'usuarios' => Usuario::all(),
            'tramites' => Tramite::all(),
            'datos' => $query,
        ]);
    }

    public function historico_alta()
    {
        return view('historico.historico_alta')->with([
            'usuarios' => Usuario::all(),
            'tramites' => Tramite::all(),
        ]);
    }

    public function historico_registrar(Request $request)
    {
        // Mostrar datos del request para depuración
        //  dd($request->all());

        $this->validate($request, [
            'id_usuario_asigando' => 'required|exists:tb_usuarios,id_usuario', // Validar que el usuario exista
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

        Historico::create([
            'id_usuario_asigando' => $request->input('id_usuario_asigando'),
            'id_tramite' => $request->input('id_tramite'),
            'tipo_documento' => $request->input('tipo_documento'),
            'valor_historico' => $request->input('valor_historico'),
            'acceso_publico' => $request->input('acceso_publico'),
            'restricciones_acceso' => $request->input('restricciones_acceso'),
            'documentos_adjuntos' => json_encode($documentos),
        ]);

        return redirect()->route('historico_index')->with('success', 'Registro creado con éxito.');
    }

    public function historico_eliminar(Historico $id)
    {
        $id->delete();
        return redirect()->route('historico_index');
    }

    public function historico_modificar(Historico $id)
    {
        $usuarios = Usuario::all();
        return view('historico.historico_modificacion')->with([
            'historico' => $id,
            'usuarios' => $usuarios
        ]);
    }

    public function historico_actualizar(Request $request, Historico $historico)
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
            'documentos_adjuntos' => json_encode($documentos),
        ]);
        //dd($request->all());
        //  dd('Actualización exitosa'); 
        return redirect()->route('historico_index')->with('success', 'Registro actualizado con éxito.');
    }



    public function historico_detalle($id)
    {
        $query = Historico::find($id);
        return view('historico.historico_detalle')->with(['historico' => $query]);
    }
}
