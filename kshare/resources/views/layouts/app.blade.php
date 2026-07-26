{{-- Layout base para todas las paginas de K-Share --}}
<!DOCTYPE html>
<html lang="es">

<head>
    {{-- Configuracion basica del documento --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> {{-- Permite que la web sea responsive --}}

    {{-- Cada vista puede cambiar el titulo con @section('titulo', '...') --}}
    <title>@yield('titulo', 'K-Share')</title>

    {{-- Token de seguridad para formularios y peticiones POST --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Archivos principales de CSS y JS compilados por Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen overflow-x-hidden">
    {{-- Cabecera comun: logo, menu y botones de autenticacion --}}
    @include('components.header')

    {{-- Aqui se inserta el contenido concreto de cada pagina --}}
    <main class="flex-grow">
        @yield('contenido')
    </main>

    {{-- Pie de pagina comun --}}
    @include('components.footer')
</body>

</html>
