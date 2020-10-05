<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastrar Produto</title>
    <meta charset="utf-8">
</head>
<body>
<h1>Cadastro de Produto</h1>
<form action="/cadastrarProduto" method="post">
    @csrf
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome"/><br>

    <label for="quantidade">Quantidade:</label><br>
    <input type="number" id="quantidade" name="quantidade"/><br>

    <label for="preco">Preço:</label><br>
    <input type="number" id="preco" name="preco"/><br>

    <label for="descricao">Descrição:</label><br>
    <input type="text" id="descricao" name="descricao"/><br>

    <label><input type="radio" id="estado1" name="estado" value="1" checked="true">Novo</label>
    <label><input type="radio" id="estado2" name="estado" value="0">Usado</label><br>


    <input type="submit" value="Cadastrar"/>


</form>
</body>
</html>
