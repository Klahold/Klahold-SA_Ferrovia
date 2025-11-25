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
    <title>Rotas</title>

    <link rel="stylesheet" href="../style/styles.css">
    <link rel="icon" href="../assets/icons/logo.png" type="image/png">
</head>

<body>
    <header class="header">
        <h1>Rotas</h1>
        <a href="login.php"><img class="logoMenu" src="..//assets/icons/rotas.png" alt="Rotas"></a>
    </header>

    <div class="azul">
        <img class="mapa" src="..//assets/icons/ferrovia.png" alt="mapa">

        <?php
        $sensor = (isset($_GET['sensor']))  ? (int)$_GET['sensor'] : 1;
        ?>
        <a href="rotas.php?sensor=1"><div class="sensor1<?php if($sensor==1) echo ' sensor-ativo';?>"></div></a>
        <a href="rotas.php?sensor=2"><div class="sensor2<?php if($sensor==2) echo ' sensor-ativo';?>"></div></a>
        <a href="rotas.php?sensor=3"><div class="sensor3<?php if($sensor==3) echo ' sensor-ativo';?>"></div></a>
        <a href="rotas.php?sensor=4"><div class="sensor4<?php if($sensor==4) echo ' sensor-ativo';?>"></div></a>
    </div>

    



    <br><br>
    <?php

    switch ($sensor) {
    case 1:

        $stmt = $conn->prepare('SELECT * FROM sensores where local="estação";');
        $stmt->execute();

        $dados2 = $stmt->get_result();
        
        echo"
        <div class='brancoRotas'>
        <h2 > Sensor Da Estação </h2>
        <h2 >Presenças listadas até então: </h2>";
    ?> <div class="arrastarrotas"> <?php
        while ($row = $dados2->fetch_assoc()){
        echo"
        <br>
            
              <div class='caixamanuntencao'>
              <h3 class='text'> {$row['presenca']} </h3>
              </div>  
        ";
        
    }echo"</div>";

        break;
    case 2:
         $stmt = $conn->prepare('SELECT * FROM sensores where local="rotatoria_começo";');
        $stmt->execute();

        $dados2 = $stmt->get_result();
        
        echo"
        <div class='brancoRotas'>
        <h2 > Sensor Da Rotatoria começo </h2>
        <h2 >Presenças listadas até então: </h2>";
    ?> <div class="arrastarrotas"> <?php
        while ($row = $dados2->fetch_assoc()){
        echo"
        <br>
            
              <div class='caixamanuntencao'>
              <h3 class='text'> {$row['presenca']} </h3>
              </div>  
        ";
        
    }echo"</div>";

        break;
    case 3:
         $stmt = $conn->prepare('SELECT * FROM sensores where local="curva_final";');
        $stmt->execute();

        $dados2 = $stmt->get_result();
        
        echo"
        <div class='brancoRotas'>
        <h2 > Sensor Da Curva final </h2>
        <h2 >Presenças listadas até então: </h2>";
    ?> <div class="arrastarrotas"> <?php
        while ($row = $dados2->fetch_assoc()){
        echo"
        <br>
            
              <div class='caixamanuntencao'>
              <h3 class='text'> {$row['presenca']} </h3>
              </div>  
        ";
        
    }echo"</div>";

        break;

    case 4:
         $stmt = $conn->prepare('SELECT * FROM sensores where local="rotatoria_final";');
        $stmt->execute();

        $dados2 = $stmt->get_result();
        
        echo"
        <div class='brancoRotas'>
        <h2 > Sensor Da Rotatoria final </h2>
        <h2 >Presenças listadas até então: </h2>";
    ?> <div class="arrastarrotas"> <?php
        while ($row = $dados2->fetch_assoc()){
        echo"
        <br>
            
              <div class='caixamanuntencao'>
              <h3 class='text'> {$row['presenca']} </h3>
              </div>  
        ";
        
    }echo"</div>";

        break;
    default:
         $stmt = $conn->prepare('SELECT * FROM sensores where local="estação";');
        $stmt->execute();

        $dados2 = $stmt->get_result();
        
        echo"
        <div class='brancoRotas'>
        <h2 > Sensor Da Estação </h2>
        <h2 >Presenças listadas até então: </h2>";
    ?> <div class="arrastarrotas"> <?php
        while ($row = $dados2->fetch_assoc()){
        echo"
        <br>
            
              <div class='caixamanuntencao'>
              <h3 class='text'> {$row['presenca']} </h3>
              </div>  
        ";
        
    }echo"</div>";
}

    ?>
</body>

</html>