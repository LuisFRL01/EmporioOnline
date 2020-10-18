<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-8 text-2xl">
        Bem vindo ao seu perfil.
    </div>

    @if ( Auth::user()->tipo == 'user')
        <div class="mt-6 text-gray-500">
            Essa área é destinada a cadastrar seus produtos, informar se aconteceu algo de errado a sua compra e 
            alterar informações do seu perfil.
        </div>
    @else
        <div class="mt-6 text-gray-500">
            Essa área é destinada a ver suas informações, cadastrar categorias, listar, desativar e resolver as denúncias dos usuários.
        </div>
    @endif
</div>