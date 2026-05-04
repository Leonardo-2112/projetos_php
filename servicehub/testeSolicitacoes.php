<?php
require_once "class/Solicitacao.php";
ini_set('display_errors',1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
//Teste Inserir
$solicitacao = new Solicitacao();
$solicitacao->setClienteId(10);
$solicitacao->setDataPreferida("12/05/2026");
$solicitacao->setDescricaoProblema("efmof");
$solicitacao->setEndereco("eojfoej");
if ($solicitacao->inserir()){
    echo "ID da solicitação: ".$solicitacao->getId() . "Descrição do Problema: " . $solicitacao->getDescricaoProblema();
}

?>