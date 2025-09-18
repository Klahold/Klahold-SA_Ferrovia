<?php

include '../config/db.php';

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

  <title>Dashboard</title>

  <link rel="stylesheet" href="../style/styles.css">
  <link rel="icon" href="../assets/icons/logo.png" type="image/png">
</head>

<body>
  <header class="header">
    <h1>Dashboard</h1>
    <img class="logoMenu" src="../assets/icons/dashbord.png" alt="Rotas">
  </header>

  <div class="brancoAlertas">
    
  <div class="setas">
    <a href="Dashbord2.php">
                <img class="setaDashboard" src="../assets/icons/seta.png" alt="Botão de voltar">
        </a>
        <H2><U>Carga</U></H2>
  <a href="Alertas.php">
                <img class="setaDashboard2" src="../assets/icons/seta2.png" alt="Botão de continuar">
        </a>
  </div>

    

    <div class="arrastarCargas">

      <div class="cinzaCargas">
        <div class="arrumadores">
          <div class="flex">
            <h2 class="texto">Vagao 1</h2>
          </div>

          <br>

          <div class="espaco">
            <h3 class="texto">Conteúdo</h3>
            <h3 class="texto">Passageiros</h3>
          </div>
        </div>
      </div>

      <br>

      <div class="cinzaCargas">
        <div class="arrumadores">
          <div class="flex">
            <h2 class="texto">Vagao 2</h2>
          </div>

          <br>

          <div class="espaco">
            <h3 class="texto">Conteúdo</h3>
            <h3 class="texto">Ferro</h3>
          </div>
        </div>
      </div>

      <br>

      <div class="cinzaCargas">
        <div class="arrumadores">
          <div class="flex">
            <h2 class="texto">Vagao 3</h2>
          </div>

          <br>

          <div class="espaco">
            <h3 class="texto">Conteúdo</h3>
            <h3 class="texto">Carvão</h3>
          </div>
        </div>
      </div>

      <br>

      <div class="cinzaCargas">
        <div class="arrumadores">
          <div class="flex">
            <h2 class="texto">Vagao 4</h2>
          </div>

          <br>

          <div class="espaco">
            <h3 class="texto">Conteúdo</h3>
            <h3 class="texto">Gasolina</h3>
          </div>
        </div>
      </div>

      <br>

      <div class="cinzaCargas">
        <div class="arrumadores">
          <div class="flex">
            <h2 class="texto">Vagao 5</h2>
          </div>

          <br>

          <div class="espaco">
            <h3 class="texto">Conteúdo</h3>
            <h3 class="texto">Gasolina</h3>
          </div>
        </div>
      </div>

      <br>

      <div class="cinzaCargas">
        <div class="arrumadores">
          <div class="flex">
            <h2 class="texto">Vagao 6</h2>
          </div>

          <br>

          <div class="espaco">
            <h3 class="texto">Conteúdo</h3>
            <h3 class="texto">Soja</h3>
          </div>
        </div>
      </div>

      <br>

      <div class="cinzaCargas">
        <div class="arrumadores">
          <div class="flex">
            <h2 class="texto">Vagao 7</h2>
          </div>

          <br>

          <div class="espaco">
            <h3 class="texto">Conteúdo</h3>
            <h3 class="texto">Trigo</h3>
          </div>
        </div>
      </div>

    </div>


  </div>
</body>

</html>