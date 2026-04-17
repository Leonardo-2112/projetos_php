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



echo "<pre>";
foreach(Usuario::listar() as $user){
    echo $user['id'] . "-" . $user['nome'] . "<br>";
}
?>
