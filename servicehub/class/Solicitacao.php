<?php
//incluir conexão
include_once "config/conexao.php";

class Solicitacao
{
    private $pdo;
    private $id;
    private $cliente_id;
    private $descricao_problema;
    private $data_preferida;
    private $status;
    private $data_cad;
    private $data_atualizacao;
    private $data_resposta;
    private $resposta_admin;
    private $endereco;

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
    //Cliente
    public function getClienteId()
    {
        return $this->cliente_id;
    }
    public function setClienteId(int $cliente_id){
        return $this->cliente_id = $cliente_id;
    }

    //Descrição do Problema
    public function getDescricaoProblema()
    {
        return $this->descricao_problema;
    }
    public function setDescricaoProblema(string $descricao_problema)
    {
        return $this->descricao_problema = $descricao_problema;
    }

    //Data Preferida
    public function getDataPreferida()
    {
        return $this->data_preferida;
    }
    public function setDataPreferida(int $data_preferida)
    {
        return $this->data_preferida = $data_preferida;
    }

    //status
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus(bool $status)
    {
        return $this->status = $status;
    }

    //data_cad
    public function getDataCadastro()
    {
        return $this->data_cad;
    }
    public function setDataCadastro(int $data_cad)
    {
        return $this->data_cad = $data_cad;
    }

    //data_atualizacao
    public function getDataAtualizacao()
    {
        return $this->data_atualizacao;
    }
    public function setDataAtualizacao(int $data_atualizacao)
    {
        return $this->data_atualizacao = $data_atualizacao;
    }

    // data_resposta
    public function getDataResposta()
    {
        return $this->data_resposta;
    }
    public function setDataResposta(int $data_resposta)
    {
        return $this->data_resposta = $data_resposta;
    }

    // resposta_admin
    public function getRespostaAdmin()
    {
        return $this->resposta_admin;
    }
    public function setRespostaAdmin(string $resposta_admin)
    {
        return $this->resposta_admin = $resposta_admin;
    }

    // endereco
    public function getEndereco()
    {
        return $this->endereco;
    }
    public function setEndereco(string $endereco)
    {
        return $this->endereco = $endereco;
    }


    //Métodos obrigatórios:
    //Inserir
    public function inserir(): bool
    {
        $sql = "INSERT into solicitacoes (cliente_id, descricao_problema, data_preferida, status, data_cad, data_atualizacao, data_resposta, resposta_admin, endereco) values(:cliente_id, :descricao_problema, :data_preferida, :status, :data_cad, :data_atualizacao, :data_resposta, :resposta_admin, :endereco)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":cliente_id", $this->cliente_id);
        $cmd->bindValue(":descricao_problema", $this->descricao_problema);
        $cmd->bindValue(":data_preferida", $this->data_preferida);
        $cmd->bindValue(":status", $this->status);
        $cmd->bindValue(":data_cad", $this->data_cad);
        $cmd->bindValue(":data_atualizacao", $this->data_atualizacao);
        $cmd->bindValue(":data_resposta", $this->data_resposta);
        $cmd->bindValue(":resposta_admin", $this->resposta_admin);
        $cmd->bindValue(":endereco", $this->endereco);
        if ($cmd->execute()) {
            $this->id = $this->pdo->lastInsertId();;
            return true;
        }
        return false;
    }
    //Listar
    public static function listar(): array
    {
        $sql = "select * from solicitacoes";
        $cmd = obterPdo()->prepare($sql);
        $cmd->execute();
        return $cmd->fetchAll();
    }
    //Listar Por Cliente

    //Buscar Por Id
    //Responder
    //Atualizar Status
}
