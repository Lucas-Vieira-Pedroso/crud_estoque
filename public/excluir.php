<?php
require_once __DIR__ . '/../infra/conn.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if ($id) {
    $stmt = $conexao->prepare('DELETE FROM produtos WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
}
header('Location: ../index.php');
exit;
?>