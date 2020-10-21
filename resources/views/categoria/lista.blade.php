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
                                    <form action="/editaCategoria/{{$categoria->id}}" method="get">
                                        <button
                                            class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                                 stroke-linejoin="round"
                                                 stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M18.303,4.742l-1.454-1.455c-0.171-0.171-0.475-0.171-0.646,0l-3.061,3.064H2.019c-0.251,0-0.457,0.205-0.457,0.456v9.578c0,0.251,0.206,0.456,0.457,0.456h13.683c0.252,0,0.457-0.205,0.457-0.456V7.533l2.144-2.146C18.481,5.208,18.483,4.917,18.303,4.742 M15.258,15.929H2.476V7.263h9.754L9.695,9.792c-0.057,0.057-0.101,0.13-0.119,0.212L9.18,11.36h-3.98c-0.251,0-0.457,0.205-0.457,0.456c0,0.253,0.205,0.456,0.457,0.456h4.336c0.023,0,0.899,0.02,1.498-0.127c0.312-0.077,0.55-0.137,0.55-0.137c0.08-0.018,0.155-0.059,0.212-0.118l3.463-3.443V15.929z M11.241,11.156l-1.078,0.267l0.267-1.076l6.097-6.091l0.808,0.808L11.241,11.156z"></path>
                                            </svg>
                                        </button>
                                    </form>
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
