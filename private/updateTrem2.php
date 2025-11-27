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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $codigo = $_POST['codigo'];
    $velocidade = $_POST['velocidade'];
    $localizacao = $_POST['localizacao'];
    $direcao = $_POST['direcao'];
    $horarios = $_POST['horarios'];


    $sql = "UPDATE trens SET codigo='$codigo',velocidade='$velocidade',localizacao='$localizacao',direcao='$direcao',horarios='$horarios' WHERE id=$id";


    if ($conn->query($sql) === true) {
        header("Location: ../public/readtrem.php");
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
    exit();
}

$sql = "SELECT * FROM trens WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update Trem</title>
    <link rel="stylesheet" href="../style/styles.css">
    <a href="../public/login.php"><link rel="icon" href="../assets/icons/logo.png" type="image/png"></a>

</head>

<body>
    <header class="header">
        <h1>Update Trem</h1>
        <img class="logoMenu" src="../assets/icons/manutenção.png">
    </header>

    <div class="brancoGeral">
        <div class="arrastarGeral">

            <form method="POST" action="updateTrem2.php?id=<?php echo $row['id']; ?>"
                enctype="multipart/form-data">

                <br>

                <label class="labelsmanutencao" for="codigo">Código</label> <br>
                <input class="updateTrem" type="text" name="codigo" id="codigo" placeholder="codigo:" 
                    value="<?php echo $row['codigo']; ?>" required>

                <label class="labelsmanutencao" for="velocidade">Velocidade</label>
                <input class="updateTrem" type="text" name="velocidade" id="velocidade" placeholder="velocidade:" 
                    value="<?php echo $row['velocidade']; ?>" required>

                <label class="labelsmanutencao" for="localizacao">Localização</label>
                <input class="updateTrem" type="text" name="localizacao" id="localizacao" placeholder="localização:" 
                    value="<?php echo $row['localizacao']; ?>" required>

                <label class="labelsmanutencao" for="direcao">Direção</label>
                <input  class="updateTrem" type="text" name="direcao" id="direcao" placeholder="direcão:" 
                    value="<?php echo $row['direcao']; ?>" required>

                <label class="labelsmanutencao" for="horarios">Horários</label>
                <input class="updateTrem" type="text" name="horarios" id="horarios" placeholder="horarios:" 
                    value="<?php echo $row['horarios']; ?>" required>

                <br>

                <div class="minicinzaalign">
                    <div class="cinza"><button class="cinza" type="submit"><strong>Atualizar</strong></button></div>
                </div>

            </form>

        </div>

    </div>

</body>

</html>