<?php
require_once "class/Solicitacoes.php";
ini_set('display_errors',1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
//Teste Inserir
$solicitacao = new Solicitacao();
$solicitacao->setClienteId(10);
$solicitacao->setDataPreferida();
$solicitacao->setDescricaoProblema("efmof");
$solicitacao->setEndereco("eojfoej");
if ($servico->inserir()){
    echo "Servico com ID: ".$servico->getId()."<br>Nome: ".$servico->getNome()."<br>Descrição: ".$servico->getDescricao(). "<br>Preço: " . $servico->getPreco() . "<br>Inserido Com Sucesso";
}

?>