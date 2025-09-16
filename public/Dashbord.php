<?php
include '../config/db.php';

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

    <div class="branco">
        <div class="cinza">
        <?php
        $sql = "SELECT * FROM trens";
        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            
            echo "<table>
                        <thead>
                                <tr>
                                    <strong><p>velocidade</p></strong>
                                <tr>
                        <thead>
                <tbody>";
        while ($row = $result->fetch_assoc()){
            echo "<tr>
                    <p>{$row['velocidade']}</p>
                    <tr>";
        }
        echo"<t/body></table>";
        }else{
            echo "<p>Nenhum trem em movimento.</p>";
        }

        
        ?>
    </div>

    <br>

    <div class="cinza">
        <?php
        $sql = "SELECT * FROM trens";
        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            
            echo "<table>
                        <thead>
                                <tr>
                                    <strong><p>horarios</p></strong>
                                <tr>
                        <thead>
                <tbody>";
        while ($row = $result->fetch_assoc()){
            echo "<tr>
                    <p>{$row['horarios']}</p>
                    <tr>";
        }
        echo"<t/body></table>";
        }

        
        ?>
    </div>

    <br>

    <div class="cinza">
        <?php
        $sql = "SELECT * FROM trens";
        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            
            echo "<table>
                        <thead>
                                <tr>
                                    <strong><p>direcao</p>
                                    <p>localizacao</p></strong>
                                <tr>
                        <thead>
                <tbody>";
        while ($row = $result->fetch_assoc()){
            echo "<tr>
                    <p>{$row['direcao']}</p>
                    <p>{$row['localizacao']}</p>
                    <tr>";
        }
        echo"<t/body></table>";
        }

        
        ?>
    </div>

    </div>

</body>

</html>