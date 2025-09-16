<?php

include '../config/db.php';

session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

$msg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["emailoucodigo"] ?? "";
    $pass = $_POST["password"] ?? "";

    $pattern = "/\W/";

    if((preg_match_all($pattern,$email))>= 1){
        $stmt = $conn->prepare("SELECT id, email, senha FROM usuarios WHERE email = ?  AND senha=?");

    }else{
        $stmt = $conn->prepare("SELECT id, email, senha FROM usuarios WHERE codigo = ? AND senha=?");

    }

    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $dados = $result->fetch_assoc();
    $stmt->close();

    if ($dados) {
        $_SESSION["user_id"] = $dados["id"];
        $_SESSION["username"] = $dados["nome"];
        header("Location: login.php");
        exit;
    } else {
        $msg = "Usuário ou senha incorretos!";
    }
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="../scripts/login_Script.js"></script>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="icon" href="../assets/icons/Logo.png" type="image/png">
    <title>login</title>

</head>

<body>
    <header class="logo">
        <img class="logoImg" src="../assets/icons/Logo.png" alt="Logo">
        <H2><u> Login </u></H2>
    </header>

    <?php if (!empty($_SESSION["user_id"])): 
        
        header("Location: menu.php");

        ?>

    <?php else: ?>

    <div class="LoGin">
        <form id="Formularios" method="POST">
            <div class="campo"><input class="radious" type="text" name="emailoucodigo" id="Codigo_maquinista" placeholder="Email ou Codigo"required></div>
            <br>
            <div class="campo"> <input class="radious" type="password" name="password" id="senha_maquinista" placeholder="Senha" required> </div>
            <br>
            <button class="esqueci" type="button" onclick=""> <u> Esqueci minha senha </u></button>
            <br>
            <div class="entrar"><button type="submit">Entrar</button></div>
        </form>

    <?php endif; ?>

</body>

</html>