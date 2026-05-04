<?php
// Inicia a sessão e carrega os arquivos necessários
session_start();
require_once "config/conexao.php";  
require_once "class/Solicitacao.php"; 
include "includes/header.php";
include "includes/menu.php";

//Verifica se o usuário está logado
if(!isset($_SESSION['usuario_id']) || $_SESSION["tipo"] != 2){
    header("location: login.php");
    exit;
}

//Recupera o ID da solicitação vindo da URL
$id = $_GET['id'] ?? null;

if (!$id) {
    header("location: cliente_dashboard.php");
    exit;
}

$id = $_GET['id'] ?? null;
$solicitacao= new Solicitacao();

if ($id && $solicitacao->buscarPorId($id)) {
?>

<main class="container mt-5">
    <h2>Detalhes da Solicitação #<?= $solicitacao->getId()?></h2>
    
    <p><strong>Status:</strong> <?= $solicitacao->getStatus() ?></p>
    
    <p><strong>Data:</strong> 
        <?= date("d/m/Y H:i", strtotime($solicitacao->getDataCadastro())) ?>
    </p>
    
    <p><strong>Endereço:</strong> <?= $solicitacao->getEndereco() ?></p>
    
    <p><strong>Descrição do Problema:</strong><br>
        <?= nl2br($solicitacao->getDescricaoProblema()) ?>
    </p>
    
    <p><strong>Resposta do Administrador:</strong><br>
        <?= $solicitacao->getRespostaAdmin()?? "Sem resposta ainda." ?>
    </p>

    <a href="cliente_dashboard.php" class="btn btn-secondary">Voltar</a>
</main>


<?php 
} else {
    echo "<div class='container mt-5 alert alert-danger'>Solicitação não encontrada.</div>";
}