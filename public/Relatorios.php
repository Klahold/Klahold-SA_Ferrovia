<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: login.php");
    exit;

endif;

$pesquisar = isset($_POST['pesquisar']) ? trim($_POST['pesquisar']) : '';

if ($pesquisar === '') {
    $sql = "SELECT relatorios.id,titulo,mensagem,criado_em,nome FROM relatorios
            INNER JOIN usuarios
            ON relatorios.remetente=usuarios.id
            ORDER BY criado_em DESC";
    $stmt = $conn->prepare($sql);
} else {
    $sql = "SELECT relatorios.id,titulo,mensagem,criado_em,nome FROM relatorios
            INNER JOIN usuarios
            ON relatorios.remetente=usuarios.id
            WHERE titulo LIKE ?
            ORDER BY criado_em DESC";
    $stmt = $conn->prepare($sql);
    $like = "%{$pesquisar}%";
    $stmt->bind_param("s", $like);
}

$stmt->execute();

$result = $stmt->get_result();

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>

    <script src="../scripts/script.js"></script>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="icon" href="../assets/icons/logo.png" type="image/png">
</head>

<body>
    <header class="header">
        <h1>Relatórios</h1>
        <img class="logoMenu" src="..//assets/icons/relatorio.png" alt="Relatórios">
    </header>



    <div class="branco">
        <div>
            <form action="Relatorios.php" method="post">
                <input type="text" name="pesquisar" class="buscarRelatorio" placeholder=" Buscar Relatórios" value="<?php echo htmlspecialchars($pesquisar); ?>">
            </form>

        </div>
            <div class="flex">
                <div class="criar">
                
                <a href="createRelatorios.php"><div class="cinzacriar"><p class="textoRelatorio">+</p></div></a></div>
                

            </div>

            <div>
                <div class="arrastar2">

                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $data_criacao = date('d/m/Y', strtotime($row['criado_em']));

                        echo "
                            <a href='lerRelatorio.php?id={$row['id']}'>
                            <div class='caixa'>
                            <input class='checkboxRelatorio' type='checkbox'>
                            <h3 class='text'>{$row['titulo']}</h3> 
                            <h3 class='text'>{$row['nome']}</h3>
                            <h3 class='text'>{$data_criacao}</h3>
                            </div>
                            </a>
                        ";
                    }
                } else {
                    echo "<p class='text'>Nenhum resultado encontrado.</p>";
                }
                ?>

                



                

                </div>
            </div>
            

            
            
    </div>
    
</body>

</html>