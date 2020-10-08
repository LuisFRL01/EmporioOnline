<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h1>
    </x-slot>


    <x-jet-validation-errors class="mb-4"/>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">
            <table class="table-auto">
                <thead>
                <tr>
                    <th class="px-4 py-2">Nome</th>
                    <th class="px-4 py-2">Descrição</th>
                    <th class="px-4 py-2">Quantidade</th>
                    <th class="px-4 py-2">Preço</th>
                    <th class="px-4 py-2">Estado</th>
                </tr>
                </thead>
                <tbody>
                @foreach($produtos as $produto)
                    @can('read-produto', $produto)
                        <tr>
                            <td class="border px-4 py-2">
                                {{$produto->nome}}
                            </td>
                            <td class="border px-4 py-2">
                                {{$produto->descricao}}
                            </td>
                            <td class="border px-4 py-2">
                                {{$produto->quantidade}}
                            </td>
                            <td class="border px-4 py-2">
                                {{$produto->preco}}
                            </td>
                            <td class="border px-4 py-2">
                                @if($produto->estado == true)
                                    Novo
                                @else
                                    Usado
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                <a href="/editarProduto/{{$produto->id}}">Editar</a> -
                                <a href="/deletarProduto/{{$produto->id}}">Deletar</a>
                            </td>
                        </tr>
                    @endcan
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
    <x-jet-button class="ml-0" onclick="window.location.href='/cadastrarProduto'">
        {{ __('Novo Produto') }}
    </x-jet-button>
    <x-jet-secondary-button class="ml-0" onclick="window.location.href='/dashboard'">
        {{__('Voltar')}}
    </x-jet-secondary-button>

</x-app-layout>
