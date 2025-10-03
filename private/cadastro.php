<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: login.php");

endif;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $naturalidade = $_POST['naturalidade'];
    $nacionalidade = $_POST['nacionalidade'];
    $estado_civil = $_POST['estado_civil'];
    $tipo = $_POST['tipo'];
    $CPF = $_POST['CPF'];
    $email = $_POST['email'];
    $data_admissao = $_POST['data_admissao'];
    $genero = $_POST['genero'];
    $codigo = $_POST['codigo'];
    $senha = $_POST['senha'];
    $hash = password_hash($senha, PASSWORD_DEFAULT);


    $sql = " INSERT INTO usuarios (nome,data_nascimento,naturalidade,nacionalidade,estado_civil,tipo,CPF,email,data_admissao,genero,codigo,senha) 
    VALUE ('$nome','$data_nascimento','$naturalidade','$nacionalidade','$estado_civil','$tipo','$CPF','$email','$data_admissao','$genero','$codigo','$hash') ";

    if ($conn->query($sql) === true) {
        header("Location: funcionário.php");
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="icon" href="../assets/icons/logo.png" type="image/png">
    <script src="script.js"></script>

</head>

<body>
    <header class="header">
        <h1>Cadastrar</h1>
        <img class="logoMenu" src="../assets/icons/funcionario.png">
    </header>

    <div class="brancoGeral">
        <div class="arrastarGeral">

            <form method="POST" action="cadastro.php">

                <div class="logofuncionario">
                    <img class="img_cadastro" src="..//assets/images/fotoCadastro.png" alt="">
                </div>

                <br>

                <div class="minicinzaalign">
                    <input type="file" id="profilePic" name="profilePic" accept="image/*" style="display: none;">

                    <button class="minicinza" type="button"
                        onclick="document.getElementById('profilePic').click()">+Foto</button>

                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="nome" id="nome" placeholder="Nome Completo:" class="input" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="data_nascimento" id="data_nascimento" placeholder="Data De Nascimento:"
                        onfocus="(this.type='date')" onblur="(this.type='text')" class="input" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="naturalidade" id="naturalidade" placeholder="Naturalidade:" class="input"
                        required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="nacionalidade" id="nacionalidade" placeholder="Nacionalidade" class="input"
                        required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="estado_civil" id="estado_civil" placeholder="Estado Civil" class="input"
                        required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <select name="tipo" id="tipo" class="input">
                        <option value="" disabled selected>Tipo</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Usuario">Usuario</option>
                    </select>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="number" name="CPF" id="CPF" placeholder="CPF:" class="input" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="email" name="email" id="email" placeholder="Email:" class="input" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="data_admissao" id="data_admissao" placeholder="Data de Adimissão:"
                        onfocus="(this.type='date')" onblur="(this.type='text')" class="input" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="genero" id="genero" placeholder="Genero:" class="input" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="codigo" id="codigo" placeholder="Codigo:" class="input" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="senha" id="senha" placeholder="Senha:" class="input" required>
                </div>

                <br>

                <div class="minicinzaalign">
                    <button type="submit" name="register" class="minicinza">Cadastrar</button>
                </div>

            </form>

        </div>

    </div>

</body>

</html>