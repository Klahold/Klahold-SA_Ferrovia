<?php

include '../config/db.php';

$id = $_GET['id'];

$sql = " DELETE FROM usuarios WHERE id=$id ";

if ($conn->query($sql) === true) {
    echo "Registro excluído com sucesso.
        <a href='funcionário.php'>Ver funcionários.</a>
        ";
} else {
    echo "Erro " . $sql . '<br>' . $conn->error;
}
$conn -> close();
exit();
?>