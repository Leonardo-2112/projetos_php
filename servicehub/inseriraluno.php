<?php
ini_set('display_errors',1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
//Insere Alunos
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once "config/conexao.php";
    $nome = $_POST['txtnome'];
    $cpf = $_POST['txtcpf'];
    $email = $_POST['txtemail'];

    $sql = "insert alunos (nome, cpf, email) values (:nome, :email, :cpf)";
    $cmd = $pdo->prepare($sql);
    $cmd->execute([':nome'=>$nome,':cpf'=>$cpf,':email'=>$email]);
    $id = $pdo->lastInsertId();
}
//Listar Alunos
include_once "config/conexao.php";
$sql = "select * from alunos";
$cmd = $pdo->prepare($sql);
$cmd->execute();

$alunos = $cmd->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro de Aluno</title>
</head>

<body>
    <form action="formaluno.php" method="post">
        <input type="number" name="txtid" id="" hidden>

        <label for="txtnome">Nome</label>
        <input type="text" name="txtnome" id="">

        <label for="txtcpf">CPF</label>
        <input type="text" name="txtcpf">

        <label for="txtemail">Email</label>
        <input type="text" name="txtemail">

        <button type="submit">Cadastrar</button>
    </form>


    <h2>Alunos Cadastrados</h2>
    <table border="1" cellpadding=10>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
        </tr>

        <?php foreach ($alunos as $aluno) { ?> <!--Abre o foreach -->
            <tr>
                <!-- short echo -->
                <td>
                    <?= $aluno['id']; ?>
                </td>
                <td>
                    <?= $aluno['nome']; ?>
                </td>

                <td>
                    <?= $aluno['cpf']; ?>
                </td>

                <td>
                    <?= $aluno['email']; ?>
                </td>

            </tr>
        <?php }; ?> <!--Fecha o foreach -->
    </table>

</body>

</html>