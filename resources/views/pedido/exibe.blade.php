<x-app-layout-produto>
    <div class="flex flex-col lg:flex-row mt-8 mb-8">
        <div class="ml-6">
            <h3 class="text-black text-2xl font-medium">Checkout</h3>
            <div>
                <h4 class="text-sm text-black mt-3 font-medium">Delivery method</h4>
                <div class="mt-6">
                    <button
                        class="flex items-center justify-between w-full bg-white rounded-md border-2 border-blue-500 p-4 focus:outline-none">
                        <label class="flex items-center">
                            <input type="radio" class="form-radio h-5 w-5 text-blue-600" checked><span
                                class="ml-2 text-sm text-gray-700">MS Delivery</span>
                        </label>

                        <span class="text-gray-600 text-sm">$18</span>
                    </button>
                    <button
                        class="mt-6 flex items-center justify-between w-full bg-white rounded-md border p-4 focus:outline-none">
                        <label class="flex items-center">
                            <input type="radio" class="form-radio h-5 w-5 text-blue-600"><span
                                class="ml-2 text-sm text-gray-700">DC Delivery</span>
                        </label>

                        <span class="text-gray-600 text-sm">$26</span>
                    </button>
                </div>
            </div>
            <div>
                <h4 class="text-lg text-black font-medium my-5">Endereço de entrega</h4>
                <div class="mt-6">
                    <h4 class="text-lg text-black font-medium">Rua: {{Auth::user()->rua}}</h4>
                    <h4 class="text-lg text-black font-medium">Número
                        Residencia: {{Auth::user()->numeroResidencia}}</h4>
                    <h4 class="text-lg text-black font-medium">Bairro: {{Auth::user()->bairro}}</h4>
                    <h4 class="text-lg text-black font-medium">CEP: {{Auth::user()->cep}}</h4>
                </div>
            </div>
            <div>
                <h4 class="text-lg text-black font-medium my-5">Cartão:
                    @if (Auth::user()->cartao)
                        {{Auth::user()->cartao}}
                    @else
                        <h3 class="text-red-700 text-lg" for="count">
                            Adicione um cartão para prosseguir com a compra
                            <a href="/user/profile" class="text-red-700 text-lg underline">Adicionar cartão no perfil</a>
                        </h3>
                    @endif
                </h4>
                <div class="flex items-center justify-between mt-8">
                    <form action="{{ route('finalizarPedido') }}" method="get">
                        <button @if (!Auth::user()->cartao) disabled='disabled' @endif
                            class="flex items-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <span>Comprar</span>
                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-full mb-8 flex-shrink-0 order-1 lg:w-1/2 lg:mb-0 lg:order-2">
            <div class="flex justify-center lg:justify-end">
                <div class="border rounded-md max-w-md w-full px-4 py-3">
                    @foreach (Session::get('itens') as $k => $item )
                        <div class="flex items-center justify-between">
                            <h3 class="text-gray-700 font-medium">Subtotal: <b>{{$item['preco'] * $item['quantidade']}}
                                    R$</b></h3>
                        </div>
                        <div class="flex justify-between mt-6">
                            <div class="flex">
                                <img class="h-20 w-20 object-cover rounded"
                                     src={{\App\Models\Produto::find($k)->photo_url}}
                                     alt="">
                                <div class="mx-3">
                                    <h3 class="text-gray-700 mx-2">{{$item['produto']}}</h3>
                                    <div class="flex items-center mt-2">
                                        <span class="text-gray-700 mx-2">Quantidade: {{$item['quantidade']}}</span>
                                    </div>
                                </div>
                            </div>
                            <span class="text-gray-600">R${{$item['preco']}}</span>
                        </div>
                        <br>
                        <a href="{{ route('removerPedido', ['produto_id' => $k]) }}">Remover</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout-produto>
