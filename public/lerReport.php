<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: login.php");
    exit;

endif;
?>

<?php

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
        <img class="logoMenu" src="..//assets/icons/relatorio.png" alt="Relatórios">
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
            <h3 class='text'>{$row['mensagem']}</h3>
        </div>
        </div>";
        }
                    
        $stmt->close();
        
        ?>
    </div>

    <br><br>
    <?PHP
    ECHO"
    <a  href='manuteção2.php?id=$id'>";

    ?>
<div class="branco"> <div class="voltar"><strong > Voltar</strong></div>
</div>
</a>