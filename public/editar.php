<?php

include "../infra/conn.php";

$id = $_GET["id"];
$sql = "SELECT * FROM produtos WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $livro = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($stmt);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - estoque</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>CRUD - estoque</h1>
    </header>
    <main>
        <h2>Editando o produto <?php echo $["titulo"]?>!</h2>
        <form  method="POST">
            <input type="hidden" name="id" value="<?php echo $produto["id"]?>">

            <label for="nome">nome:</label>
            <input type="text" name="nome" value="<?php echo $produto["nome"]?>">
            <br>
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" value="<?php echo $produto["categoria"]?>">
            <br>
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" value="<?php echo $produto["quantidade"]?>">
            <br>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" value="<?php echo $produto["descricao"]?>">
            <br>
            <label for="data_validade">Data de Validade:</label>
            <input type="date" name="data_validade" value="<?php echo $produto["data_validade"]?>">
            <br>
            <label for="preco">Preço:</label>
            <input type="number" name="preco" value="<?php echo $produto["preco"]?>">
            <br>
            <button type="submit">Atualizar</button>
        </form>

    </main>
    <footer>

    </footer>


</body>

</html>