<?php
require_once __DIR__ . '/infra/conn.php';
$resultadoProdutos = $conexao->query("SELECT id, nome, quantidade, preco, data_validade, categoria, descricao FROM produtos");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Estoque</h1>

    <h2>adicionar produto</h2>
    <form action="public/cadastrar.php" method="post">
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
    </form>

    <h2>Produtos cadastrados</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Data de validade</th>
                <th>Categoria</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($resultadoProdutos && $resultadoProdutos->num_rows > 0): ?>
                <?php while ($produto = $resultadoProdutos->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars((string) $produto['quantidade'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td>R$ <?= htmlspecialchars((string) $produto['preco'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($produto['data_validade'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($produto['categoria'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($produto['descricao'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                        <td>
                            <form action="public/editar.php" method="get" style="display: inline;">
                                <input type="hidden" name="id" value="<?= (int) $produto['id'] ?>">
                                <button type="submit">Editar</button>
                            </form>
                            <form action="public/excluir.php" method="post" style="display: inline;" onsubmit="return confirm('Deseja excluir este produto?');">
                                <input type="hidden" name="id" value="<?= (int) $produto['id'] ?>">
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Nenhum produto cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>


</body>
</html>