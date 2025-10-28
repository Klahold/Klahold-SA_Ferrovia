<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: login.php");
    exit;

endif;
?>
<?php

$stmt = $conn->prepare("SELECT relatorios.id,titulo,mensagem,criado_em,nome FROM relatorios
INNER JOIN usuarios
ON relatorios.remetente=usuarios.id;");

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
        <div class="cinza">🔍 Buscar Relatório</div>
            <div class="flex">
                <input class="checkboxRelatorio" type="checkbox">
                <select class="little" name="selecao" id="relatory">
                    <option value="1">Nenhum</option>
                    <option value="2">Não lidos</option>
                    <option value="3">Lidos</option>
                    <option value="4">Todos</option>
                </select>


                <div class="container">
                    <div class="groupMenu" onclick="fun()">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>



                    <div class="frame1" id="frame1">
                        <div class="info"><span>Marcar com lida</span></div>
                        <div class="info"><span>Marcar como importante</span></div>
                        <div class="info"><span>Marcar com estrela</span></div>
                        <div class="info"><span>Filtrar mensagens assim</span></div>
                        <div class="info"><span>Ignorar</span></div>
                        <div class="info"><span>Encaminhar como anexo</span></div>
                    </div>

                </div>

                <div class="criar">
                
                <a href="createRelatorios.php"><div class="cinzacriar"></div></a>

                </div>
                

            </div>

            <div>
                <div class="arrastar2">

                <?php 

                    while ($row = $result->fetch_assoc()) {

                        $data_cricacao = date('d/m/Y', strtotime($row['criado_em']));

                    echo "
                        <a href='lerRelatorio.php?id={$row['id']}'>'
                        <div class='caixa'>
                        <input class='checkboxRelatorio' type='checkbox'>
                        <h3 class='text'>{$row['titulo']}</h3> 
                        <h3 class='text'>{$row['nome']}</h3>
                        <h3 class='text'>{$data_cricacao}</h3>
                        </div>
                        </a>
                    ";
                    }
                    
                    $stmt->close();

                ?>

                </div>
            </div>
            

            
            
    </div>
    
</body>

</html>