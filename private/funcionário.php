<?php

include '../config/db.php';

$sql = "SELECT * FROM usuarios";

$result = $conn->query($sql);

session_start();

if (empty($_SESSION["user_id"])):

  header("Location: login.php");

endif

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
    <div class="flex">
      <div class="cinza_funcionario">🔍 Buscar Funcionários</div>
      <a href="cadastro.php">
        <button id="minicinza" type="button">Cadastrar</button>
      </a>

    </div>

    <br>


    <div class="arrastar">

      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $imagem = "../assets/images/default.png";

          echo '
        <div class="cinza">
            <div class="flex">
                <img class="imagesFuncionario" src="" . $imagem . "">
                <p>' . $row['nome'] . '</p>
                <br>
                <p>' . $row['tipo'] . '</p>
                <br>
                <p>' . $row['id'] . '</p>
            </div>
        </div>
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