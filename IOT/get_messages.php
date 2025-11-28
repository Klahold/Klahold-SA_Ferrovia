<?php
require("phpMQTT.php");

$server = "d1afbd3a85c7409fa6447c6f1f6ea1ae.s1.eu.hivemq.cloud";
$port = 8883;
$topic = "#";
$client_id = "phpmqtt-" . rand();

$username = "Hermes";
$password = "Hermes_3";
$cafile = __DIR__ . "/cacert.pem";
$message = "";



$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);
$mqtt->cafile = $cafile;
if (!$mqtt->connect(true, NULL, $username, $password)) {
    echo "Não foi possível conectar ao broker";
    exit;
}

// Subscribing e coletando mensagens por 1-2 segundos
$mqtt->subscribe([
    $topic => [
        "qos" => 0,
        "function" => function ($topic, $msg) use (&$message) {
            if (!empty($msg)) {
                $message = $msg;
            }
        }
    ]
], 0);

$start = time();
while (time() - $start < 2) { // escuta 2 segundos
    $mqtt->proc();
}

$mqtt->close();

echo $message;
