<?php
//incluir conexão
include_once "config/conexao.php";
//declara classe
class Servico
{
    //atributos
    private $id;
    private $nome;
    private $descricao;
    private $preco;
    private $decontinuado;
    private $pdo;
    //contrutor
    public function __construct()
    {
        $this->pdo = obterPdo();
    }
    //Getters e Setters
    //ID
    public function getId()
    {
        return $this->id;
    }

    //Nome
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }
    //DESCRIÇÃO
    public function getDescricao(){
        return $this->descricao;
    }
    public
    //PREÇO
    //DESCONTINUADO
}
