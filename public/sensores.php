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

    <title>Sensores</title>

    <link rel="stylesheet" href="../style/styles.css">
    <link rel="icon" href="../assets/icons/logo.png" type="image/png">
</head>

<body>
    <header class="header">

        <h1>Sensores</h1>
        <img class="logoMenu" src="../assets/icons/dashbord.png" alt="">
    </header>

    <div class="brancoAlertas">
        <div class="setas">
            <a href="../private/menuadm.php">
                <img class="setaDashboard" src="../assets/icons/seta.png" alt="Botão de voltar">
            </a>
        </div>
        <H2><U>Sensores</U></H2>

        <div class="espaco">
            <div class="flex">
                <div class="cinza">
                    <?php ?>
                </div>

                <div class="cinza">

                </div>
            </div>
            <div class="flex">
                <div class="cinza">

                </div>

                <div class="cinza">

                </div>
            </div>
        </div>
        
        <h3>Integração de sensores em desenvolvimento.</h3>
    </div>

    </div>
</body>

</html>