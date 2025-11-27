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

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $conn->prepare("SELECT id, nome, email, senha, tipo FROM usuarios WHERE email = ? ");
    } else {
        $stmt = $conn->prepare("SELECT id, nome, email, senha, tipo FROM usuarios WHERE codigo = ? ");
    }

    if ($stmt === false) {
        $msg = "Erro no servidor. Tente novamente mais tarde.";
    } else {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $dados = $result->fetch_assoc();
        $stmt->close();

        if ($dados && password_verify($pass, $dados['senha'])) {
            $_SESSION["user_id"] = $dados["id"];
            $_SESSION["username"] = $dados["nome"];
            $_SESSION["tipo"] = $dados["tipo"];

            if ($_SESSION["tipo"] === "Administrador") {
                header("Location: ../private/menuadm.php");
            } else {
                header("Location: menu.php");
            }
            exit;
        } else {
            $msg = "Usuário ou senha incorretos!";
        }
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

        if ($_SESSION["tipo"] == "Administrador") {
            header("location:../private/menuadm.php");
        } else {
            header("Location: menu.php");
        }

        ?>

    <?php else: ?>

        <div class="LoGin">
            <form id="Formularios" method="POST">
                <div class="campo"><input class="radious" type="text" name="emailoucodigo" id="Codigo_maquinista"
                        placeholder="Email ou Codigo" required></div>
                <br>
                <div class="campo"> <input class="radious" type="password" name="password" id="senha_maquinista"
                        placeholder="Senha" required> </div>
                <br>
                <a href="Esqueci.php" class="esqueci">Esqueci minha senha</a>
                <br>
                <div class="entrar"><button type="submit">Entrar</button></div>
            </form>

        <?php endif; ?>

</body>

</html>