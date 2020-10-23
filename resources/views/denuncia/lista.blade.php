<x-app-layout>
    <x-slot name="header">
        <div style="position: relative;">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Denúncias') }}
            </h1>
        </div>
    </x-slot>

    <x-jet-validation-errors class="mb-4"/>

    <div class="container">
        <div class="py-5 px-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-20">
                @if(!empty($denuncias))
                    <table class="table-auto">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">Mensagem</th>
                            <th class="px-4 py-2">Usuário que fez a denúncia</th>
                            <th class="px-4 py-2">Anúncio</th>
                            <th class="px-4 py-2">ID Anúncio</th>
                            <th class="px-4 py-2">Situação</th>
                            <th class="px-4 py-2"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($denuncias as $denuncia)
                            <tr>
                                <td class="border px-4 py-2">
                                    {{$denuncia->mensagem}}
                                </td>
                                <td class="border px-4 py-2">
                                    {{\App\Models\User::find($denuncia->user_id)->name}}
                                </td>
                                <td class="border px-4 py-2">
                                    {{\App\Models\Produto::find($denuncia->produto_id)->nome}}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ $denuncia->produto_id }}
                                </td>
                                <td class="border px-4 py-2">
                                   @if ($denuncia->resolvido == 1)
                                       Resolvido
                                   @else
                                       Não Resolvido
                                   @endif
                                </td>
                                <td class="border px-4 py-2">
                                    <form action="/resolveDenuncia/{{$denuncia->id}}" onclick="return confirm('Você Tem Certeza?')">
                                        <button
                                            class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
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
            {{ $denuncias->links() }}
        </div>
    </div>

    <x-jet-secondary-button class="m-8" onclick="window.location.href='/dashboard'">
        {{__('Voltar')}}
    </x-jet-secondary-button>

</x-app-layout>
