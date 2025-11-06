<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])) {
  header(header: "Location: ../public/login.php");
      exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        ?>
        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Dados do Funcionário</title>
            <link rel="stylesheet" href="../style/styles.css">
        </head>

        <body>
            <header class="header">
                <h1>Funcionário</h1>
                <img class="logoMenu" src="../assets/icons/funcionario.png">
            </header>
            <div class="brancoGeral">
                <div class="setas">
                    <a href="funcionário.php">
                        <img class="setaDashboard" src="../assets/icons/seta.png" alt="Botão de voltar">
                    </a>
                </div>
                <div class="arrastarGeral">

                    <div class="logofuncionario">
                        <img class="img_cadastro" src="../assets/images/<?php echo htmlspecialchars($row['foto_perfil']); ?>" alt="Foto de perfil">
                    </div>

                    <br>

                    <div class="cinzaCadastro"><strong>Nome:</strong> <?php echo $row['nome']; ?></div><br>

                    <div class="cinzaCadastro"><strong>Data de Nascimento:</strong>
                        <?php echo $row['data_nascimento']; ?></div><br>

                    <div class="cinzaCadastro"><strong>Naturalidade:</strong>
                        <?php echo $row['naturalidade']; ?></div><br>

                    <div class="cinzaCadastro"><strong>Nacionalidade:</strong>
                        <?php echo $row['nacionalidade']; ?></div><br>

                    <div class="cinzaCadastro"><strong>Estado Civil:</strong>
                        <?php echo $row['estado_civil']; ?></div><br>

                    <div class="cinzaCadastro"><strong>Tipo:</strong> <?php echo $row['tipo']; ?></div><br>

                    <div class="cinzaCadastro"><strong>CPF:</strong> <?php echo $row['CPF']; ?></div><br>

                    <div class="cinzaCadastro"><strong>Email:</strong> <?php echo $row['email']; ?></div><br>

                    <div class="cinzaCadastro"><strong>Data de Admissão:</strong>
                        <?php echo $row['data_admissao']; ?></div><br>

                    <div class="cinzaCadastro"><strong>Gênero:</strong> <?php echo $row['genero']; ?></div>

                    <br>

                    <div class="cinzaCadastro"><strong>Código:</strong> <?php echo $row['codigo']; ?></div>

                    <br>

                    <div class="cinzaCadastro"><strong>Senha:</strong> <?php echo $row['senha']; ?></div><br>

                    <div class="espaco">

                        <div class="minicinzaalign"> <a href="funcionário.php"><button class="minicinza">Voltar</button></a>
                        </div>

                        <div class="minicinzaalign"> <a href="updateFuncionário.php?id='<?php echo $row['id']; ?>'"><button
                                    class="minicinza">Editar</button></a></div>

                        <div class="minicinzaalign"> <a href="deleteFuncionário.php?id='<?php echo $row['id']; ?>'"><button
                                    class="minicinza">Excluir</button></a></div>

                    </div>

                </div>
            </div>
        </body>

        </html>
        <?php
    } else {
        echo "Funcionário não encontrado.";
    }
} else {
    echo "ID não informado.";
}
?>