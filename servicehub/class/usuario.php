<?php
//incluir conexão
include_once "config/conexao.php";
//declara classe
class Usuario
{
    //atributos
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $tipo;
    private $ativo;
    private $primeiro_login;
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

    //Email
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    //Senha
    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha(string $senha)
    {
        $this->senha = $senha;
    }

    //Tipo
    public function getTipo()
    {
        return $this->tipo;
    }
    public function setTipo(string $tipo)
    {
        $this->tipo = $tipo;
    }

    //Ativo
    public function getAtivo()
    {
        return $this->ativo;
    }
    public function setAtivo(string $ativo)
    {
        $this->ativo = $ativo;
    }

    //PrimeiroLogin
    public function getPrimeiroLogin()
    {
        return $this->primeiro_login;
    }
    public function setPrimeiroLogin(string $primeiro_login)
    {
        $this->primeiro_login = $primeiro_login;
    }
    //métodos (funções ou functions)
    //Efetuar Login
    public static function efetuarLogin(string $email, string $senha): array
    {
        $sql = "select * from usuarios where email = :email and ativo = '1'";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":email", $email);
        $cmd->execute();
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);
        if ($dados && password_verify($senha, $dados['senha'])) {
            return $dados;
        } else {
            return $dados = [];
        }
    }
    //Inserir
    public function inserir(): bool
    {
        $sql = "insert usuarios (nome, email, senha, tipo) values(:nome, :email, :senha, :tipo)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":email", $this->email);
        $cmd->bindValue(":senha", password_hash($this->senha, PASSWORD_DEFAULT));
        $cmd->bindValue(":tipo", $this->tipo);
        if ($cmd->execute()) {
            $this->id = $this->pdo->lastInsertId();;
            return true;
        }
        return false;
    }
    // Listar
    public static function listar(): array
    {
        $cmd = obterPdo()->query("SELECT * FROM usuarios ORDER BY id desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    //Buscar po ID
    public function buscarPorId(int $id):bool{
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        if($cmd->rowCount()>0){ // rowCount conta as linha
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
            $this->id = $dados['id'];
            $this->setNome($dados['nome']);
            $this->setEmail($dados['email']);
            $this->setSenha($dados['senha']);
            $this->setTipo($dados['tipo']);
            $this->setAtivo($dados['ativo']);
            $this->setPrimeiroLogin($dados['primeiro_login']);
            return true;
        }
        return false;
    }

    //Atualizar
    public function atualizar():bool{
        if(!$this->id )return false;
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, tipo = :tipo, ativo = :ativo, primeiro_login = :primeiro_login WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id",$this->id);
        $cmd->bindValue(":nome",$this->nome);
        $cmd->bindValue(":email",$this->email);
        $cmd->bindValue(":tipo",$this->tipo);
        $cmd->bindValue(":ativo",$this->ativo, PDO::PARAM_BOOL);
        $cmd->bindValue(":primeiro_login",$this->primeiro_login, PDO::PARAM_BOOL);
        return $cmd->execute();
    }

    //Atualizar Senha
    public function atualizarSenha(string $senhaHash):bool{
        if(!$this->id) return false;

        $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":senha", $senhaHash);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);
        return $cmd->execute();
    }
}
