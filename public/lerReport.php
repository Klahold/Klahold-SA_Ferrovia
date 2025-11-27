<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: login.php");
    exit;

endif;
?>

<?php


$id_trem = $_GET['id_Trem'];
$id = $_GET['id'];

$stmt = $conn->prepare('SELECT * FROM manutencao WHERE id=?');
$stmt->bind_param('i', $id);
$stmt->execute();

$result = $stmt->get_result();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="icon" href="../assets/icons/logo.png" type="image/png">
    <title>lerReport</title>
</head>
<body>  
    <header class="header">
        <h1>Relatórios</h1>
        <a href="login.php"><img class="logoMenu" src="..//assets/icons/relatorio.png" alt="Relatórios"></a>
    </header>

    <div class="branco">
        
        <?php 

        while ($row = $result->fetch_assoc()) {

        echo "
        <div class='cinza'> 
            <h3 class='text'>{$row['tipo']}</h3>
        </div>
        
        <br>

        <div class='cinza'>
        <div class='arrastar2'>
            <h3 class='text'>{$row['descricao']}</h3>
        </div>
        </div>";
        }
                    
        $stmt->close();
        
        ?>
    </div>

    <br><br>
    <?PHP
    echo"
    <a  href='manutenção2.php?id={$id_trem}&trem=1'>";

    ?>
<div class="branco"> <div class="voltar"><strong > Voltar</strong></div>
</div>
</a>