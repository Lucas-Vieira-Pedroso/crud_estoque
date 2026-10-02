<?php

include "../infra/conn.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$quantidade = $_POST["quantidade"];
$descricao = $_POST["descricao"];
$data_validade = $_POST["data_validade"];
$preco = $_POST["preco"];

$sql = "UPDATE produtos SET nome=?,categoria=?,quantidade=?,descricao=?,data_validade=?,preco=? WHERE id = ?";


$stmt = mysqli_prepare($conn, $sql);

if ($stmt){

    mysqli_stmt_bind_param($stmt, "ssisiii", $nome, $categoria, $quantidade, $descricao, $data_validade, $preco, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}
header("Location: ../index.php");