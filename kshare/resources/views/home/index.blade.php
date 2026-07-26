{{-- Pagina principal / mercado --}}
@extends('layouts.app')

@section('titulo', 'K-Share')

@section('contenido')
    {{-- Contenedor general del inicio. Aqui se define el fondo y el color principal. --}}
    <section style="font-family: sans-serif; color: #8f4659; background-color: #fff8fa;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 70px 32px 40px;">

            {{-- Hero: primera parte que ve el usuario al entrar en la web. --}}
            <div style="max-width: 600px;">
                <h1 style="font-size: 38px; font-weight: 700; line-height: 1.2; margin-bottom: 20px;">Intercambia y
                    encuentra esa
                    photocard de tu bias</h1>
                <p style="font-size: 16px; line-height: 1.5; color: #5c4046;">El lugar soñado de toda Kpoper, intercambia y
                    colecciona todas las photocards que llevas tiempo buscando</p>

                {{-- Botones principales del hero. --}}
                <div style="margin-top: 25px;">
                    {{-- Lleva a la pagina de tradeos para ver/intercambiar cartas. --}}
                    <a href="{{ route('trades.index') }}"
                        style="display: inline-block; background-color: #8f4659; color: #ffffff; padding: 12px 24px; border-radius: 50px; text-decoration: none; font-family: sans-serif; font-size: 15px; font-weight: 600; margin-right: 12px;">
                        Empezar a intercambiar
                    </a>

                    {{-- Lleva a la pagina donde se crearan o veran anuncios. --}}
                    <a href="{{ route('listings.index') }}"
                        style="display: inline-block; background-color: #ECE8E9; color: #8f4659; padding: 12px 24px; border-radius: 50px; text-decoration: none; font-family: sans-serif; font-size: 15px; font-weight: 600; border: 2px solid #ffb6c8;">
                        Crea tu propio anuncio
                    </a>
                </div>
            </div>

            {{-- Novedades: muestra los ultimos anuncios publicados por los usuarios. --}}
            <section style="margin-top: 120px;">
                {{-- Cabecera de la seccion de novedades. --}}
                <div
                    style="display: flex; align-items: end; justify-content: space-between; gap: 20px; margin-bottom: 36px;">
                    <div>
                        <h2 style="font-size: 32px; font-weight: 800; line-height: 1.1; margin: 0 0 8px;">Novedades</h2>
                        <p style="font-size: 15px; color: #3f3034; margin: 0;">Últimos anuncios publicados</p>
                    </div>

                    {{-- Enlace a la pagina completa de anuncios. --}}
                    <a href="{{ route('listings.index') }}"
                        style="color: #8f4659; font-size: 14px; font-weight: 700; text-decoration: none;">
                        Ver todo
                    </a>
                </div>

                {{-- Si no hay anuncios en la base de datos, se muestra este estado vacio. --}}
                @if ($latestListings->isEmpty())
                    <div
                        style="border: 2px dashed #ffb6c8; border-radius: 28px; background-color: #fffafb; padding: 48px 24px; text-align: center; color: #8f4659;">
                        <h3 style="font-size: 22px; font-weight: 800; margin: 0 0 8px;">Todavia no hay anuncios</h3>
                        <p style="font-size: 15px; color: #5c4046; margin: 0 0 22px;">Cuando alguien publique una photocard,
                            aparecera aqui.</p>
                        <a href="{{ route('listings.index') }}"
                            style="display: inline-block; background-color: #8f4659; color: #ffffff; padding: 12px 24px; border-radius: 50px; text-decoration: none; font-size: 15px; font-weight: 700;">
                            Crear anuncio
                        </a>
                    </div>
                @else
                    {{-- Grid responsive de cards. Cada card representa un anuncio. --}}
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(170px, 1fr)); gap: 28px;">
                        @foreach ($latestListings as $listing)
                            @php
                                // Guardamos la photocard relacionada
                                $card = $listing->photocard;

                                // Si la imagen es una URL completa o empieza por "/", se usa tal cual.
                                // Si es una ruta local, asset() la convierte en una URL valida.
                                // Si no hay imagen, se usa el logo como imagen temporal.
                                $image = $card?->image_url;
                                $imageSrc = $image && \Illuminate\Support\Str::startsWith($image, ['http://', 'https://', '/'])
                                    ? $image
                                    : ($image ? asset($image) : asset('imagenes/logo.png'));
                            @endphp

                            <article
                                style="background-color: #ffffff; border-radius: 26px; padding: 14px; box-shadow: 0 18px 35px rgba(143, 70, 89, 0.10);">
                                {{-- Imagen principal de la photocard. --}}
                                <div
                                    style="position: relative; overflow: hidden; border-radius: 18px; background-color: #f8edf1; aspect-ratio: 4 / 5;">
                                    <img src="{{ $imageSrc }}" alt="{{ $card?->idol_name ?? 'Photocard' }}"
                                        style="width: 100%; height: 100%; object-fit: cover; display: block;">

                                    {{-- Boton de favorito. --}}
                                    <button type="button" aria-label="Guardar anuncio"
                                        style="position: absolute; top: 10px; right: 10px; width: 34px; height: 34px; border: 0; border-radius: 999px; background-color: rgba(255, 255, 255, 0.88); color: #8f4659; font-size: 21px; line-height: 34px; box-shadow: 0 8px 16px rgba(143, 70, 89, 0.14);">
                                        &hearts;
                                    </button>
                                </div>

                                {{-- Informacion del anuncio. --}}
                                <div style="padding: 12px 2px 0;">
                                    <h3
                                        style="font-size: 15px; line-height: 1.2; font-weight: 800; color: #1f171a; margin: 0 0 3px;">
                                        {{ $card?->idol_name ?? 'Photocard' }}
                                    </h3>
                                    <p style="font-size: 13px; line-height: 1.3; color: #3f3034; margin: 0 0 14px;">
                                        {{ $card?->album_era ?? $card?->group_name ?? 'K-Share' }}
                                    </p>

                                    {{-- Precio de la carta. --}}
                                    <div style="display: flex; align-items: center; justify-content: space-between; gap: 10px;">
                                        <strong style="font-size: 16px; color: #8f4659;">
                                            {{ number_format($listing->price, 2) }}
                                        </strong>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </section>
        </div>
    </section>
@endsection