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

    <img class="mapa" src="..//assets/icons/mapaFeio.png" alt="mapa">

    <div class="brancoRotas">

        <h2><strong><u>Linha 4</u></strong></h2>

        <div class="cinzaRotas">
            <h3>Notificação</h3>
        </div>

        <div class="espaco">

            <div class="cinzaRotas">
                <h3>Interromper</h3>
            </div>

            <div class="cinzaRotas">
                <h3>Alterar rota</h3>
            </div>

        </div>



    </div>
</body>

</html>