<?php

require_once __DIR__ . '/../infra/conn.php';

$id = $_POST["id"];
$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$quantidade = $_POST["quantidade"];
$descricao = $_POST["descricao"];
$data_validade = $_POST["data_validade"];
$preco = $_POST["preco"];

$sql = "UPDATE produtos SET nome=?,categoria=?,quantidade=?,descricao=?,data_validade=?,preco=? WHERE id = ?";


$stmt = $conexao->prepare($sql);

if ($stmt){

    $stmt->bind_param("ssissdi", $nome, $categoria, $quantidade, $descricao, $data_validade, $preco, $id);
    $stmt->execute();
    $stmt->close();

}
header("Location: ../index.php");
exit;