<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Categoria') }}
        </h1>
    </x-slot>

    <x-jet-validation-errors class="m-5"/>

    <div class="py-10">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('atualizaCategoria') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$categoria->id}}">
                    <div class="m-3">
                        <x-jet-label class="mt-3 ml-2" value="{{ __('Nome') }}"/>
                        <x-jet-input class="block mt-1 ml-2 w-full" type="text" name="nome" value="{{$categoria->nome}}" required/>
                    </div>

                    <div class="m-5">
                        <select name="categoriaMenu" id="categoriaMenu" class="bg-white border appearance-none border-gray-400 hover:border-gray-500 px-4 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option>Categoria Pai</option>
                              @foreach($todasCategorias as $cat)
                                  <option value="{{$cat->id}}">{{$cat->nome}}</option>
                              @endforeach
                          </select>
                     </div>

                    <x-jet-button type="submit" class="m-5" name="editar">
                        {{ __('Editar') }}
                    </x-jet-button>

                    <x-jet-secondary-button class="m-5" onclick="window.location.href='/listaCategorias'">
                        {{__('Cancelar')}}
                    </x-jet-secondary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
