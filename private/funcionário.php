<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):
  
  header(header: "Location: ../public/login.php");

endif;

$busca = isset($_POST['busca']) ? trim($_POST['busca']) : '';

if ($busca === '') {
    $sql = "SELECT id,nome,data_nascimento,naturalidade,nacionalidade,estado_civil,tipo,CPF,email,data_admissao,genero,codigo,senha FROM usuarios
            ORDER BY nome DESC";
    $stmt = $conn->prepare($sql);
} else {
    $sql = "SELECT id,nome,data_nascimento,naturalidade,nacionalidade,estado_civil,tipo,CPF,email,data_admissao,genero,codigo,senha FROM usuarios
            WHERE nome LIKE ?
            ORDER BY nome DESC";
    $stmt = $conn->prepare($sql);
    $like = "%{$busca}%";
    $stmt->bind_param("s", $like);
}

$stmt->execute();

$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Funcionários</title>

  <link rel="stylesheet" href="../style/styles.css">
  <link rel="icon" href="../assets/icons/logo.png" type="image/png">
</head>

<body>
  <header class="header">
    <h1>Funcionários</h1>
    <img class="logoMenu" src="../assets/icons/funcionario.png" alt="Rotas">
  </header>

  <div class="branco-funcionario">
    <div class="setas">
      <a href="menuadm.php">
        <img class="setaDashboard" src="../assets/icons/seta.png" alt="Botão de voltar">
      </a>
    </div>
    <div class="barraFuncionario">

      <form action="funcionário.php" method="post">
        <input type="text" name="busca" class="buscarFuncionario" placeholder="Buscar Funcionário" value="<?php echo htmlspecialchars($busca); ?>">
      </form>

      <a href="cadastro.php">
        <button class="cadastroFuncionario" type="button">Cadastrar</button>
      </a>

    </div>

    <br>

    <div class="arrastar">

      <?php
      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $imagem = "../assets/images/default.png";

          echo '
          <a href="readFuncionário.php?id=' . $row['id'] . '">
        <div class="cinza">
            <div class="flexFuncionario">
                <div class="espaco">' . $row['nome'] . '</div>
                <br>
                <div class="espaco">' . $row['tipo'] . '</div>
                <br>
                <div class="espaco">' . $row['codigo'] . '</div>
            </div>
        </div>
        </a>
        <br>
        ';
        }
      } else {
        echo "Nenhum registro encontrado.";
      }
      ?>
    </div>


</body>

</html>