{{-- pagina de anuncios --}}
@extends('layouts.app')

@section('titulo', 'Anuncios - K-Share')

@section('contenido')
    {{-- Vista temporal de anuncios. Mas adelante aqui ira el formulario o listado de anuncios. --}}
    <main style="font-family: sans-serif; padding: 60px 40px; color: #8f4659;">
        <h1 style="font-size: 38px; font-weight: 700; margin-bottom: 12px;">Anuncios</h1>
        <p style="font-size: 16px; color: #5c4046;">Aqui ira la pagina donde se crearan los anuncios.</p>
        <a href="{{ route('listings.create') }}"
            style="display: inline-block; margin-top: 24px; background-color: #8f4659; color: #ffffff; padding: 12px 24px; border-radius: 50px; text-decoration: none; font-size: 15px; font-weight: 700;">
            Crear anuncio
        </a>
    </main>
@endsection
