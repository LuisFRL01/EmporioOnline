<div>
    <x-jet-form-section submit="update">
        <x-slot name="title">
            {{ __('Cartão') }}
        </x-slot>
    
        <x-slot name="description">
            {{ __('Atualize as informações do seu cartão') }}
        </x-slot>
    
        <x-slot name="form">

            <!-- Cartão -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="cartao" value="{{ __('Cartão') }}" />
                <x-jet-input id="cartao" type="number" class="mt-1 block w-full" wire:model.defer="cartao" autocomplete="cartao"/>
                <x-jet-input-error for="cartao" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                @if (session()->has('success'))
                    <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-button wire:loading.attr="disabled">
                {{ __('Salvar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>