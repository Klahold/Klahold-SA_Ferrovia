<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header(header: "Location: ../public/login.php");

endif;

if (!isset($_GET['id'])) {
    echo "ID não informado.";
    exit;
}

$id = $_GET['id'];

$sql = " DELETE FROM usuarios WHERE id=$id ";

if ($conn->query($sql) === true) {
    header("Location: funcionário.php");
} else {
    echo "Erro " . $sql . '<br>' . $conn->error;
}
$conn -> close();
exit();
?>