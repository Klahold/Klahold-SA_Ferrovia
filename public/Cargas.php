<?php

include '../config/db.php';

$sql = "SELECT * FROM carga";

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

  <title>Dashboard</title>

  <link rel="stylesheet" href="../style/styles.css">
  <link rel="icon" href="../assets/icons/logo.png" type="image/png">
</head>

<body>
  <header class="header">
    <h1>Dashboard</h1>
    <img class="logoMenu" src="../assets/icons/dashbord.png" alt="Rotas">
  </header>

  <div class="brancoAlertas">
    
  <div class="setas">
    <a href="Dashbord2.php">
                <img class="setaDashboard" src="../assets/icons/seta.png" alt="Botão de voltar">
        </a>
        <H2><U>Carga</U></H2>
  <a href="Alertas.php">
                <img class="setaDashboard2" src="../assets/icons/seta2.png" alt="Botão de continuar">
        </a>
  </div>

    

    <div class="arrastarCargas">

      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

          echo '
        <div class="cinzaCargas">
            <div class="espacoCarga">
                <div class="espacoCarga"><p><strong>Vagão</strong></p></div>
                <div class="espacoCarga"><p>' . $row['id'] . '</p></div>
            </div>
            <div class="espacoCarga">
                <div class="espacoCarga"><p><strong>Conteúdo</strong></p></div>
                <div class="espacoCarga"><p>' . $row['conteúdo'] . '</p></div>
            </div>
        </div>
        <br>
        ';
        }
      } else {
        echo "Nenhuma carga encontrada.";
      }
      ?>

    </div>


  </div>
</body>

</html>