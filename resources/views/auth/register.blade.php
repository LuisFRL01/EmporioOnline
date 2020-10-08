<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Nome') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('CPF') }}" />
                <x-jet-input class="block mt-1 w-full" type="number" name="cpf" :value="old('cpf')" required />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Número de telefone') }}" />
                <x-jet-input class="block mt-1 w-full" type="number" name="numTelefone" :value="old('numTelefone')" required />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Rua') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="rua" :value="old('rua')" required />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Número da residência') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="numeroResidencia" :value="old('numeroResidencia')" required />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Bairro') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="bairro" :value="old('bairro')" required />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('CEP') }}" />
                <x-jet-input class="block mt-1 w-full" type="number" name="cep" :value="old('cep')" required />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Senha') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Confirme a senha') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já é cadastrado?') }}
                </a>

                <x-jet-button class="ml-4" name="register">
                    {{ __('Cadastrar-se') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
