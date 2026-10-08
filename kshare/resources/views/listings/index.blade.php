{{-- Pagina de anuncios --}}
@extends('layouts.app')

@section('titulo', 'Anuncios - K-Share')

@section('contenido')
    <main style="font-family: sans-serif; background-color: #fff8fa; color: #8f4659; padding: 60px 32px 90px;">
        <section style="max-width: 1200px; margin: 0 auto;">
            {{-- Cabecera de la pagina de anuncios. --}}
            <div style="display: flex; align-items: end; justify-content: space-between; gap: 20px; margin-bottom: 34px;">
                <div>
                    <h1 style="font-size: 40px; line-height: 1.1; font-weight: 900; margin: 0 0 10px;">Anuncios</h1>
                    <p style="font-size: 16px; color: #5c4046; margin: 0;">Todas las photocards publicadas por la comunidad.</p>
                </div>

                <a href="{{ route('listings.create') }}"
                    style="display: inline-flex; align-items: center; justify-content: center; border-radius: 999px; background-color: #8f4659; color: #ffffff; padding: 13px 24px; text-decoration: none; font-size: 15px; font-weight: 800; box-shadow: 0 14px 26px rgba(143, 70, 89, 0.20);">
                    Crear anuncio
                </a>
            </div>

            {{-- Si no hay anuncios todavia, mostramos un estado vacio bonito. --}}
            @if ($listings->isEmpty())
                <div style="border: 2px dashed #ffb6c8; border-radius: 30px; background-color: #fffafb; padding: 58px 26px; text-align: center; box-shadow: 0 18px 35px rgba(143, 70, 89, 0.08);">
                    <h2 style="font-size: 26px; font-weight: 900; margin: 0 0 10px;">Todavia no hay anuncios</h2>
                    <p style="font-size: 15px; color: #5c4046; margin: 0 0 24px;">Publica la primera photocard y aparecera aqui.</p>
                    <a href="{{ route('listings.create') }}"
                        style="display: inline-flex; border-radius: 999px; background-color: #8f4659; color: #ffffff; padding: 12px 24px; text-decoration: none; font-size: 15px; font-weight: 800;">
                        Crear anuncio
                    </a>
                </div>
            @else
                {{-- Grid de anuncios. Cada card muestra una photocard publicada. --}}
                <div style="display: grid; grid-template-columns: repeat(auto-fill, 155px); justify-content: start; gap: 22px;">
                    @foreach ($listings as $listing)
                        @php
                            $card = $listing->photocard;
                            $image = $card?->image_url;
                            $imageSrc = $image && \Illuminate\Support\Str::startsWith($image, ['http://', 'https://', '/'])
                                ? $image
                                : ($image ? asset($image) : asset('imagenes/logo.png'));
                        @endphp

                        <article style="background-color: #ffffff; border: 1px solid #f6dfe6; border-radius: 18px; padding: 8px; box-shadow: 0 10px 22px rgba(143, 70, 89, 0.08);">
                            {{-- Imagen de la carta. --}}
                            <a href="{{ route('listings.show', $listing) }}"
                                style="position: relative; overflow: hidden; display: block; border-radius: 14px; background: linear-gradient(145deg, #ffe4ec, #f8edf1); aspect-ratio: 4 / 5; text-decoration: none;">
                                <img src="{{ $imageSrc }}" alt="{{ $card?->idol_name ?? 'Photocard' }}"
                                    style="width: 100%; height: 100%; object-fit: cover; display: block;">

                                @if ($card?->rarity)
                                    <span style="position: absolute; left: 7px; bottom: 7px; border-radius: 999px; background-color: rgba(143, 70, 89, 0.92); color: #ffffff; padding: 3px 7px; font-size: 8px; font-weight: 800; text-transform: uppercase;">
                                        {{ $card->rarity }}
                                    </span>
                                @endif

                                <button type="button" aria-label="Guardar anuncio"
                                    style="position: absolute; top: 7px; right: 7px; width: 26px; height: 26px; border: 0; border-radius: 999px; background-color: rgba(255, 255, 255, 0.90); color: #8f4659; font-size: 16px; line-height: 26px; box-shadow: 0 6px 12px rgba(143, 70, 89, 0.12);">
                                    &hearts;
                                </button>
                            </a>

                            {{-- Datos del anuncio. --}}
                            <div style="padding: 8px 2px 1px;">
                                <div style="display: grid; gap: 5px;">
                                    <div>
                                        <h2 style="font-size: 13px; line-height: 1.2; font-weight: 900; color: #1f171a; margin: 0 0 3px;">
                                            <a href="{{ route('listings.show', $listing) }}"
                                                style="color: inherit; text-decoration: none;">
                                                {{ $card?->idol_name ?? 'Photocard' }}
                                            </a>
                                        </h2>
                                        <p style="font-size: 11px; line-height: 1.35; color: #5c4046; margin: 0;">
                                            {{ $card?->group_name ?? 'K-Share' }} &middot; {{ $card?->album_era ?? 'Era sin indicar' }}
                                        </p>
                                    </div>

                                    <strong style="white-space: nowrap; font-size: 13px; color: #8f4659;">
                                        {{ number_format($listing->price, 2) }} {{ $listing->currency }}
                                    </strong>
                                </div>

                                @if ($listing->description)
                                    <p style="font-size: 11px; color: #5c4046; line-height: 1.4; margin: 8px 0 0;">
                                        {{ $listing->description }}
                                    </p>
                                @endif

                                <div style="display: flex; align-items: center; justify-content: space-between; gap: 6px; border-top: 1px solid #f1e5e8; margin-top: 10px; padding-top: 8px;">
                                    <span style="font-size: 10px; color: #8f7b82;">
                                        Publicado por {{ $listing->user?->username ?? 'usuario' }}
                                    </span>
                                    <span style="border-radius: 999px; background-color: #fff0f4; color: #8f4659; padding: 3px 7px; font-size: 9px; font-weight: 800;">
                                        Disponible
                                    </span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>
    </main>
@endsection
