<x-app-layout-produto>
    <div class="bg-white">
        <main class="my-8">
            <div class="container mx-auto px-6 pt-6">
                <div class="md:flex md:items-center">
                    <div class="w-full h-64 md:w-1/2 lg:h-96">
                        <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto"
                             src={{ asset($produto->photo_url)}}
                             alt="ProdutoImg">
                    </div>
                    <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                        <div align="right">
                            <form action="/pedido" method="get">
                                <button
                                @auth
                                    @if (Auth::user()->tipo == 'admin')
                                        disabled='disabled'
                                    @endif
                                @else
                                    class="pointer-events-none"
                                @endif
                                class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <h3 class="text-gray-700 uppercase text-lg">{{$produto->nome}}</h3>
                        <span class="text-gray-500 mt-3">R${{$produto->preco}}</span>
                        <hr class="my-3">
                        <div class="mt-2">
                            <h3 class="text-gray-800 text-lg" for="count">Quantidade disponível:
                                <span class="text-gray-700 text-lg mx-0">{{$produto->quantidade}}</span>
                            </h3>
                        </div>
                        <hr class="my-3">
                        <h3 class="text-gray-700 text-lg">Estado:
                            @if ($produto->quantidade)
                                Novo
                            @else
                                Usado
                            @endif
                        </h3>
                        <hr class="my-3">
                        <form action="{{ route('adicionarPedido') }}" method="post">
                            @csrf
                            <input type="hidden" name="produto_id" value="{{ $produto->id }}"/>
                            <h3 class="text-gray-800 text-lg" for="count">
                                Quantidade Desejada: <input type="number" name="quantidade" min='1' max='10' value='1'/>
                            </h3>
                            <div class="flex items-center mt-3">
                                <button
                                @auth
                                    @if (Auth::user()->tipo == 'admin')
                                        disabled='disabled'
                                    @endif
                                @else
                                    disabled='disabled'
                                @endif
                                class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                                    Compre agora
                                </button>
                            </div>
                        </form>
                        <div class="mt-3">
                            <a
                            @auth
                                @if (Auth::user()->tipo == 'admin')
                                    class="pointer-events-none"
                                @endif
                            @else
                                class="pointer-events-none"
                            @endif
                            href="/denunciaAnuncio/{{ $produto->id }}" class="text-blue-600">Denunciar Anúncio</a>
                        </div>
                        @auth
                            @if (Auth::user()->tipo == 'admin')
                                <h3 class="text-red-700 text-lg" for="count">
                                    Administradores não podem realizar compras.
                                </h3>
                            @endif
                        @else
                            <h3 class="text-red-700 text-lg" for="count">
                                Você deve estar logado para realizar a compra ou denunciar o anúncio
                            </h3>
                        @endif
                    </div>
                </div>
            </div>
        </main>
        <div class="mt-16 ml-15 mb-6">
            <h3 class="text-gray-600 text-2xl font-medium">Descrição</h3>
            <p class="mt-2 text-gray-800">{{$produto->descricao}}</p>
        </div>
    </div>
</x-app-layout-produto>
