<?php
require_once "class/Solicitacao.php";
require_once "class/ServicoSolicitacao.php";

// 1. Criar solicitação
$sol = new Solicitacao();

$sol->setClienteId(24); 
$sol->setDescricaoProblema("Teste usando classe ServicoSolicitacao");
$sol->setDataPreferida("2026-10-25 15:00:00");
$sol->setEndereco("Rua teste integração");

if ($sol->inserir()) {

    echo "Solicitação criada! ID: " . $sol->getId() . "<br>";

    // 2. Associar serviços
    $servicos = [1, 2]; // IDs que EXISTEM na tabela servicos

    foreach ($servicos as $servico_id) {

        $ss = new ServicoSolicitacao();
        $ss->setServicoId($servico_id);
        $ss->setSolicitacaoId($sol->getId());

        if ($ss->associar()) {
            echo "Serviço $servico_id vinculado<br>";
        } else {
            echo "Erro ao vincular serviço $servico_id<br>";
        }
    }

} else {
    echo "Erro ao criar solicitação";
}

?>