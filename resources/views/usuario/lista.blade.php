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
                                    <a href="/desativarUsuario/{{$usuario->id}}">Desativar</a>
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
