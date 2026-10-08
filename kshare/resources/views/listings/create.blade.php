{{-- Formulario para crear un anuncio --}}
@extends('layouts.app')

@section('titulo', 'Crear anuncio - K-Share')

@section('contenido')
    <section style="font-family: sans-serif; background-color: #fff8fa; color: #8f4659; padding: 60px 32px;">
        <div style="max-width: 760px; margin: 0 auto; background-color: #ffffff; border-radius: 28px; padding: 36px; box-shadow: 0 18px 35px rgba(143, 70, 89, 0.10);">
            <h1 style="font-size: 34px; font-weight: 800; margin: 0 0 10px;">Crear anuncio</h1>
            <p style="color: #5c4046; margin: 0 0 30px;">Rellena los datos de la photocard que quieres publicar.</p>

            {{-- El formulario envia los datos a ListingController@store. --}}
            <form action="{{ route('listings.store') }}" method="POST" style="display: grid; gap: 18px;">
                @csrf

                {{-- Datos principales de la carta. --}}
                <label style="display: grid; gap: 7px; font-weight: 700;">
                    Grupo
                    <input type="text" name="group_name" value="{{ old('group_name') }}" required
                        style="border: 2px solid #ffb6c8; border-radius: 18px; padding: 12px 16px; color: #3f3034;">
                </label>

                <label style="display: grid; gap: 7px; font-weight: 700;">
                    Idol
                    <input type="text" name="idol_name" value="{{ old('idol_name') }}" required
                        style="border: 2px solid #ffb6c8; border-radius: 18px; padding: 12px 16px; color: #3f3034;">
                </label>

                <label style="display: grid; gap: 7px; font-weight: 700;">
                    Rareza
                    <input type="text" name="rarity" value="{{ old('rarity') }}" required
                        placeholder="Ejemplo: Mint, Rare, POB"
                        style="border: 2px solid #ffb6c8; border-radius: 18px; padding: 12px 16px; color: #3f3034;">
                </label>

                <label style="display: grid; gap: 7px; font-weight: 700;">
                    Album o era
                    <input type="text" name="album_era" value="{{ old('album_era') }}" required
                        style="border: 2px solid #ffb6c8; border-radius: 18px; padding: 12px 16px; color: #3f3034;">
                </label>

                {{-- De momento se usa una URL de imagen. Mas adelante se puede cambiar a subida de archivo. --}}
                <label style="display: grid; gap: 7px; font-weight: 700;">
                    URL de imagen
                    <input type="text" name="image_url" value="{{ old('image_url') }}" required
                        placeholder="https://..."
                        style="border: 2px solid #ffb6c8; border-radius: 18px; padding: 12px 16px; color: #3f3034;">
                </label>

                {{-- Datos propios del anuncio. --}}
                <label style="display: grid; gap: 7px; font-weight: 700;">
                    Precio
                    <input type="number" name="price" value="{{ old('price') }}" min="0" step="0.01" required
                        style="border: 2px solid #ffb6c8; border-radius: 18px; padding: 12px 16px; color: #3f3034;">
                </label>

                <label style="display: grid; gap: 7px; font-weight: 700;">
                    Descripcion
                    <textarea name="description" rows="4"
                        style="border: 2px solid #ffb6c8; border-radius: 18px; padding: 12px 16px; color: #3f3034;">{{ old('description') }}</textarea>
                </label>

                {{-- Muestra errores de validacion si algun campo no pasa las reglas del controlador. --}}
                @if ($errors->any())
                    <div style="border: 1px solid #ffb6c8; border-radius: 18px; background-color: #fff0f4; padding: 14px 18px; color: #8f4659;">
                        <strong>Revisa estos campos:</strong>
                        <ul style="margin: 8px 0 0; padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="submit"
                    style="justify-self: start; border: 0; border-radius: 999px; background-color: #8f4659; color: #ffffff; padding: 13px 28px; font-weight: 800; cursor: pointer;">
                    Publicar anuncio
                </button>
            </form>
        </div>
    </section>
@endsection
