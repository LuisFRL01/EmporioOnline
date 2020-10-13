@inject('listaController', 'App\Http\Controllers\ListaCategoriasController')

<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h1>
    </x-slot>
    
    <div class = "container">
        <div class="py-10">
            <div class="max-w-7xl mx-auto md:grid lg:px-10">
                @if (!empty($categorias))
                    <table class="table-auto">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">Nome</th>
                            <th class="px-4 py-2">Categoria Pai</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categorias as $categoria)
                            <tr>
                                <td class="border px-4 py-2">
                                    {{$categoria->nome}}
                                </td>
                                <td class="border px-4 py-2">
                                    @if($categoria->categoria_id != null)
                                        {{ $listaController::returnCategoriaPai($categoria->categoria_id) }}
                                    @else
                                        Sem categoria pai
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="/deletarCategoria/{{$categoria->id}}">Deletar</a>
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
            {{ $categorias->links() }}
        </div>
    </div>

    <x-jet-button class="m-8" onclick="window.location.href='/cadastroCategoria'" name="cadastrar">
        {{ __('Nova Categoria') }}
    </x-jet-button>
    
    <x-jet-secondary-button class="m-8" onclick="window.location.href='/dashboard'">
        {{__('Voltar')}}
    </x-jet-secondary-button>

</x-app-layout>
