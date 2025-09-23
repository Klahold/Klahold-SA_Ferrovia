<?php

include '../config/db.php';

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

      <div class="cinzaCargas">
        <div class="arrumadores">
          <div class="espaco">
               <?php
        $sql = "SELECT * FROM carga";
        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            
            echo "<table>
                        <thead>
                                <tr>
                                    <strong><h3>Vagão</h3></strong>
                                <tr>
                        <thead>
                <tbody>";
        while ($row = $result->fetch_assoc()){
            echo "<tr>
                    <h3>{$row['id']}</h3>
                    <tr>";
        }
        echo"<t/body></table>";
        }else{
            echo "<p>Nenhum vagão no momento.</p>";
        }

        
        ?>

        

        <?php
        $sql = "SELECT * FROM carga";
        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            
            echo "<table>
                        <thead>
                                <tr>
                                    <strong><h3>Conteúdo</h3></strong>
                                <tr>
                        <thead>
                <tbody>";
        while ($row = $result->fetch_assoc()){
            echo "<tr>
                    <h3>{$row['conteúdo']}</h3>
                    <tr>";
        }
        echo"<t/body></table>";
        }
        
        ?>
            </div>
        </div>
      </div>

    </div>


  </div>
</body>

</html>