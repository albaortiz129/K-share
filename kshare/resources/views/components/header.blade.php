{{-- Cabecera principal --}}
<header class="w-full border-b border-[#f1e5e8] bg-[#fffafb]">
    <div
        class="mx-auto flex max-w-[1200px] flex-col items-center gap-4 px-4 py-3 md:flex-row md:justify-between md:px-5">
        {{-- Logo --}}
        <div class="flex w-full justify-center md:flex-1 md:justify-start">
            <a href="{{ url('/') }}" class="block">
                <img src="{{ asset('imagenes/logo.png') }}" alt="K-Share"
                    class="h-[50px] sm:h-[54px] block object-contain">
            </a>
        </div>

        {{-- Menu principal --}}
        <div class="w-full md:flex-1 flex justify-center">
            <nav class="flex flex-wrap justify-center gap-x-4 gap-y-2 sm:gap-[25px] text-sm sm:text-base">
                <a href="{{ url('/') }}"
                    class="{{ Request::is('/') ? 'text-[#8f4659] font-bold' : 'text-[#3f3034] font-medium hover:text-[#8f4659] transition-colors duration-300' }}">Mercado</a>
                <a href="{{ url('/trades') }}"
                    class="{{ Request::is('trades') ? 'text-[#8f4659] font-bold' : 'text-[#3f3034] font-medium hover:text-[#8f4659] transition-colors duration-300' }}">Tradeos</a>
                <a href="{{ url('/listings') }}"
                    class="{{ Request::is('listings') ? 'text-[#8f4659] font-bold' : 'text-[#3f3034] font-medium hover:text-[#8f4659] transition-colors duration-300' }}">Anuncios</a>
            </nav>
        </div>

        {{-- Botones de autenticacion --}}
        <div class="w-full md:flex-[1.2] flex items-center justify-center md:justify-end">
            @guest
                <div class="flex items-center gap-1 sm:gap-2">
                    <a href="{{ url('/login') }}"
                        class="rounded-full bg-transparent px-8 py-3 text-sm font-bold text-[#8f4659] transition-colors duration-300 hover:bg-[#8f4659] hover:text-white sm:px-2 sm:text-base">
                        Iniciar sesión
                    </a>
                    <a href="{{ url('/registro') }}"
                        class="rounded-full bg-transparent px-8 py-3 text-sm font-bold text-[#8f4659] transition-colors duration-300 hover:bg-[#8f4659] hover:text-white sm:px-2 sm:text-base">
                        Regístrate
                    </a>
                </div>
            @endguest

            @auth
                <div class="flex flex-wrap items-center justify-center gap-3 md:justify-end">
                    <a href="{{ url('/perfil') }}"
                        class="text-sm font-semibold text-[#8f4659] transition-colors hover:text-[#743647] sm:text-base">Mi perfil</a>

                    @if (Route::has('logout'))
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit"
                                class="rounded-lg bg-[#8f4659] px-4 py-2 text-xs font-bold text-white transition-colors hover:bg-[#743647] sm:text-sm">Cerrar sesión</button>
                        </form>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</header>
