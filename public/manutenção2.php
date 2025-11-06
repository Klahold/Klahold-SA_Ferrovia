<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: login.php");

endif
?>
<?php
$id = $_GET['id'];

$stmt = $conn->prepare('SELECT * FROM trens where id=?;');
$stmt->bind_param('i', $id);
$stmt->execute();

$result = $stmt->get_result();

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

    <section class="squarewhite">
    <?php 

    if (isset($_GET['trem'])) {
    echo"
      <div class='setas'>
      <a href='readtrem.php'>
        <img class='setaDashboard' src='../assets/icons/seta.png' alt='Botão de voltar'>
      </a></div>";
    }else{
      echo"
      <div class='setas'>
      <a href='manutenção1.php'>
        <img class='setaDashboard' src='../assets/icons/seta.png' alt='Botão de voltar'>
      </a></div>"
    ;}
    
    ?>
      <?php 

        while ($row = $result->fetch_assoc()) {

        echo "<h1 class='text'> Trem {$row['codigo']} </h1>
              <br>
              <a href='createReport.php?id={$row['id']}'> <div class='cinzacriar'>
              reportar problema</div>
              </a>
        ";}

        $stmt->close();
        ?>

          <Br><Br>

        <?php

        $stmt = $conn->prepare('SELECT * FROM manutencao where id_trem=?;');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $dados2 = $stmt->get_result();

        while ($row = $dados2->fetch_assoc()){

        $data_cricacao = date('d/m/Y', strtotime($row['criado_em']));

        echo"<div class='caixamanuntencao'>
        
              <h3 class='text'> Trem {$row['tipo']} </h3>
              <h3 class='text'>{$data_cricacao}</h3></div>
            </div
        ";}
            
        $stmt->close();
                    
        ?>

    </section>

  </main>

  <footer>

  </footer>
</body>

</html>