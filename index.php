<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Estoque</h1>

    <h2>adicionar produto</h2>
    <form action="adicionar_produto.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <br>
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" required>
        <br>
        <label for="categoria">Categoria:</label>
        <input type="text" name="categoria" id="categoria" required>
        <br>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" required>
        <br>
        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" required>
        <br>
        <label for="data_validade">Data de Validade:</label>
        <input type="date" name="data_validade" id="data_validade" required>
        <br>
        <button type="submit" value="Adicionar Produto">Adicionar Produto</button>


</body>
</html>