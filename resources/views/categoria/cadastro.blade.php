<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastro de Categorias') }}
        </h1>
    </x-slot>

    <x-jet-validation-errors class="m-5"/>

    <div class="py-10">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('cadastroCategoria') }}" method="post">
                    @csrf
                    <div class="m-2">
                        <x-jet-label class="mt-3 ml-3" value="{{ __('Nome') }}"/>
                        <x-jet-input class="block mt-1 ml-3 w-full" type="text" name="nome" required/>
                    </div>

                    <x-jet-button type="submit" class="m-5" name="cadastrar">
                        {{ __('Cadastrar') }}
                    </x-jet-button>

                    <x-jet-secondary-button class="m-5" onclick="window.location.href='/listaCategorias'">
                        {{__('Cancelar')}}
                    </x-jet-secondary-button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
