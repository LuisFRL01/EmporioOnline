<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            <header class="bg-blue-500">
                @if (Route::has('login'))
                    <div class="hidden ml-6 pt-2 sm:block">
                        @auth
                            <a href="{{ url('dashboard') }}" class="text-sm text-black underline">Home</a>
                            <a href="{{ url('/') }}" class="text-sm text-black underline">Pagina Inicial</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-black underline">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-black underline">Register</a>
                            @endif
                        @endif
                    </div>
                @endif
                <div class="container mx-auto px-6 pb-3">
                    <div class="w-full text-black md:text-center text-3xl font-semibold">
                        Empório Online
                    </div>
                    <div class="relative mt-6 max-w-3xl mx-auto">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <form action="{{ route('pesquisaProduto') }}" method="get">
                            <div class="flex mb-4">
                                <input required name="search" class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline" type="text" placeholder="Procurar">
                                <div class="flex ml-6">
                                    <button type="submit" class="flex items-center pl-10 pr-4 py-2 bg-black text-white text-sm uppercase rounded">
                                        <span>Pesquisar</span>
                                        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </header>
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        <footer class="bg-gray-200">
            <div class="container mx-auto px-6 py-3 flex justify-between items-center">
                <a class="text-xl font-bold text-gray-500 hover:text-gray-400">Empório Online</a>
                <p class="py-2 text-gray-500 sm:py-0">Todos os direitos reservados</p>
            </div>
        </footer>

        @livewireScripts
    </body>
</html>
