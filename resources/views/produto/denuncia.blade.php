<x-app-layout-produto>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produto') }}
        </h1>
    </x-slot>
    <div class="bg-white">
        <main class="m-6">
            <div class="mb-3 w-72">
                @if (session()->has('success'))
                    <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <h3 class="text-black text-2xl font-medium">Digite o motivo do anúncio ser fraudulento</h3>
            <form action="{{ route('denunciaAnuncio') }}" method="post">
                @csrf
                <input type="hidden" name="produto_id" value="{{ $id }}"/>
                <textarea name="mensagem" id="denuncia" class="h-64 w-2/3 resize-none border rounded focus:outline-none focus:shadow-outline"></textarea>
                <x-jet-input-error for="mensagem" class="mt-2" />
                <div class="flex items-center mt-3">
                    <button type="submit"
                    class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                        Denunciar
                    </button>
                </div>
            </form>
        </main>
    </div>
</x-app-layout-produto>
