<x-app-layout-produto>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pedido') }}
        </h1>
    </x-slot>

    <h1>Itens</h1>
    <ul>
        <li><b>Nome - Quantidade - Preco</b></li>
        @foreach (Session::get('itens') as $k => $item )
            <li>{{ $item['produto'] }} - {{$item['quantidade']}} - {{$item['preco']}} </li>
        @endforeach
    </ul>

</x-app-layout-produto>
