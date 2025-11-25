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
        <img class="logoMenu" src="..//assets/icons/rotas.png" alt="Rotas">
    </header>

    <div class="azul">
    <img class="mapa" src="..//assets/icons/ferrovia.png" alt="mapa">

    <a href="rotas.php?sensor=1"><div class="sensor1"></div></a>
    <a href="rotas.php?sensor=2"><div class="sensor2"></div></a>
    <a href="rotas.php?sensor=3"><div class="sensor3"></div></a>

    </div>

    



    <br><br>

    <div class="brancoRotas">



    </div>
</body>

</html>