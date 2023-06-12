<?php
include_once('../database/connection.php');
include_once '../includes/header.inc.php';



$ID_publicacao = $_GET['publicacao'];

if (!$_SESSION['logado']) {
    echo 'Você precisa estar logado para entrar nessa página';
    return;
}

$sqlPublicacao = "SELECT * FROM publicacao WHERE ID = '$ID_publicacao'";
$resultPublicacao = $mysqli->query($sqlPublicacao);
$publicacaoRow = $resultPublicacao->fetch_assoc();

echo '
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/editarpubli.css">
    <script src="../scripts/calcular.js" defer></script>
    <title>Editar Publicação</title>
</head>
<body>
    <div class="flex-column recipe-div">
        <form id="formPublicacao" name="formPublicacao" method="POST" action="./editar_publicacaoPHP.php?publicacao=' . $ID_publicacao . '">
            <input type="text" name="texto" required placeholder="Texto" value="' . $publicacaoRow['texto'] . '" />
            <br><br><br>
            <button>Editar</button>
        </form>
        <?php
        include("../database/connection.php");
        
        ?>
    </div>
</body>
</html>
';
?>