<?php
$servername = "sql209.epizy.com";
$username = "epiz_31252084";
$password = "uEKgfctTfzuX";
$dbname = "epiz_31252084_confeitaria";

// Criar conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Checar conexão
if (mysqli_connect_errno()) {
  echo "Falha na Conexão: " . mysqli_connect_error();
  exit();
}

echo "Conectado com Sucesso<br><br>";
?>