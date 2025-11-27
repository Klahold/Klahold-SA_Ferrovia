<?php

include '../config/db.php';

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $hash = password_hash($senha, PASSWORD_DEFAULT);

    if (!empty($email) && !empty($senha)) {
        $sql = "UPDATE usuarios SET senha='$hash' WHERE email='$email'";
        if ($conn->query($sql) === TRUE) {
            if ($conn->affected_rows > 0) {
                ?>
                <h2 class="textoEsqueci">Senha atualizada!</h2>;
                <?php
            } else {
                ?>
                <h2 class="textoEsqueci">Email não encontrado!</h2>;
                <?php
            }
        } else {
            echo "<h2>Erro ao atualizar:</h2>" . $conn->error;
        }
    } 
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
        <form action="" method="POST">
        <?php if (!empty($message)) : ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <div class="campo">
            <input class="radious" type="text" name="email" id="email" placeholder="Email" required>
        </div>

        <br>

        <div class="campo">
            <input class="radious" type="password" name="senha" id="senha" placeholder="Nova Senha" required>
        </div>

        <br>


    </div>
    <div class="esqueciVoltar">
        <br>
        <button type="submit">Alterar senha</button> <button><a href="login.php">logar</a></button>
    </div>
    </form>

</body>

</html>