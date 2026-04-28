<?php
session_start();
include "includes/header.php";
include "includes/menu.php";
//Inclui o arquivo de conexão com o banco de dados
require_once "config/conexao.php";

//Inclui funções auxiliares do sistema
require_once "includes/funcoes.php";

//Inclui classe Cliente
require_once "class/Cliente.php";

//Verifica se o usuário está logado e se é do tipo cliente = 2
if (!isset($_SESSION['usuario_id']) || $_SESSION["tipo"] != 2) { //isset função que retorna boll para variavel existente e valor atribuido
  header("location: login.php");                              // "!" inverte isset (caso não tenha valor ou a variavel ele retorna true)
}

//Cria Objeto da Classe Cliente
$cliente = new Cliente;

//Busca os dados do cliente usando o ID do usuário logado
if (!$cliente->buscarPorId($_SESSION['usuario_id'])); { //Passa como parâmetro o array que retorna do banco de dados na posição "usuario_id" 
  //Se não encontrar o cliente, encerra a seção
  die("Cliente não encontrado");
}

//Consulta SQL para buscar as solicitações do cliente e os serviços vinculados a cada solicitação
$sql = "SELECT s.id, s.status, s.data_cad, GROUP_CONCAT(se.nome SEPARADOR '.') AS servicos from solicitacoes s INNER JOIN servico_solicitacao ss ON ss.solicitacoes_id WHERE s.cliente_id=? ORDER BY s.id, s.status, s.data_cad ORDER BY s.data_cad DESC";
//Prepare a consulata
$stmt = $pdo->prepare($sql);
//Executa
$stmt->execute($cliente['id']);
//Busca todas as solicitações encontradas no banco
$solicitacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<main class="container mt-5">
  <h2>Bem-vindo, <strong><?= $_SESSION['nome'] ?></strong></h2>
  <p><a href="logout.php" class="btn btn-danger btn-sm">Sair</a></p>
  <a href="cliente_perfil.php" class="btn btn-warning btn-sm">Meu Perfil</a>
  <h4 class="mt-4">Minhas Solicitações</h4>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Status</th>
        <th>Data</th>
        <th>Ação</th>
      </tr>
    </thead>


    <tbody>
      <!-- Percorre todas as solicitações retornadas do banco -->
      <?php foreach ($solicitacoes as $s): ?>
        <tr>
          <!-- Exibe o ID da solicitação -->
          <td><?= $s["id"] ?></td>

          <td>
            <?php
            //Divide a lista de serviços em um array
            $lista = explode(", ", $s["servicos"]);
            //Percorre cada serviço da solicitação
            foreach ($lista as $nomeServico) {
              //html especial chars evita a execução de código HTML/JS malicioso
              echo '<span class="badge bd-primary me-1 mb-1">' . htmlspecialchars($nomeServico) . '</span>';
            }
            ?>
          </td>

          <!-- Exibe o status do em formato do texto usando função -->
          <td><?php statusTexto($s["status"]) ?></td>

          <!-- Formata a data para o padrão brasileiro -->
          <td><?= date("d/m/Y H:i", strtotime($s["data_cad"])) ?></td>

          <!-- Link para ver os detalhes da solicitação -->
          <td>
            <a href="cliente_detalhes.php?id=
              <?= $s['id']; ?>" class="btn btn-primary btn-sm">Detalhes
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
<?php
include "includes/footer.php";
?>