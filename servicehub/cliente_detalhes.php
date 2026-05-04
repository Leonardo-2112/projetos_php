<?php 
session_start();
include "includes/header.php";
include "includes/menu.php";
require_once "config/conexao.php";
require_once "includes/funcoes.php";

?>

<main class="container mt-5">
  <h3>Solicitação #</h3>

  <p><strong>Status:</strong> </p>
  <p><strong>Descrição:</strong> </p>
  <p><strong>Endereço:</strong> </p>

 
    <div class="alert alert-info">
      <strong>Resposta do Admin:</strong><br>
      
    </div>
 
    <div class="alert alert-warning">Ainda não há resposta.</div>
  

  <a href="cliente_dashboard.php" class="btn btn-secondary">Voltar</a>
</main>
<?php 
include "includes/footer.php";
?>