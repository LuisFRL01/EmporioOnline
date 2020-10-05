<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8"/>
    <title>Lista de Produtos do Usuário</title>
</head>
<body>
<h1>Lista de Produtos do Usuario</h1><br>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Quantidade</th>
        <th>Preço</th>
        <th>Estado</th>
    </tr>
        @foreach($produtos as $produto)
            <tr>
                <td>
                    {{$produto->nome}}
                </td>
                <td>
                    {{$produto->descricao}}
                </td>
                <td>
                    {{$produto->quantidade}}
                </td>
                <td>
                    {{$produto->preco}}
                </td>
                <td>
                    @if($produto->estado == true)
                        Novo
                    @else
                        Usado
                    @endif
                </td>
            </tr>
        @endforeach

</table>
<br>
<a href="/cadastrarProduto">
    <button>Cadastrar Produto</button>
</a>
<a href="/dashboard">
    <button>Voltar</button>
</a>

</body>
</html>
