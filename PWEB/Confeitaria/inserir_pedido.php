<?php

include 'connect.php';

$stmt = mysqli_stmt_init($conn);
  
// Inserindo o registro no banco de dados
  
$stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "INSERT INTO pedidos (nomeCompleto, usuario, email, endereco, complemento, pais, estado, cep, entrega, salvar, pagMetodo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");   

if ($stmt_prepared_okay) {

    mysqli_stmt_bind_param($stmt, "sssssssssss", $nomeCompleto, $usuario, $email, $endereco, $complemento, $pais, $estado, $cep, $entrega, $salvar, $pagMetodo);    

    $nomeCompleto = mysqli_real_escape_string($conn, $_REQUEST['nomeCompleto']);
    $usuario = mysqli_real_escape_string($conn, $_REQUEST['usuario']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $endereco = mysqli_real_escape_string($conn, $_REQUEST['endereco']);
    $complemento = mysqli_real_escape_string($conn, $_REQUEST['complemento']);
    $pais = mysqli_real_escape_string($conn, $_REQUEST['pais']);
    $estado = mysqli_real_escape_string($conn, $_REQUEST['estado']);
    $cep = mysqli_real_escape_string($conn, $_REQUEST['cep']);
    $entrega = mysqli_real_escape_string($conn, $_REQUEST['entrega']);
    $salvar = mysqli_real_escape_string($conn, $_REQUEST['salvar']);
    $pagMetodo = mysqli_real_escape_string($conn, $_REQUEST['pagMetodo']);

    $stmt_executed_okay = mysqli_stmt_execute($stmt);

    if ($stmt_executed_okay) {
       echo '<div class = center_images>';	
       echo '<label> Seu pedido foi realizado com sucesso. </label><br>';
       echo '</div>';
    } else {
        echo '<div class = center_images>';	
        echo '<label> Não foi possível realizar pedido. </label><br>' . mysqli_error($conn);
        echo '</div>';
        exit;
    }
  
mysqli_stmt_close($stmt);
}

?>