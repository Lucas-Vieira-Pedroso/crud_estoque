<?php

require_once __DIR__ . '/../infra/conn.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    header('Location: ../index.php');
    exit;
}

$stmt = $conexao->prepare('SELECT * FROM produtos WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$resultado = $stmt->get_result();
$produto = $resultado->fetch_assoc();
$stmt->close();

if (!$produto) {
    header('Location: ../index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - estoque</title>
</head>

<body>
    <header>
        <h1>CRUD - estoque</h1>
    </header>
    <main>
        <h2>Editando o produto <?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?></h2>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?= (int) $produto['id'] ?>">

            <label for="nome">nome:</label>
            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?>" required>
            <br>
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" id="categoria" value="<?= htmlspecialchars($produto['categoria'], ENT_QUOTES, 'UTF-8') ?>" required>
            <br>
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" value="<?= (int) $produto['quantidade'] ?>" required>
            <br>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" value="<?= htmlspecialchars($produto['descricao'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
            <br>
            <label for="data_validade">Data de Validade:</label>
            <input type="date" name="data_validade" id="data_validade" value="<?= htmlspecialchars($produto['data_validade'], ENT_QUOTES, 'UTF-8') ?>" required>
            <br>
            <label for="preco">Preço:</label>
            <input type="number" name="preco" id="preco" step="0.01" value="<?= htmlspecialchars((string) $produto['preco'], ENT_QUOTES, 'UTF-8') ?>" required>
            <br>
            <button type="submit">Atualizar</button>
        </form>

    </main>
    <footer>

    </footer>


</body>

</html>