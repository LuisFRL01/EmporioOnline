<x-app-layout-produto>
    <br>
    <h2 style="font-size: 32px" align="center">Pedidos</h2>
    @foreach ($pedidos as $pedido)
        <div class="container">
            <div class="w-full mb-8 flex justify-center order-2 lg:mb-1 lg:order-1">
                <div class="flex justify-center lg:justify-end">
                    <div class="border rounded-md max-w-md w-full px-4 py-3">

                        <div class="flex items-center justify-between">
                            <h3 class="text-gray-700 font-medium">Pedido ID: <b>{{$pedido->id}}</b></h3>
                            <span class="text-gray-700 mx-2">Total: <b>{{$pedido->total}}</b></span>
                            <span class="text-gray-700 mx-2">Data: <b>{{$pedido->data}}</b></span>
                        </div>
                        <br>
                        @foreach($pedido->itemPedidos as $item)
                            <h3 class="text-gray-700 font-medium">
                                <a href="{{route('produto', [$item->produto_id])}}">
                                    <b>{{\App\Models\Produto::find($item->produto_id)->nome}}</b>
                                </a>
                                </h3>
                            <div class="flex justify-between mt-2">
                                <div class="flex">
                                    <img class="h-20 w-20 object-cover rounded"
                                         src={{\App\Models\Produto::find($k)->photo_url}}
                                         alt="">
                                    <div class="mx-3">
                                        <h3 class="text-gray-700 mx-2">Preço: {{$item->preco}} <b>R$</b></h3>
                                        <div class="flex items-center mt-2">
                                                <span
                                                    class="text-gray-700 mx-2">Quantidade: {{$item->quantidade}}</span>
                                        </div>
                                        <div class="flex items-center mt-2">
                                            <span class="text-gray-700 mx-2">Frete: {{$item->frete}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="py-3">
        <div class="bg-white px-4 py-5 justify-between border-t border-gray-200 sm:px-6">
            {{ $pedidos->links() }}
        </div>
    </div>
</x-app-layout-produto>
