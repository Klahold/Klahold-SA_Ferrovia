<?php

include '../config/db.php';

$sql = "SELECT * FROM manutencao,trens";

$result = $conn->query($sql);

session_start();

if (empty($_SESSION["user_id"])):

  header("Location: login.php");

endif;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/styles.css">
  <link rel="icon" href="../assets/icons/logo.png" type="image/png">
  <title>Manutenção</title>

</head>
<body>
  <header class="header">
    <h1 class>Manutenção</h1>
    <img class="logoMenu" src="../assets/icons/manutenção.png" alt="Icone de manutenção">
</header>

  <main>

    <section class="squarewhite">

        <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $imagem = "../assets/images/default.png";

          echo '<a href="manutenção2.php">
        <div class="selection"> 
        <div class="trems">
          <img src="../assets/images/tremVermelho.png" alt="Trem KM2D" class="trem">
          <div class="treminfo">
            <h2>Trem '. $row['codigo'] .'</h2>
            <h3 class="vermelhoProblema"> - PROBLEMA EM '. $row['tipo'] .' -</h3>
          </div>
          </div>
          <div class="pontosmanutencão">
            <div class="ponto"></div>
            <div class="ponto"></div>
            <div class="ponto"></div>
          </div>
        </div>
        </a>
        <br>
        ';
        }
      } else {
         $sql = "SELECT * FROM trens";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
        echo '<a href="manutenção2.php">
        <div class="selection"> 
        <div class="trems">
          <img src="../assets/images/tremVermelho.png" alt="Trem KM2D" class="trem">
          <div class="treminfo">
            <h2>Trem '. $row['codigo'] .'</h2>
            <h3> - sem adversidades -</h3>
          </div>
          </div>
          <div class="pontosmanutencão">
            <div class="ponto"></div>
            <div class="ponto"></div>
            <div class="ponto"></div>
          </div>
        </div>
        </a>
        <br>';
      }
      ?>

      
      </section>

  </main>

  <footer>

  </footer>
</body>

</html>