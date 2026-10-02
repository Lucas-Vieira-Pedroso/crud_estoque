<?php
include '../infra/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $data_validade = $_POST['data_validade'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO produtos (nome, quantidade, preco, data_validade, categoria, descricao) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("siidss", $nome, $quantidade, $preco, $data_validade, $categoria, $descricao);

    if ($stmt->execute()) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar produto: " . $conexao->error;
    }

    $stmt->close();
}

$conexao->close();

header("Location: ../index.php");

?>