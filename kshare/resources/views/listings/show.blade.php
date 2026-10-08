{{-- Detalle de un anuncio concreto --}}
@extends('layouts.app')

@section('titulo', 'Detalle del anuncio - K-Share')

@section('contenido')
    @php
        // Datos relacionados con el anuncio.
        $card = $listing->photocard;
        $image = $card?->image_url;
        $imageSrc = $image && \Illuminate\Support\Str::startsWith($image, ['http://', 'https://', '/'])
            ? $image
            : ($image ? asset($image) : asset('imagenes/logo.png'));
    @endphp

    <main style="font-family: sans-serif; background-color: #fff8fa; color: #8f4659; padding: 60px 32px 90px;">
        <section style="max-width: 1050px; margin: 0 auto;">
            <a href="{{ route('listings.index') }}"
                style="display: inline-flex; margin-bottom: 24px; color: #8f4659; text-decoration: none; font-weight: 800;">
                &larr; Volver a anuncios
            </a>

            <article style="display: grid; grid-template-columns: minmax(260px, 420px) minmax(0, 1fr); gap: 38px; background-color: #ffffff; border: 1px solid #f6dfe6; border-radius: 32px; padding: 24px; box-shadow: 0 18px 35px rgba(143, 70, 89, 0.10);">
                {{-- Imagen grande de la photocard. --}}
                <div style="overflow: hidden; border-radius: 24px; background: linear-gradient(145deg, #ffe4ec, #f8edf1); aspect-ratio: 4 / 5;">
                    <img src="{{ $imageSrc }}" alt="{{ $card?->idol_name ?? 'Photocard' }}"
                        style="width: 100%; height: 100%; object-fit: cover; display: block;">
                </div>

                {{-- Informacion completa del anuncio. --}}
                <div style="padding: 12px 0;">
                    @if ($card?->rarity)
                        <span style="display: inline-flex; border-radius: 999px; background-color: #fff0f4; color: #8f4659; padding: 6px 12px; font-size: 12px; font-weight: 900; text-transform: uppercase;">
                            {{ $card->rarity }}
                        </span>
                    @endif

                    <h1 style="font-size: 40px; line-height: 1.1; color: #1f171a; font-weight: 900; margin: 18px 0 10px;">
                        {{ $card?->idol_name ?? 'Photocard' }}
                    </h1>

                    <p style="font-size: 17px; color: #5c4046; margin: 0 0 24px;">
                        {{ $card?->group_name ?? 'K-Share' }} &middot; {{ $card?->album_era ?? 'Era sin indicar' }}
                    </p>

                    <strong style="display: block; font-size: 30px; color: #8f4659; margin-bottom: 24px;">
                        {{ number_format($listing->price, 2) }} {{ $listing->currency }}
                    </strong>

                    @if ($listing->description)
                        <div style="border-top: 1px solid #f1e5e8; border-bottom: 1px solid #f1e5e8; padding: 20px 0; margin-bottom: 22px;">
                            <h2 style="font-size: 15px; color: #8f4659; font-weight: 900; margin: 0 0 8px;">Descripcion</h2>
                            <p style="font-size: 15px; color: #5c4046; line-height: 1.55; margin: 0;">
                                {{ $listing->description }}
                            </p>
                        </div>
                    @endif

                    <p style="font-size: 14px; color: #8f7b82; margin: 0 0 24px;">
                        Publicado por {{ $listing->user?->username ?? 'usuario' }}
                    </p>

                    {{-- Boton temporal: mas adelante puede abrir chat o solicitud de compra/intercambio. --}}
                    <button type="button"
                        style="border: 0; border-radius: 999px; background-color: #8f4659; color: #ffffff; padding: 14px 28px; font-size: 15px; font-weight: 900; cursor: pointer;">
                        Contactar
                    </button>
                </div>
            </article>
        </section>
    </main>
@endsection
