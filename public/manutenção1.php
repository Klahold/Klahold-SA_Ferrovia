<?php

include '../config/db.php';


$stmt = $conn->prepare('SELECT * FROM manutencao inner join trens on trens.id=id_trem;');
$stmt->execute();

$result = $stmt->get_result();

session_start();

if (empty($_SESSION["user_id"])):

  header("Location: login.php");

endif;

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
    <h1 class>Manutenção</h1>
    <a href="login.php"><img class="logoMenu" src="../assets/icons/manutenção.png" alt="Icone de manutenção"></a>
</header>

  <main>

    <section class="squarewhite">

    <div class="setas" style="margin-bottom: 20px;">
      <a href="readtrem.php">
          <img class="setaDashboard" src="../assets/icons/seta.png" alt="Botão de voltar">
      </a>
    </div>
    <div class="cinza">
    <h3>Todos as manutenções registradas</h3>
    </div>
    
    <br>
    <?php
      if ($result->num_rows > 0) {
        echo "<ul style='list-style: none; padding: 0;'>";
        while ($row = $result->fetch_assoc())
        if($row['tipo'] === "sem adversidades"){
          
        }else{
          $data_criacao = date('d/m/Y', strtotime($row['criado_em']));
          $tipo = !empty($row['tipo']) ? $row['tipo'] : 'sem tipo';
          $trem = "Trem : {$row['codigo']}";

          echo "
          <li style='margin-bottom: 15px;'>
            <div class='caixamanuntencao'>
              <h3 class='text'>{$trem}</h3>
              <h3 class='text'>{$tipo}</h3>
              <h3 class='text'>{$data_criacao}</h3>
            </div>
          </li>
          ";
        }
        echo "</ul>";
      } else {
        echo "<h2>Nenhuma manutenção requisitada no momento.</h2>";
      }
    ?>
      
    </section>

  </main>

  <footer>

  </footer>
</body>

</html>