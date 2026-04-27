<?php
require_once "class/Solicitacoes.php";
ini_set('display_errors',1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
//Teste Inserir
$solicitacao = new Solicitacao();
$solicitacao->setDescricaoProblema("efmof");
$solicitacao->setDataPreferida("233232");
$solicitacao->setStatus(0);
$solicitacao->setDataCadastro(12);
$solicitacao->setDataAtualizacao(13);
$solicitacao->setDataResposta(14);
$solicitacao->setRespostaAdmin("blablabla");
$solicitacao->setEndereco("eojfoej");
if ($servico->inserir()){
    echo "Servico com ID: ".$servico->getId()."<br>Nome: ".$servico->getNome()."<br>Descrição: ".$servico->getDescricao(). "<br>Preço: " . $servico->getPreco() . "<br>Inserido Com Sucesso";
}

?>