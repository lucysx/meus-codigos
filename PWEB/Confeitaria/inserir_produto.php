<?php

include 'connect.php';

$stmt = mysqli_stmt_init($conn);
  
// Inserindo o registro no banco de dados
  
$stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "INSERT INTO produtos (foto, categoria, descricao, numFatias, valor) VALUES (?, ?, ?, ?, ?)");   

if ($stmt_prepared_okay) {

    mysqli_stmt_bind_param($stmt, "sssss", $foto, $categoria, $descricao, $numFatias, $valor);    

    $foto = mysqli_real_escape_string($conn, $_REQUEST['foto']);
    $categoria = mysqli_real_escape_string($conn, $_REQUEST['categoria']);
    $descricao = mysqli_real_escape_string($conn, $_REQUEST['descricao']);
    $numFatias = mysqli_real_escape_string($conn, $_REQUEST['numFatias']);
    $valor = mysqli_real_escape_string($conn, $_REQUEST['valor']);
    
    $stmt_executed_okay = mysqli_stmt_execute($stmt);

    if ($stmt_executed_okay) {
       echo '<div class = center_images>';	
       echo '<label> Seu produto foi gravado em nossa base. </label><br>';
       echo '</div>';
    } else {
        echo '<div class = center_images>';	
        echo '<label> Não foi possível cadastrar o produto. </label><br>' . mysqli_error($conn);
        echo '</div>';
        exit;
    }
  
mysqli_stmt_close($stmt);
}

?>