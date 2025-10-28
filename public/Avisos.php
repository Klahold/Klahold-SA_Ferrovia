<?php

include '../config/db.php';

$sql = "SELECT * FROM aviso";

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
    <title>Avisos</title>

    <link rel="stylesheet" href="../style/styles.css">
    <link rel="icon" href="../assets/icons/logo.png" type="image/png">

</head>

<body>
    <header class="header">
        <h1>Avisos</h1>
        <img class="logoMenu" src="../assets/icons/avisos.png" alt="">
    </header>
  <div class="brancoGeral">

  <h2 class="avisos">Avisos</h2>
    <div class="arrastar">

      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $imagem = "../assets/images/default.png";

          echo '
        <div class="cinza">
            <div class="flex">
                <div class="espaco"><p>' . $row['mensagem'] . '</p></div>
            </div>
        </div>
        <br>
        ';
        }
      } else {
        echo '<div class="cinza">nenhum aviso encontrado</div>';
      }
      ?>
    </div>
    </div>

</body>

</html>