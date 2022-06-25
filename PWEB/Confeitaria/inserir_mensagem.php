<?php

include 'connect.php';

$stmt = mysqli_stmt_init($conn);
  
// Inserindo o registro no banco de dados
  
$stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "INSERT INTO mensagens (nome, sobrenome, email, telefone, wpp, mensagem) VALUES (?, ?, ?, ?, ?, ?)");   

if ($stmt_prepared_okay) {

    mysqli_stmt_bind_param($stmt, "ssssss", $nome, $sobrenome, $email, $telefone, $wpp, $mensagem);    

    $nome = mysqli_real_escape_string($conn, $_REQUEST['nome']);
    $sobrenome = mysqli_real_escape_string($conn, $_REQUEST['sobrenome']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $telefone = mysqli_real_escape_string($conn, $_REQUEST['telefone']);
    $wpp = mysqli_real_escape_string($conn, $_REQUEST['wpp']);
    $mensagem = mysqli_real_escape_string($conn, $_REQUEST['mensagem']);

    $stmt_executed_okay = mysqli_stmt_execute($stmt);

    if ($stmt_executed_okay) {
       echo '<div class = center_images>';	
       echo '<label> Sua mensagem foi enviada com sucesso. </label><br>';
       echo '</div>';
    } else {
        echo '<div class = center_images>';	
        echo '<label> Não foi possível enviar mensagem. </label><br>' . mysqli_error($conn);
        echo '</div>';
        exit;
    }
  
mysqli_stmt_close($stmt);
}

?>