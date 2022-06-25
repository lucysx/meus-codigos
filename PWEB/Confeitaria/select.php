<html>
<head>
<title>Select</title>
<meta http-equiv="Content-Type" content="text/html; charset="UTF-8">
</head>
    
<body> 
<?php
include "connect.php";

$sql = "SELECT * FROM produtos";

$result = mysqli_query($conn, $sql);

if (!$result) {
  die("Falha na Execução da Consulta: " . $sql ."<br>" . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 0) {
    echo "Não foram encontradas linhas, nada para mostrar <br>";
    exit;
}

// Enquanto uma linha de dados existir, coloca esta linha em $row como uma matriz associativa { dicionário tipo chave (campo) / valor (registro) }
$idProduto = "";
$foto = "";
$descricao = "";
$valor = "";
$numFatias = "";
$dataInclusao = "";
$categoria = "";

while ($row = mysqli_fetch_assoc($result)) {
	$idProduto = $row["idProduto"];
    $foto = $row["foto"];
    $descricao = $row["descricao"];
    $valor = $row["valor"];
    $numFatias = $row["numFatias"];
    $dataInclusao = $row["dataInclusao"];
    $categoria = $row["categoria"];
    echo 'ID: '.$idProduto."<br><br>";
    echo 'Data Inclusão: '.$dataInclusao."<br><br>";
    echo 'Foto: '.$foto."<br><br>";
    echo 'Categoria: '.$categoria."<br><br>";    
    echo 'Descrição: '.$descricao."<br><br>";
    echo 'Número de Fatias: '.$numFatias."<br><br>";
    echo 'Valor: '.$valor."<br><br>";
    echo "<a href=delete.php?idProduto=$idProduto> Deletar </a><br>";
} 

mysqli_free_result($result); 
?>
</body>
<html>