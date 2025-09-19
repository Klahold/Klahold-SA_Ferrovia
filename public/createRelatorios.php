<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: login.php");

endif

?>

<?php

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $tipoRelatorio = $_POST["tipoRelatorio"] ?? "";
    $remetente = $_SESSION["user_id"] ?? "";
    $mensagem = $_POST["mensagem"] ?? "";
    

    $stmt = $conn->prepare("INSERT INTO relatorio (tipo,remetente,mensagem) values(?,?,?)");

    $stmt->bind_param("sis",$tipoRelatorio,$remetente,$mensagem);
    
    if ($stmt->execute()) {
        echo "<script>alert('Novo relatório registrado com sucesso.');</script>";
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
    <title>Criar Relatórios</title>

    <script src="../scripts/script.js"></script>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="icon" href="../assets/icons/logo.png" type="image/png">
</head>

<body>
    <header class="header">
        <h1> Criar Relatórios</h1>
        <img class="logoMenu" src="..//assets/icons/relatorio.png" alt="Relatórios">
    </header>

<div class="branco">

    <form id="Formularios" method="POST">
            <input class="relatorioradious" type="text" name="tipoRelatorio" id="tipoRelatorio" placeholder="Tipo do relatorio..."required>
            <br>
            <br>
            <input class="mensagemradious" type="text" name="mensagem" id="mensagem" placeholder="Mensagem..." required> 
            <br>
            <br>
            <div class="entrar"><button type="submit">Enviar</button></div>
        </form>
</div>
<br><br>
<a  href="relatorios.php">
<div class="branco"> <div class="voltar"><strong > Voltar</strong></div>
</div>
</a>
</body>

</html>