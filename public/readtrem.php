<?php

include '../config/db.php';

$sql = "select * from trens";

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
  <title>Trems</title>

</head>
<body>
  <header class="header">
    <h1 class>trem</h1>
    <img class="logoMenu" src="../assets/icons/manutenção.png" alt="Icone de manutenção">
</header>

  <main>

    <section class="squarewhite">

        <?php
        if($_SESSION["tipo"]=="Administrador"){
            echo"
            <div class='criar'>
            <a href='../private/createTrem.php'><div class='cinzacriar'><strong class='textoRelatorio'>Cadastrar Trem</strong></div></a>
            </div>";
        }

        ?>


        <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        
        echo "<a href='manutenção2.php?id={$row['id']}'>
        <div class='selection'> 
        
        <div class='trems'>
          <img src='../assets/images/tremAzul.png' alt=". $row['codigo'] ." class='trem'>
          <div class='treminfo'>
            <h2>Trem ". $row['codigo'] ."</h2>
          </div>
          </div>
          <div class='pontosmanutencão'>
            <div class='ponto'></div>
            <div class='ponto'></div>
            <div class='ponto'></div>
          </div>
        </div>
        </a>
        <br>";}
         }else {
        echo "<h2>Nenhum trem cadastrado no momento.</h2>";
      }
      
      ?>

      
      </section>

  </main>

  <footer>

  </footer>
</body>

</html>