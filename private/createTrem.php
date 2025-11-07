<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: ../public/login.php");

endif
?>
<?php

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $velocidade = $_POST["velocidade"] ?? "";
    $localizacao = $_POST["localizacao"] ?? "";
    $direcao = $_POST["direcao"] ?? "";
    $horarios = $_POST["horarios"] ?? "";
    $codigo = $_POST["codigo"] ?? "";

    $stmt = $conn->prepare("INSERT INTO trens (velocidade,localizacao,direcao,horarios,codigo) values(?,?,?,?,?)");

    $stmt->bind_param("issis",$velocidade,$localizacao,$direcao,$horarios,$codigo);
    
    if ($stmt->execute()) {

        $trem_id = $conn->insert_id; 
        $status="sem adversidades";
        $descricao="sem adversidades";

        $stmt2 = $conn->prepare("INSERT INTO manutencao (id_trem, tipo,descricao) VALUES (?,?,?)");
        $stmt2->bind_param("iss", $trem_id,$status,$descricao);
        $stmt2->execute();
        $stmt2->close();

        header("location:../public/readtrem.php");
        exit();
    } else {
        echo "Erro " . $stmt->error;
    }
    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/styles.css">
  <link rel="icon" href="../assets/icons/logo.png" type="image/png">
  <title>Cadastrar Trem</title>

</head>

<body>
  <header class="header">
    <h1>Manutenção</h1>
    <img class="logoMenu" src="../assets/icons/manutenção.png" alt="Icone de manutenção">
  </header>

    <main>

    <section class="meiota">

        <div class="meiotabrancotrem">

            <h2><Strong>Cadastrar trem</Strong></h2>

            <form id="Formularios" method="POST" action="createTrem.php">
                <div class="formstrem">
                <input class="cadastrartrem" type="number" name="velocidade" id="velocidade" placeholder="Velocidade:" required>
                <br>
                <input class="cadastrartrem" type="text" name="localizacao" id="localizacao" placeholder="Localização:"required>
                <br>
                <input class="cadastrartrem" type="text" name="direcao" id="direcao" placeholder="Direção:"required>
                <br>
                <input class="cadastrartrem" type="number" name="horarios" id="horarios"placeholder="Horários:" required>
                <br>
                <input class="cadastrartrem" type="text" name="codigo" id="codigo" maxlength="4" placeholder="Código:"required>
                </div>
                <br>
                <br>
                <div class="cinza"><button class="cinza" type="submit"><strong>Enviar</strong></button></div>
            </form>
            <?php
            echo"
            <br>
            <a  href='../public/readtrem.php'>
            <div class='cinza'> <div class='voltar'><strong > Voltar</strong></div>
            </div>";

            ?>
    
        </div>

    </section>

    </main>

    <footer>

    </footer>

</body>
</html>