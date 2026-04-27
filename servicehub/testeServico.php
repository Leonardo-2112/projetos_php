<?php
require_once "class/Servico.php";
ini_set('display_errors',1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
// //Teste Inserir
// $servico = new Servico();
// $servico->setNome('Limpeza de Piscina');
// $servico->setDescricao('limpeza de piscina completa.');
// $servico->setPreco(200);
// $servico->setDescontinuado(0);
// if ($servico->inserir()){
//     echo "Servico com ID: ".$servico->getId()."<br>Nome: ".$servico->getNome()."<br>Descrição: ".$servico->getDescricao(). "<br>Preço: " . $servico->getPreco() . "<br>Inserido Com Sucesso";
// }

// //Teste Buscar Por Id
//  $servico = new Servico();
//  if ($servico->buscarPorId(34)){
//      echo "<pre>";
//      echo "Id: ".$servico->getId()."<br>Nome: ".$servico->getNome()."<br>Descrição: ".$servico->getDescricao(). "<br>Preço: " . $servico->getPreco(). "<br>Descontinuado: ".$servico->getDescontinuado();
//  }else{
//      echo "Cliente não Cadastrado";
//      die();
//  }

// //Teste Atualizar
// $servico = new Servico();
// $servico->buscarPorId(35);
// $servico->setNome("Limpeza de Piscina Premium");
// $servico->setDescricao("Limpeza completa da piscina, incluindo remoção de folhas e detritos,
// escovação das paredes e aspiração do fundo, além de tratamento
// químico para manter a água cristalina por mais tempo.");
// $servico->setPreco(280.00);
// if ($servico->atualizar()) {
//     print_r($servico);
//     echo "Serviço atualizado com sucesso!";
// }

// //Teste Listar
// $servicos = Servico::listar();
// foreach ($servicos as $servico) {
//     echo "======================================================<br>";
//     echo "Id: ".$servico['id']."<br>Nome: ".$servico['nome']."<br>Descrição: ".$servico['descricao']. "<br>Preço: " . $servico['preco']. "<br>Descontinuado: ".$servico['descontinuado']."<br>";
// }

// //Teste Listar Ativos
// $servicos = Servico::listarAtivos();
// foreach ($servicos as $servico) {
//     echo "======================================================<br>";
//     echo "Id: ".$servico['id']."<br>Nome: ".$servico['nome']."<br>Descrição: ".$servico['descricao']. "<br>Preço: " . $servico['preco']. "<br>Descontinuado: ".$servico['descontinuado']."<br>";
// }


//Teste Excluir
// $servico = new Servico();
// $servico->buscarPorId(34);
// $servico->setDescontinuado(true);
// if ($servico->excluir()) {
//     echo "Serviço excluído com sucesso!";
// } else {
//     echo "Erro ao excluir serviço.";
// }