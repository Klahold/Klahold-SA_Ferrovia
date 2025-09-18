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

    <title>Alertas</title>

    <link rel="stylesheet" href="../style/styles.css">
    <link rel="icon" href="../assets/icons/logo.png" type="image/png">
</head>

<body>
    <header class="header">
        
        <h1>Alertas</h1>
        <img class="logoMenu" src="../assets/icons/dashbord.png" alt="">
    </header>

    <div class="brancoAlertas">
        <div class="setas">
            <a href="Cargas.php">
                <img class="setaDashboard" src="../assets/icons/seta.png" alt="Botão de voltar">
        </a>
        </div>
        <H2><U>Alertas</U></H2>

        <div class="cinza">
            <h3>Linha 237 fechada para manutenção</h3>
        </div>


    </div>
</body>

</html>