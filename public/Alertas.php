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

    <title>Alertas</title>

    <link rel="stylesheet" href="../style/styles.css">
    <link rel="icon" href="../assets/icons/logo.png" type="image/png">
</head>

<body>
    <header class="header">
        
        <h1>Alertas</h1>
        <a href="login.php"><img class="logoMenu" src="../assets/icons/dashbord.png" alt=""></a>
    </header>

    <div class="brancoAlertas">
        <div class="setas">
            <?php
            while ($row = $result->fetch_assoc()){
            echo "
            <a href='Cargas.php?id={$row['id']}&trem=1'><img class='setaDashboard' src='../assets/icons/seta.png' alt='Botão de voltar'></a>
            ";}
            ?>
        </div>
        <H2><U>Alertas</U></H2>

        <div class="cinza">
        <?php
        $sql = "SELECT * FROM alerta";
        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            
            echo "<table>
                        <thead>
                                <tr>
                                    <strong><p></p></strong>
                                <tr>
                        <thead>
                <tbody>";
        while ($row = $result->fetch_assoc()){
            echo "<tr>
                    <p>{$row['mensagem']}</p>
                    <tr>";
        }
        echo"<t/body></table>";
        }else{
            echo "<p>Nenhum alerta no momento.</p>";
        }

        
        ?>
    </div>


    </div>
</body>

</html>