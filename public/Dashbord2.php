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
        <img class="logoMenu" src="../assets/icons/dashbord.png" alt="Rotas">
    </header>

    <div class="brancoDashboard">
        <div class="setas">
    <a href="Dashboard1.php">
                <img class="setaDashboard" src="../assets/icons/seta.png" alt="Botão de voltar">
        </a>
        
  <a href="Cargas.php">
                <img class="setaDashboard2" src="../assets/icons/seta2.png" alt="Botão de continuar">
        </a>
  </div>
        <div class="cinzaDashboard">


        
        <?php

        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
        echo "<h1 class='text'> Trem {$row['codigo']} </h1>
              <br>
        ";}

        
           $stmt = $conn->prepare('SELECT * FROM trens where id=?;');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $dados2 = $stmt->get_result();

        while ($row = $dados2->fetch_assoc()){
            echo "<table>
                        <thead>
                                <tr>
                                <strong><p>velocidade</p></strong>
                                <p>{$row['velocidade']}</p>
                                <strong><p>direcao</p></strong>
                                <p>{$row['direcao']}</p>
                                <strong><p>localizacao</p></strong>
                                <p>{$row['localizacao']}</p>
                                <tr>
                        <thead>
                <tbody>";}
            
        $stmt->close();
        }

        ?>
        
    </div>
 

    

    </div>

</body>

</html>