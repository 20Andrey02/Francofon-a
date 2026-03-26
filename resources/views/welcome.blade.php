<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            background: white;
            padding: 50px 40px;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -4px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 90%;
            border: 1px solid #e3e3e0;
        }
        h1 {
            color: #1b1b18;
            margin-bottom: 10px;
            margin-top: 0;
            font-size: 2.2rem;
            font-weight: 600;
        }
        p {
            color: #706f6c;
            margin-bottom: 30px;
            font-size: 1.1rem;
        }
        .links {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            transition: opacity 0.3s, transform 0.1s;
            font-size: 1rem;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .btn:active {
            transform: scale(0.98);
        }
        .btn-primary {
            background-color: #1b1b18;
            color: white;
            border: 1px solid #000;
        }
        .btn-secondary {
            background-color: transparent;
            color: #1b1b18;
            border: 1px solid #e3e3e0;
        }
        .btn-secondary:hover {
            border-color: #1b1b18;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido a {{ config('app.name', 'App') }}</h1>
        <p>Sistema de panel y gestión de usuarios.</p>
        
        @if (Route::has('login'))
            <div class="links">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Ir al Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-secondary">Registrarse</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</body>
</html>
