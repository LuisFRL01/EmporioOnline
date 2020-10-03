<div>
    <x-jet-form-section submit="update">
        <x-slot name="title">
            {{ __('Endereço') }}
        </x-slot>
    
        <x-slot name="description">
            {{ __('Atualize as nformações do seu endereço') }}
        </x-slot>
    
        <x-slot name="form">

            <!-- Rua -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="rua" value="{{ __('Rua') }}" />
                <x-jet-input id="rua" type="text" class="mt-1 block w-full" wire:model.defer="rua" autocomplete="rua"/>
                <x-jet-input-error for="rua" class="mt-2" />
            </div>
    
            <!-- Número da residência -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="numeroResidencia" value="{{ __('Número da residência') }}" />
                <x-jet-input id="numeroResidencia" type="text" class="mt-1 block w-full" wire:model.defer="numResidencia" autocomplete="numeroResidencia"/>
                <x-jet-input-error for="numeroResidencia" class="mt-2" />
            </div>
    
            <!-- Bairro -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="bairro" value="{{ __('Bairro') }}" />
                <x-jet-input id="bairro" type="text" class="mt-1 block w-full" wire:model.defer="bairro" autocomplete="bairro" />
                <x-jet-input-error for="bairro" class="mt-2" />
            </div>
    
            <!-- CEP -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="cep" value="{{ __('CEP') }}" />
                <x-jet-input id="cep" type="number" class="mt-1 block w-full" wire:model.defer="cep" autocomplete="cep" />
                <x-jet-input-error for="cep" class="mt-2" />
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

            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled">
                {{ __('Salvar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>