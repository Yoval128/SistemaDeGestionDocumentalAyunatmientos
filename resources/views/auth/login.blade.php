<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="/images/logo_empresa.png" class="img-fluid" alt="Logo Empresa">
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="card-title text-center">Iniciar Sesión</h3>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('login_post') }}" method="post">

                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Recordar mi contraseña</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning">Iniciar Sesión</button>
                    </form>
                    <div class="mt-3">
                        <a href="#">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
