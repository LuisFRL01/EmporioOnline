<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h1>
    </x-slot>
    
    <div class = "container">
        <div class="py-10">
            <div class="max-w-7xl mx-auto md:grid lg:px-10">
                @if (!empty($usuarios))
                    <table class="table-auto">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">Nome</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">CPF</th>
                            <th class="px-4 py-2">Número de Telefone</th>
                            <th class="px-4 py-2">Rua</th>
                            <th class="px-4 py-2">Número da Residência</th>
                            <th class="px-4 py-2">Bairro</th>
                            <th class="px-4 py-2">CEP</th>
                            <th class="px-4 py-2">Ativo</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td class="border px-4 py-2">
                                    {{$usuario->name}}
                                </td>
                                <td class="border px-4 py-2">
                                    {{$usuario->email}}
                                </td>
                                <td class="border px-4 py-2">
                                    {{$usuario->cpf}}
                                </td>
                                <td class="border px-4 py-2">
                                    {{$usuario->numTelefone}}
                                </td>
                                <td class="border px-4 py-2">
                                    {{$usuario->rua}}
                                </td>
                                <td class="border px-4 py-2">
                                    {{$usuario->numeroResidencia}}
                                </td>
                                <td class="border px-4 py-2">
                                    {{$usuario->bairro}}
                                </td>
                                <td class="border px-4 py-2">
                                    {{$usuario->cep}}
                                </td>
                                <td class="border px-4 py-2">
                                    @if ($usuario->ativo == 1)
                                        Sim
                                    @else
                                        Não
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    <form action="/desativaUsuario/{{$usuario->id}}" onclick="return confirm('Você Tem Certeza?')">
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
            {{ $usuarios->links() }}
        </div>
    </div>

    <x-jet-secondary-button class="m-8" onclick="window.location.href='/dashboard'">
        {{__('Voltar')}}
    </x-jet-secondary-button>

</x-app-layout>
