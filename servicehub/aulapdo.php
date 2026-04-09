<?php
include_once "config/conexao.php";
$sql = "select * from servicos";
$cmd = $pdo->prepare($sql);
$cmd -> execute();

$servicos = $cmd -> fetchAll(PDO::FETCH_ASSOC);
var_dump($servicos);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Aula PDO</title>
</head>
<body>
    <h2>Lista de Serviços</h2>
    <table></table>
</body>
</html>