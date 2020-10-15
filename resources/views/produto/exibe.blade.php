<x-app-layout-produto>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produto') }}
        </h1>
    </x-slot>
    <div class="bg-white">
        <main class="my-8">
            <div class="container mx-auto px-6 pt-6">
                <div class="md:flex md:items-center">
                    <div class="w-full h-64 md:w-1/2 lg:h-96">
                        <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="https://images.unsplash.com/photo-1578262825743-a4e402caab76?ixlib=rb-1.2.1&auto=format&fit=crop&w=1051&q=80" alt="Nike Air">
                    </div>
                    <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                        <h3 class="text-gray-700 uppercase text-lg">{{$produto->nome}}</h3>
                        <span class="text-gray-500 mt-3">R${{$produto->preco}}</span>
                        <hr class="my-3">
                        <div class="mt-2">
                            <h3 class="text-gray-800 text-lg" for="count">Quantidade disponível:</h3>
                            <div class="flex items-center mt-1">
                                <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </button>
                                <span class="text-gray-700 text-lg mx-2">{{$produto->quantidade}}</span>
                                <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </button>
                            </div>
                        </div>
                        <hr class="my-3">
                        <h3 class="text-gray-700 text-lg">Estado: 
                            @if ($produto->quantidade)
                                Novo
                            @else
                                Usado
                            @endif
                        </h3>
                        <div class="flex items-center mt-6">
                            <button class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Compre agora</button>
                            <button class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div class="mt-16 ml-15 mb-6">
            <h3 class="text-gray-600 text-2xl font-medium">Descrição</h3>
            <p class="mt-2 text-gray-800">{{$produto->descricao}}</p>
        </div>

        <footer class="bg-gray-200">
            <div class="container mx-auto px-6 py-3 flex justify-between items-center">
                <a class="text-xl font-bold text-gray-500 hover:text-gray-400">Empório Online</a>
                <p class="py-2 text-gray-500 sm:py-0">Todos os direitos reservados</p>
            </div>
        </footer>
    </div>
</x-app-layout-produto>
