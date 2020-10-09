<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Produto') }}
        </h1>
    </x-slot>

    <x-jet-validation-errors class="mb-4"/>

    <div class="py-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('atualizarProduto') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$produto->id}}">
                    <input type="hidden" name="user_id" value="{{$produto->user_id}}">
                    <div>
                        <x-jet-label class="mt-3" value="{{ __('Nome') }}"/>
                        <x-jet-input class="block mt-1 w-full" type="text" name="nome" value="{{$produto->nome}}"
                                     required
                                     autofocus autocomplete="nome"/>
                    </div>

                    <div>
                        <x-jet-label class="mt-3" value="{{ __('Quantidade') }}"/>
                        <x-jet-input class="block mt-1 w-full" type="number" name="quantidade"
                                     value="{{$produto->quantidade}}" required
                                     autofocus/>
                    </div>

                    <div>
                        <x-jet-label class="mt-3" value="{{ __('Preço') }}"/>
                        <x-jet-input class="block mt-1 w-full" type="number" name="preco"
                                     value="{{$produto->preco}}" required
                                     autofocus/>
                    </div>

                    <div>
                        <x-jet-label class="mt-3" value="{{ __('Descrição') }}"/>
                        <x-jet-input class="block mt-1 w-full" type="text" name="descricao"
                                     value="{{$produto->descricao}}"
                                     required autofocus autocomplete="descricao"/>
                    </div>

                    <div class="mt-3">
                        <label><input type="radio" id="estado1" name="estado" value="1" checked="true"> Novo
                        </label>
                        <label><input type="radio" id="estado2" name="estado" value="0"> Usado</label>
                    </div>


                    <br>
                    <x-jet-button type="submit" class="ml-0" name="alterar">
                        {{ __('Editar') }}
                    </x-jet-button>

                    <x-jet-secondary-button class="ml-0" onclick="window.location.href='/listarProdutos'">
                        {{__('Cancelar')}}
                    </x-jet-secondary-button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
