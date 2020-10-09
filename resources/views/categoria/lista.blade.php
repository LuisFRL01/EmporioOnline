<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h1>
    </x-slot>
    
    <div class="py-10">
        <div class="max-w-7xl mx-auto lg:px-10 md:grid">
            <table class="table-auto">
                <thead>
                <tr>
                    <th class="px-4 py-2">Nome</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td class="border px-4 py-2">
                            {{$categoria->nome}}
                        </td>
                        <td class="border px-4 py-2">
                            <a href="/deletarCategoria/{{$categoria->id}}">Deletar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
    <x-jet-button class="m-8" onclick="window.location.href='/cadastroCategoria'" name="cadastrar">
        {{ __('Nova Categoria') }}
    </x-jet-button>
    <x-jet-secondary-button class="m-8" onclick="window.location.href='/dashboard'">
        {{__('Voltar')}}
    </x-jet-secondary-button>

</x-app-layout>
