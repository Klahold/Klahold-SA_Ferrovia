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
    $foto = $_POST['foto'];

    $sql = "UPDATE usuarios SET nome='$nome',data_nascimento='$data_nascimento',naturalidade='$naturalidade',nacionalidade='$nacionalidade',estado_civil='$estado_civil',tipo='$tipo',CPF='$CPF',email='$email',data_admissao='$data_admissao',genero='$genero',codigo='$codigo',senha='$senha',foto='$foto' WHERE id=$id";


    if ($conn->query($sql) === true) {
        header("Location: funcionário.php");
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
    exit();
}

$sql = "SELECT * FROM usuarios WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="icon" href="../assets/icons/logo.png" type="image/png">
    <script src="script.js"></script>

</head>

<body>
    <header class="header">
        <h1>Update</h1>
        <img class="logoMenu" src="../assets/icons/funcionario.png">
    </header>

    <div class="brancoGeral">
        <div class="setas">
            <a href="funcionário.php">
                <img class="setaDashboard" src="../assets/icons/seta.png" alt="Botão de voltar">
            </a>
        </div>
        <div class="arrastarGeral">

            <form method="POST" action="updateFuncionário.php?id=<?php echo $row['id']; ?>"
                enctype="multipart/form-data">

                <div class="logofuncionario">
                    <img class="img_cadastro" src="$imagem" alt="Foto de perfil">
                </div>

                <br>

                <div class="minicinzaalign">
                    <label for="foto" class="minicinza" value="<?php echo $row['foto']; ?>">+Foto</label> 
                    <input type="file" accept="image/*,.jpg, .jpeg, .png" name="foto" id="foto" class="invisivel">
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="nome" id="nome" placeholder="Nome Completo:" class="input"
                        value="<?php echo $row['nome']; ?>" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="data_nascimento" id="data_nascimento" placeholder="Data De Nascimento:"
                        onfocus="(this.type='date')" onblur="(this.type='text')" class="input"
                        value="<?php echo $row['data_nascimento']; ?>" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="naturalidade" id="naturalidade" placeholder="Naturalidade:" class="input"
                        value="<?php echo $row['naturalidade']; ?>" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="nacionalidade" id="nacionalidade" placeholder="Nacionalidade" class="input"
                        value="<?php echo $row['nacionalidade']; ?>" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="estado_civil" id="estado_civil" placeholder="Estado Civil" class="input"
                        value="<?php echo $row['estado_civil']; ?>" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <select name="tipo" id="tipo" class="input" value="<?php echo $row['tipo']; ?>" required>
                        <option value="" disabled selected>Tipo</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Usuario">Usuario</option>
                    </select>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="number" name="CPF" id="CPF" placeholder="CPF:" class="input"
                        value="<?php echo $row['CPF']; ?>" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="email" name="email" id="email" placeholder="Email:" class="input"
                        value="<?php echo $row['email']; ?>" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="data_admissao" id="data_admissao" placeholder="Data de Adimissão:"
                        onfocus="(this.type='date')" onblur="(this.type='text')" class="input"
                        value="<?php echo $row['data_admissao']; ?>" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="genero" id="genero" placeholder="Genero:" class="input"
                        value="<?php echo $row['genero']; ?>" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="codigo" id="codigo" placeholder="Codigo:" class="input"
                        value="<?php echo $row['codigo']; ?>" required>
                </div>

                <br>

                <div class="cinzaCadastro">
                    <input type="text" name="senha" id="senha" placeholder="Senha:" class="input"
                        value="<?php echo $row['senha']; ?>" required>
                </div>

                <br>

                <div class="minicinzaalign">
                    <button type="submit" name="register" class="minicinza">Atualizar</button>
                </div>

            </form>

        </div>

    </div>

</body>

</html>