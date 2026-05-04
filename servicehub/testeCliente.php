<?php
require_once "class/Cliente.php";
ini_set('display_errors',1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
//Teste Inserir
$cliente = new Cliente();
$cliente ->setUsuarioId(3);
$cliente ->setTelefone('1111111');
$cliente ->setCpf('2222222');
if ($cliente->inserir()){
    echo "Cliente com ID: ".$cliente->getId()."<br>Telefone: ".$cliente->getTelefone(). "<br> CPF: " . $cliente->getCpf() . "<br>Inserido Com Sucesso";
}

// //Testando Buscar Por Id
//  $cliente = new Cliente();
//  if ($cliente->buscarPorId(22)){
//      echo "<pre>";
//      echo $cliente->getId()."<br>CPF-".$cliente->getCpf()."<br>";
//  }else{
//      echo "Cliente não Cadastrado";
//      die();
//  }

// // Teste Atualizar
// $cliente = new Cliente();
// $cliente->buscarPorId(11);
// $cliente->setCpf("99999999910");
// $cliente->setTelefone("11111-2222");
// echo "<pre>";
// if($cliente->atualizar())
//     print_r(($cliente));


// //Teste Listar
// echo "<pre>";
// foreach(Cliente::listar() as $cliente){
//     echo $cliente['id'] . "<br>CPF-" . $cliente['cpf'] . "<br>";
// }

//Teste Buscar Por Usuario
// $cliente = new Cliente();
// if ($cliente->buscarPorUsuario(1)){
//     echo "<pre>";
//     echo $cliente->getUsuarioId()."<br>CPF-".$cliente->getCpf()."<br>";
// }else{
//     echo "Cliente não Cadastrado";
//     die();
// }