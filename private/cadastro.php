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

    $sql = " INSERT INTO usuarios (name,data_nascimento,naturalidade,nacionalidade,estado_civil,tipo,CPF,email,data_admissao,genero,codigo,senha) 
    VALUE ('$name','$data_nascimento','$naturalidade','$nacionalidade','$estado_civil','$tipo','$CPF','$email','$data_admissao','$genero','$codigo','$senha') ";

    if ($conn->query($sql) === true) {
        echo "Novo registro criado com sucesso.";
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

                <form class="minicinzaalign" action="/upload" method="POST" enctype="multipart/form-data">
                    <input type="file" id="profilePic" name="profilePic" accept="image/*" style="display: none;"
                        onchange="this.form.submit()">

                    <button class="minicinza" type="button" onclick="document.getElementById('profilePic').click()">+ Foto</button>

                </form>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="nome" id="nome" placeholder="Nome Completo:" class="input">
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="date" name="dataNascimento" id="dataNascimento" placeholder="Data De Nascimento:" class="input">
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="naturalidade" id="naturalidade" placeholder="Naturalidade:" class="input">
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="nacionalidade" id="nacionalidade" placeholder="Nacionalidade" class="input">
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="estadoCivil" id="estadoCivil" placeholder="Estado Civil" class="input">
                </div>

                <br>

                <div class="cinzaCadastro">
                    <select name="tipo" id="cargo" placeholder="Tipo" class="input">
                        <option value="Administrador" >Administrador</option>
                        <option value="Usuario" >Usuario</option>
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
                    <input type="date" name="dataAdmissão" id="dataAdmissão" placeholder="Data de Adimissão:" class="input" required>
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
                    <button type="submit" class="minicinza" onclick="validarFormulario()">Cadastrar</button>
                </div>

            </form>

        </div>

    </div>

</body>

</html>