{{-- Pie de pagina --}}
<footer class="shrink-0 border-t border-[#eadde1] bg-[#f6eff1] px-5 py-10 text-[#3f3034] sm:py-12">
    <div class="mx-auto flex max-w-[1200px] flex-col items-center text-center">
        {{-- Logo --}}
        <a href="{{ url('/') }}" class="inline-flex" aria-label="Ir al inicio de K-Share">
            <img
                src="{{ asset('imagenes/logo.png') }}"
                alt="K-Share"
                class="h-auto w-[120px] object-contain sm:w-[145px]"
            >
        </a>

        {{-- Enlaces --}}
        <nav class="mt-5 flex flex-wrap items-center justify-center gap-x-6 gap-y-3 text-sm" aria-label="Enlaces del pie de pagina">
            <a
                href="{{ url('/nosotros') }}"
                class="font-medium transition-colors duration-300 hover:text-[#8f4659]"
            >Sobre nosotros</a>
            <a
                href="{{ url('/faq') }}"
                class="font-medium transition-colors duration-300 hover:text-[#8f4659]"
            >Preguntas frecuentes</a>
            <a
                href="{{ url('/contacto') }}"
                class="font-medium transition-colors duration-300 hover:text-[#8f4659]"
            >Contacto</a>
        </nav>

        {{-- Copyright --}}
        <p class="mt-5 text-xs text-[#8f7b81]">
            &copy; {{ date('Y') }} K-Share. Todos los derechos reservados.
        </p>
    </div>
</footer>
