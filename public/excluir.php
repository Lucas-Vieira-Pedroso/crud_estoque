<?php
include "../infra/conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM produtos WHERE id=?";
$stmt = mysqli_prepare($conn, $sql);
if(stmt){
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
header("Location: ../index.php");
?>