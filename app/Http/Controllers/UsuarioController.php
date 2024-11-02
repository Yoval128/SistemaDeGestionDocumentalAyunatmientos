<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Usar Auth::attempt para la autenticación
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }


    public function testLogin(Request $request)
    {
        // Cambia estos valores según sea necesario
        $email = 'admin@hotmail.com'; // Email del usuario
        $password = '12345'; // Reemplaza con la contraseña real

        $user = Usuario::where('email', $email)->first();

        if ($user && password_verify($password, $user->password)) {
            return "¡Login exitoso!";
        } else {
            return "Credenciales incorrectas.";
        }
    }


    public function dashboard()
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        return view('dashboard', ['user' => $user]); // Pasar el usuario a la vista
    }

    public function logout()
    {
        Auth::logout(); // Cierra la sesión del usuario
        return redirect()->route('login')->with('success', 'Has cerrado sesión.');
    }

    public function usuario_index()
    {
        return view('usuario.usuario_index')->with(['usuario' => Usuario::all()]);
    }
    public function usuario_alta()
    {
        return view('usuario.usuario_alta');
    }

    public function usuario_registrar(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',
            'email' => 'required',
            'password' => 'required',
            'rol' => 'required',
            'activo' => 'nullable|boolean',
        ]);

        $img2 = "foto_default.jpg";
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $img2 = time() . '_' . $file->getClientOriginalName();
            \Storage::disk('local')->put($img2, \File::get($file));
        }

        Usuario::create([
            'nombre' => $request->input('nombre'),
            'apellidoP' => $request->input('apellidoP'),
            'apellidoM' => $request->input('apellidoM'),
            'sexo' => $request->input('sexo'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'rol' => $request->input('rol'),
            'foto' => $img2,
            'activo' => $request->input('activo') ? 1 : 0,
        ]);

        return redirect()->route('usuario_index')->with('success', 'Usuario creado con éxito.');
    }


    public function usuario_eliminar(Usuario $id)
    {
        $id->delete();
        return redirect()->route('usuario_index');
    }

    public function usuario_modificar(Usuario $id)
    {
        return view('usuario.usuario_modificacion')->with('usuario', $id);
    }


    public function usuario_actualizar(Request $request, Usuario $id)
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
            $img2 = $id->foto;
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

        return redirect()->route('usuario_index')->with('success', 'Usuario actualizado con éxito.');
    }

    public function usuario_detalle($id)
    {
        $query = Usuario::find($id);
        return view('usuario.usuario_detalle')->with(['usuario' => $query]);
    }
}
