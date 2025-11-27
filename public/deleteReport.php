<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header(header: "Location: login.php");

endif;

if (!isset($_GET['id'])) {
    echo "ID não informado.";
    exit;
}

$id = $_GET['id'];
$id_Trem= $_GET['id_Trem'];


$sql = " DELETE FROM manutencao WHERE id=$id ";

if ($conn->query($sql) === true) {
    $sqlCheck = "SELECT COUNT(*) as total FROM manutencao WHERE id_trem=$id_Trem";
    $resultCheck = $conn->query($sqlCheck);
    $rowCheck = $resultCheck->fetch_assoc();
    if ($rowCheck['total'] == 0) {
        $sqlInsert = "INSERT INTO manutencao (id_trem, tipo, descricao) VALUES ($id_Trem, 'Sem adversidades', 'Sem adversidades')";
        $conn->query($sqlInsert);
    }
    header("Location: manutenção2.php?id={$id_Trem}");
} else {
    echo "Erro " . $sql . '<br>' . $conn->error;
}
$conn -> close();
exit();
?>