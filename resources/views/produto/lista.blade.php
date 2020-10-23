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
                @if(!empty($produtos[0]))
                    <table class="table-auto">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">Nome</th>
                            <th class="px-4 py-2">Descrição</th>
                            <th class="px-4 py-2">Quantidade</th>
                            <th class="px-4 py-2">Preço</th>
                            <th class="px-4 py-2">Estado</th>
                            <th class="px-4 py-2">Categoria</th>
                            <th class="px-4 py-2">Ações</th>
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
                                <td class="border px-4 py-2">
                                    {{$produto->categoria->nome}}
                                </td>
                                <td align="center" class="border px-4 py-2">
                                    <form action="/editarProduto/{{$produto->id}}" method="get">
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
                                    <form action="/deletarProduto/{{$produto->id}}" onclick="return confirm('Você Tem Certeza?')">
                                        <button
                                            class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                                 stroke-linejoin="round"
                                                 stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M10.185,1.417c-4.741,0-8.583,3.842-8.583,8.583c0,4.74,3.842,8.582,8.583,8.582S18.768,14.74,18.768,10C18.768,5.259,14.926,1.417,10.185,1.417 M10.185,17.68c-4.235,0-7.679-3.445-7.679-7.68c0-4.235,3.444-7.679,7.679-7.679S17.864,5.765,17.864,10C17.864,14.234,14.42,17.68,10.185,17.68 M10.824,10l2.842-2.844c0.178-0.176,0.178-0.46,0-0.637c-0.177-0.178-0.461-0.178-0.637,0l-2.844,2.841L7.341,6.52c-0.176-0.178-0.46-0.178-0.637,0c-0.178,0.176-0.178,0.461,0,0.637L9.546,10l-2.841,2.844c-0.178,0.176-0.178,0.461,0,0.637c0.178,0.178,0.459,0.178,0.637,0l2.844-2.841l2.844,2.841c0.178,0.178,0.459,0.178,0.637,0c0.178-0.176,0.178-0.461,0-0.637L10.824,10z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="/produto/{{$produto->id}}" method="get">
                                        <button
                                            class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                                 stroke-linejoin="round"
                                                 stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                <path fill="none" d="M17.696,9.368H2.305c-0.189,0-0.367,0.092-0.478,0.245c-0.11,0.155-0.141,0.352-0.08,0.532l2.334,6.918c0.081,0.238,0.305,0.4,0.556,0.4h10.735c0.253,0,0.478-0.162,0.557-0.402l2.323-6.917c0.062-0.179,0.03-0.376-0.079-0.531C18.062,9.459,17.886,9.368,17.696,9.368z M14.95,16.287H5.062l-1.938-5.743h13.753L14.95,16.287z"></path>
                                                <path fill="none" d="M6.345,7.369c0.325,0,0.588-0.263,0.588-0.588c0-1.691,1.376-3.067,3.067-3.067c1.691,0,3.067,1.376,3.067,3.067c0,0.325,0.264,0.588,0.588,0.588c0.326,0,0.589-0.263,0.589-0.588c0-2.34-1.904-4.243-4.244-4.243c-2.34,0-4.244,1.903-4.244,4.243C5.757,7.106,6.02,7.369,6.345,7.369z"></path>
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
            {{ $produtos->links() }}
        </div>
    </div>

</x-app-layout>
