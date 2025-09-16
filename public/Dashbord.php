<?php
    include '../config/db.php'
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
                                    <th>velocidade</th>
                                    <th>horarios</th>
                                    <th>direcao</th>
                                    <th>localizacao</th>
                                <tr>
                        <thead>
                <tbody>";
        while ($row = $result->fetch_assoc()){
            echo "<tr>
                    <td>{$row['velocidade']}</td>
                    <td>{$row['horarios']}</td>
                    <td>{$row['direcao']}</td>
                    <td>{$row['localizacao']}</td>
                    <tr>";
        }
        echo"<t/body></table>";
        }else{
            echo "<p>Nenhum trem em movimento.</p>";
        }

        
        ?>
    </div>
    </div>

</body>

</html>