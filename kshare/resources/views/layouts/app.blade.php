{{-- Layout base para todas las paginas --}}
<!DOCTYPE html>
<html lang="es">

<head>
    {{-- cabecera superior--}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> {{-- responsive design --}}
    <title>@yield('titulo', 'K-Share')</title>

    {{-- Token de seguridad para formularios y peticiones --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Archivo JS principal --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen overflow-x-hidden">
    {{-- cabecera --}}
    @include('components.header')

    {{-- contenido --}}
    <main class="flex-grow">
        @yield('contenido')
    </main>

    {{-- pie de pagina --}}
   {{--@include('componentes.footer') --}} 
</body>

</html>