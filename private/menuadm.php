<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: login.php");

endif
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="script.js"></script>

    <link rel="stylesheet" href="../style/styles.css">
    <link rel="icon" href="../assets/icons/logo.png" type="image/png">

    <title>Menu</title>

</head>

<body>

   <header>   
        <div class="logomenu2">
            <a href="../public/login.php?logout=1"><img src="../assets/icons/logout.png" alt="logout" width=55px></a>
            <img class="logoImg" src="../assets/icons/logo.png" alt="Logo">
        </div> 
    </header>

    <div id="menu_linha">

        <a href="../public/rotas.php">
            <div class="quadrado-branco">
                <img class="Tamanho_img" src="../assets/icons/rotas.png" alt="Botão de rotas">
                <strong>
                    <p class="texto">Rotas</p>
                </strong>
            </div>
        </a>

        <a href="../public/avisos.php">
            <div class="quadrado-branco">
                <img class="Tamanho_img" src="../assets/icons/avisos.png" alt="Botão de avisos">
                <strong>
                    <p class="texto">Avisos</p>
                </strong>
            </div>
        </a>

    </div>

    <div id="menu_linha">

        <a href="../public/manutenção1.php">
            <div class="quadrado-branco">
                <img class="Tamanho_img" src="../assets/icons/manutenção.png" alt="Botão de manutencão">
                <strong>
                    <p class="texto">Manutencão</p>
                </strong>
            </div>
        </a>

        <a href="../public/dashboard1.php">
            <div class="quadrado-branco">
                <img class="Tamanho_img" src="..//assets/icons/dashbord.png" alt="Botão de dashboard">
                <strong>
                    <p class="texto">Dashboard</p>
                </strong>
            </div>
        </a>

    </div>

    <div id="menu_linha">
        <a href="../public/relatorios.php">
            <div class="quadrado-branco">
                <img class="Tamanho_img" src="..//assets/icons/relatorio.png" alt="Botão de relatório">
                <strong>
                    <p class="texto">Relatório</p>
                </strong>
            </div>
        </a>

        <a href="funcionário.php">
            <div class="quadrado-branco">
                <img class="Tamanho_img" src="..//assets/icons/funcionario.png" alt="Botão de funcionários">
                <strong>
                    <p class="texto">Funcionários</p>
                </strong>
            </div>
        </a>

    </div>


</body>

</html>