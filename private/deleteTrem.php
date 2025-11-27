<?php

include '../config/db.php';

$sql = "SELECT id, codigo FROM trens";

$result = $conn->query($sql);


session_start();

if (empty($_SESSION["user_id"])):

    header("Location: ../public/login.php");

endif;

if (isset($_GET['id'])) {
   $id = (int)$_GET['id'];


   $sqlManutencao = "DELETE FROM manutencao WHERE id_trem=$id";
   $conn->query($sqlManutencao);

   $sql = "DELETE FROM trens WHERE id=$id";
   if ($conn->query($sql) === true) {
       $conn->close();
       header("Location: ../public/readtrem.php");
       exit;
   } else {
       echo "Erro " . $sql . '<br>' . $conn->error;
       $conn->close();
       exit;
   }
}

if($_SERVER["REQUEST_METHOD"] === "POST") {
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/styles.css">
  <link rel="icon" href="../assets/icons/logo.png" type="image/png">
  <title>Trems</title>

</head>
<body>
  <header class="header">
    <h1 class>trem</h1>
    <a href="../public/login.php"><img class="logoMenu" src="../assets/icons/manutenção.png" alt="Icone de manutenção"></a>
</header>

  <main>
    

    <section class="squarewhite">
<?php
 if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                     echo "<a href='deleteTrem.php?id={$row['id']}'>
                    <div class='selection'> 
                    <div class='trems'>
                      <img src='../assets/images/tremAzul.png' alt=". $row['codigo'] ." class='trem'>
                      <div class='treminfo'>
                        <h2>Trem ". $row['codigo'] ."</h2>
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
        } else {
            echo "<h2>Nenhum trem cadastrado no momento.</h2>";
        }

        

?>
<a href="../public/readtrem.php">
        <div class="cinza">
          <h4>voltar</h4>
        </div></a>
 </section>
</main>
</body>
</html>