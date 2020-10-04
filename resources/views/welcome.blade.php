<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @livewireStyles
    </head>

    <body>
        @livewire('cadastro')
        @livewireScripts
    </body>

</html>
