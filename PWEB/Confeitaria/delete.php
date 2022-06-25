<?php
include 'connect.php';

$idProduto = $_GET["idProduto"];

$sql = "DELETE FROM produtos WHERE idProduto = $idProduto";

    echo "<br>".$sql;

    $result = mysqli_query($conn, $sql);

    echo"<br>".$result;

    header('Location: '."select.php");
?>