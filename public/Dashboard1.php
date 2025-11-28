<?php

include '../config/db.php';

$sql = "SELECT 
            trens.id, 
            trens.codigo, 
            GROUP_CONCAT(manutencao.tipo SEPARATOR ', ') AS problemas
        FROM trens
        LEFT JOIN manutencao ON trens.id = manutencao.id_trem
        GROUP BY trens.id, trens.codigo;";

  $result = $conn->query($sql);

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: login.php");

endif

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/styles.css">
  <link rel="icon" href="../assets/icons/logo.png" type="image/png">
  <title>Dashboard</title>

</head>
<body>
  <header class="header">
    <h1>Dashboard</h1>
    <a href="login.php"><img class="logoMenu" src="../assets/icons/manutenção.png" alt="Icone de manutenção"></a>
</header>

  <main>

    <section class="squarewhite">
      

        <div class="arrastar">

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $problemas = $row['problemas'] ? $row['problemas'] : 'sem adversidades';

                if ($problemas != 'sem adversidades') {
                    echo "<a href='Dashbord2.php?id={$row['id']}&trem=1'>
                    <div class='selection'> 
                    <div class='trems'>
                      <img src='../assets/images/tremVermelho.png' alt=". $row['codigo'] ." class='trem'>
                      <div class='treminfo'>
                        <h2>Trem ". $row['codigo'] ."</h2>
                        <h3 class='vermelhoProblema'> - PROBLEMA EM ". $problemas ." -</h3>
                      </div>
                      </div>
                      <div class='pontosmanutencão'>
                        <div class='ponto'></div>
                        <div class='ponto'></div>
                        <div class='ponto'></div>
                      </div>
                    </div>
                    </a>
                    <br>";
                } else {
                    echo "<a href='Dashbord2.php?id={$row['id']}&trem=1'>
                    <div class='selection'> 
                    <div class='trems'>
                      <img src='../assets/images/tremAzul.png' alt=". $row['codigo'] ." class='trem'>
                      <div class='treminfo'>
                        <h2>Trem ". $row['codigo'] ."</h2>
                        <h3> - sem adversidades -</h3>
                      </div>
                      </div>
                      <div class='pontosmanutencão'>
                        <div class='ponto'></div>
                        <div class='ponto'></div>
                        <div class='ponto'></div>
                      </div>
                    </div>
                    </a>
                    <br>";
                }
            }
        } else {
            echo "<h2>Nenhum trem cadastrado no momento.</h2>";
        }
        ?>
      
    </div>
      </section>

  </main>

  <footer>

  </footer>
</body>

</html>