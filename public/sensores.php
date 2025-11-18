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
        <?php

        require("../config/phpMQTT.php");

        $server = "d1afbd3a85c7409fa6447c6f1f6ea1ae.s1.eu.hivemq.cloud";
        $port = 8883;
        $topic = "teste";
        $client_id = "phpmqtt-" . rand();

        $username = "hivemq.app";
        $password = "Hivemq.app1";

        header('Content-Type: application/json');

        $messages = [];

        $mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);
        if (!$mqtt->connect(true, NULL, $username, $password)) {
            echo json_encode(["error" => "Não foi possível conectar ao broker"]);
            exit;
        }

        // Subscribing e coletando mensagens por 1-2 segundos
        $mqtt->subscribe([$topic => ["qos" => 0, "function" => function ($topic, $msg) use (&$messages) {
            $messages[] = ["topic" => $topic, "msg" => $msg, "time" => date("H:i:s")];
        }]], 0);

        $start = time();
        while (time() - $start < 2) { // escuta 2 segundos
            $mqtt->proc();
        }

        $mqtt->close();

        echo json_encode($messages);

        ?>

        <h3>Integração de sensores em desenvolvimento.</h3>
    </div>

    </div>
</body>

</html>