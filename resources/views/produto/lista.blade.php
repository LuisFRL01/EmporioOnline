<x-app-layout>
    <x-slot name="header">
        <div style="position: relative;">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Produtos') }}
            </h1>
            <div style="position: absolute; right: 0; top: 0;">
                <x-jet-button class="ml-0" onclick="window.location.href='/cadastrarProduto'" name="cadastrar">
                    {{ __('Novo Produto') }}
                </x-jet-button>
                <x-jet-secondary-button class="ml-0" onclick="window.location.href='/dashboard'">
                    {{__('Voltar')}}
                </x-jet-secondary-button>
            </div>
        </div>
    </x-slot>

    <x-jet-validation-errors class="mb-4"/>

    <div class="container">
        <div class="py-5 px-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-20">
                @if(!empty($produtos))
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
                                    @if($produto->estado)
                                        Novo
                                    @else
                                        Usado
                                    @endif
                                </td>
                                <td align="center" class="border px-4 py-2">
                                    <a href="/editarProduto/{{$produto->id}}">Editar</a> -
                                    <a href="/deletarProduto/{{$produto->id}}">Deletar</a> -
                                    <a href="/produto/{{$produto->id}}">Pagina</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    <div class="py-3">
        <div class="bg-white px-4 py-5 justify-between border-t border-gray-200 sm:px-6">
            {{ $produtos->links() }}
        </div>
    </div>

</x-app-layout>
