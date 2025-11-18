<?php

include '../config/db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ((preg_match_all($pattern, $email)) >= 1) {
        $stmt = $conn->prepare("SELECT id, email, senha, tipo FROM usuarios WHERE email = ?  AND senha=?");

    } else {
        $stmt = $conn->prepare("SELECT id, email, senha, tipo FROM usuarios WHERE codigo = ? AND senha=?");

    }

    $sql = "INSERT INTO usuarios (senha)
    VALUES ('$senha')";

    $conn->close();
}
    


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="script.js"></script>

    <link rel="stylesheet" href="../style/styles.css">
    <link rel="icon" href="../assets/icons/logo.png" type="image/png">

    <title>Esqueci minha senha</title>
</head>

<body>
    <header class="logo">
        <img class="logoImg" src="../assets/icons/logo.png" alt="Logo">
        <H2><u> Esqueci minha senha </u></H2>
    </header>

    <div class="LoGin">
        <div class="campo">
            <input class="radious" type="text" name="email" id="email" placeholder="Email" required>
        </div>

        <br>

        <div class="campo">
            <input class="radious" type="password" name="senha" id="senha" placeholder="Nova Senha" required>
        </div>

        <br>


    </div>
    <div class="entrar">
        <br>
        <button class="entrar" type="button" onclick="validarFormulario()">Entrar</button>
    </div>

</body>

</html>