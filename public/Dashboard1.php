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
  <link rel="stylesheet" href="../style/styles.css">
  <link rel="icon" href="../assets/icons/logo.png" type="image/png">
  <title>Dashboard</title>

</head>
<body>
  <header class="header">
    <h1>Dashboard</h1>
    <img class="logoMenu" src="../assets/icons/manutenção.png" alt="Icone de manutenção">
</header>

  <main>

    <section class="squarewhite">

        <a href="Dashbord2.php">
        <div class="selection"> 
        <div class="trems">
          <img src="../assets/images/tremVermelho.png" alt="Trem KM2D" class="trem">
          <div class="treminfo">
            <h2>Trem KM2D</h2>
            <h3> - status</h3>
          </div>
          </div>
          <div class="pontosmanutencão">
            <div class="ponto"></div>
            <div class="ponto"></div>
            <div class="ponto"></div>
          </div>
        </div>
        </a>

        <br>

        <a href="Dashbord2.php">
        <div class="selection">
          <div class="trems">
            <img src="../assets/images/tremAzul.png" alt="Trem N2VF" class="trem">
            <div class="treminfo">
              <h2>Trem N2VF</h2>
              <h3> - status</h3>
            </div>
            </div>
            <div class="pontosmanutencão">
              <div class="ponto"></div>
              <div class="ponto"></div>
              <div class="ponto"></div>
            </div>
          </div>
          </a>

          <br>

          <a href="Dashbord2.php">
          <div class="selection">
            <div class="trems">
              <img src="../assets/images/tremVermelho.png" alt="Trem N3VF" class="trem">
              <div class="treminfo">
                <h2>Trem N3VF</h2>
                <h3> - status</h3>
              </div>
              </div>
              <div class="pontosmanutencão">
                <div class="ponto"></div>
                <div class="ponto"></div>
                <div class="ponto"></div>
              </div>
            </div>
            </a>

            <br>

            <a href="Dashbord2.php">
            <div class="selection">
              <div class="trems">
                <img src="../assets/images/tremAzul.png" alt="Trem N9NM" class="trem">
                <div class="treminfo">
                  <h2 id="">Trem N9NM</h2>
                  <h3> - status</h3>
                </div>
                </div>
                <div class="pontosmanutencão">
                  <div class="ponto"></div>
                  <div class="ponto"></div>
                  <div class="ponto"></div>
                </div>
              </div>
              </a>
      </section>

  </main>

  <footer>

  </footer>
</body>

</html>