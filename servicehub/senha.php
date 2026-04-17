<?php
// $senha = password_hash("123456", PASSWORD_DEFAULT);
// echo $senha;
require_once "class/Usuario.php";
ini_set('display_errors',1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

 
// $usuario = new Usuario();
// $usuario ->setNome('Leonardo Sousa');
// $usuario ->setEmail('leo@gmail.com');
// $usuario ->setSenha('Leo2026@');
// $usuario ->setTipo(2);
// if ($usuario->inserir()){
//     echo "Usuário ".$usuario->getNome(). " inserido com sucesso, com o ID " . $usuario->getId();
// }

//TESTANDO LISTAR
// echo "<pre>";
// foreach(Usuario::listar() as $user){
//     echo $user['id'] . "-" . $user['nome'] . "<br>";
// }


//TESTANDO BUSCA POR ID
// $usuario = new Usuario();
// if ($usuario->buscarPorId(20)){
//     echo "<pre>";
//     echo $usuario->getId(). "-" .$usuario->getNome()."<br>";
// }else{
//     echo "Usuário não Cadastrado";
//     die();
// }

//TESTANDO UPDATE
// $usuario->setNome("Marco Silva");
// echo "<hr>";
// echo "<pre>";
// if($usuario->atualizar())
//     print_r(($usuario));


//TESTANDO ALTERAR SENHA 
$usuario = new Usuario();
$usuario->buscarPorId(31);   
if($usuario->atualizarSenha(password_hash("123456789", PASSWORD_DEFAULT))){
    echo ("Senha atualizada com sucesso"); 
}
    

?>
