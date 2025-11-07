<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: login.php");

endif
?>
<?php


$id = $_GET['id'];

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $tipoProblema = $_POST["tipoProblema"] ?? "";
    $descricao = $_POST["descricao"] ?? "";
    

    $delete = $conn->prepare("DELETE FROM manutencao WHERE id_trem = ? AND (descricao = 'sem adversidades' OR descricao = 'Sem advertência');");
    $delete->bind_param("i", $id);
    $delete->execute();
    $delete->close();

    $stmt = $conn->prepare("INSERT INTO manutencao (tipo,descricao,id_trem) values(?,?,?);");

    $stmt->bind_param("ssi",$tipoProblema,$descricao,$id);
    
    
    if ($stmt->execute()) {
        header("location: manutenção1.php");
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
  <title>Manutenção</title>

</head>

<body>
  <header class="header">
    <h1>Manutenção</h1>
    <img class="logoMenu" src="../assets/icons/manutenção.png" alt="Icone de manutenção">
  </header>

    <main>

    <section class="meiota">

        <div class="meiotabranco">
            <form id="Formularios" method="POST">
        
                <label for="tipoProblema">Tipo de Problema:</label>
                    <select name="tipoProblema" required>
                        <option value="" disabled selected>Selecione</option>
                        <option value="RODAS">RODAS</option>
                        <option value="MOTOR">MOTOR</option>
                        <option value="VAGÕES">VAGÕES</option>
                        <option value="FREIOS">FREIOS</option>
                        <option value="SUSPENSÃO">SUSPENSÃO</option>
                        <option value="ESTABILIDADE">ESTABILIDADE</option>
                        <option value="Outros">Outros</option>
                    </select>
                <br>
                <br>
                <textarea class="descricaoradious" name="descricao" id="descricao" placeholder="Descrição do problema..." required></textarea>
                <br>
                <br>
                <button class="entrar" type="submit">Enviar</button>
            </form>
            <?php


            echo"
            <br>
            <a  href='manutenção2.php?id=$id'>
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