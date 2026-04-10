<?php
include_once "config/conexao.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "<h3> Chamado pelo formulário </h3>";
    $sql = "select id, nome from servicos where id =:id";
    $id = $_POST['txtid'];
    $cmd = $pdo->prepare($sql);
    $cmd->execute([":id"=>$id]);
    $serv = $cmd->fetchAll(PDO::FETCH_ASSOC);
    var_dump($serv);
}
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    echo "<h3>Chamado pela URL ou formulário method = 'get'</h3>";
    $idviaget= $_GET['txtid'];
    $sql = "select * from servicos where id = :id";
    $cmd = $pdo -> prepare($sql);
    $cmd -> execute([':id'=> $idviaget]);
    $serviços = $cmd->fetchAll(PDO::FETCH_ASSOC);
    var_dump($serviços);
}



?>
<h2>Nome do serviço: <?= $serv['nome'] ?></h2>