<?php
//Comando SQL para Listar tabela de servicos
include_once "config/conexao.php";
$sql = "select * from servicos";
$cmd = $pdo->prepare($sql);
$cmd->execute();

$servicos = $cmd->fetchAll(PDO::FETCH_ASSOC);
//var_dump($servicos);

//Comando SQL para Listar tabela de usuarios
$sql = "select * from usuarios";
$cmd = $pdo->prepare($sql);
$cmd->execute();

$usuarios = $cmd->fetchAll(PDO::FETCH_ASSOC);

//Comando SQL para Listar tabela de clientes
$sql = "select * from clientes";
$cmd = $pdo->prepare($sql);
$cmd->execute();

$clientes = $cmd->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Aula PDO</title>
</head>

<body>
    <form action="resform.php" method="post">
        <input type="text" name="txtid" id="">
        <button type="submit">Enviar</button>
    </form>
    <!-- Exibindo tabela de serviços cadastrados -->
    <h2>Lista de Serviços</h2>
    <table border="1" cellpadding=10>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Descontinuado</th>

        </tr>
        <?php foreach ($servicos as $servico) { ?> <!--Abre o foreach -->
            <tr>
                <!-- short echo -->
                <td>
                    <?= $servico['id']; ?>
                </td>

                <td>
                    <?= $servico['nome']; ?>
                </td>

                <td>
                    <?= $servico['descricao']; ?>
                </td>

                <td>
                    <?= $servico['preco']; ?>
                </td>

                <td>
                    <?= $servico['descontinuado'] ? "Sim" : "Não" ?>
                </td>

            </tr>
        <?php }; ?> <!--Fecha o foreach -->
    </table>


    <!-- Exibindo tabela de Usuários cadastrados -->
    <h2>Usuários</h2>
    <table border="1" cellpadding=10>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Tipo</th>
            <th>Ativo</th>
            <th>Primeiro Login</th>


        </tr>
        <?php foreach ($usuarios as $usuario) { ?> <!--Abre o foreach -->
            <tr>
                <!-- short echo -->
                <td>
                    <?= $usuario['id']; ?>
                </td>

                <td>
                    <?= $usuario['nome']; ?>
                </td>

                <td>
                    <?= $usuario['email'] ?>
                </td>
                <td>
                    <?= $usuario['senha'] ?>
                </td>
                <td>
                    <?= $usuario['tipo'] ? "Administrador" : "Cliente" ?>
                </td>
                <td>
                    <?= $usuario['ativo'] ? "Sim" : "Não" ?>
                </td>
                <td>
                    <?= $usuario['primeiro_login'] ? "Sim" : "Não" ?>
                </td>
            </tr>
        <?php }; ?> <!--Fecha o foreach -->
    </table>


    <!-- Exibindo a tabela de Clientes -->
    <h2>Clientes</h2>
    <table border="1" cellpadding=10>
        <tr>
            <th>ID</th>
            <th>ID de Usuário</th>
            <th>Telefone</th>
            <th>CPF</th>
        </tr>

        <?php foreach ($clientes as $cliente) { ?> <!--Abre o foreach -->
            <tr>
                <!-- short echo -->
                <td>
                    <?= $cliente['id']; ?>
                </td>

                <td>
                    <?= $cliente['id_usuario']; ?>
                </td>

                <td>
                    <?= $cliente['telefone']; ?>
                </td>

                <td>
                    <?= $cliente['cpf']; ?>
                </td>
            </tr>
        <?php }; ?> <!--Fecha o foreach -->
    </table>

</body>

</html>