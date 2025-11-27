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

  <title>Dashboard</title>

  <link rel="stylesheet" href="../style/styles.css">
  <link rel="icon" href="../assets/icons/logo.png" type="image/png">
</head>

<body>
  <header class="header">
    <h1>Dashboard</h1>
    <a href="login.php"><img class="logoMenu" src="../assets/icons/dashbord.png" alt="Rotas"></a>
  </header>

  <div class="brancoAlertas">
   
  <div class="setas">

  <?php
  while ($row = $result->fetch_assoc()){
  echo "
    <a href='Dashbord2.php?id={$row['id']}&trem=1'><img class='setaDashboard' src='../assets/icons/seta.png' alt='Botão de voltar'></a>
        <H2><U>Carga</U></H2>
  <a href='Alertas.php?id={$row['id']}&trem=1'><img class='setaDashboard2' src='../assets/icons/seta2.png' alt='Botão de continuar'></a>
      ";}
  ?>

  </div>

    

    <div class="arrastarCargas">

      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

          $stmt = $conn->prepare('SELECT * FROM carga where id_trem=?;');
        $stmt->bind_param('i', $id_trem);
        $stmt->execute();

        $dados2 = $stmt->get_result();

        while ($row = $dados2->fetch_assoc()){

          echo '
        <div class="cinzaCargas">
            <div class="espacoCarga">
                <div class="espacoCarga"><p><strong>Vagão</strong></p></div>
                <div class="espacoCarga"><p>' . $row['id'] . '</p></div>
            </div>
            <div class="espacoCarga">
                <div class="espacoCarga"><p><strong>Conteúdo</strong></p></div>
                <div class="espacoCarga"><p>' . $row['conteúdo'] . '</p></div>
            </div>
        </div>
        <br>
        ';}
        $stmt->close();
        }
      } else {
        echo "Nenhuma carga encontrada.";
      }
      ?>

    </div>


  </div>
</body>

</html>