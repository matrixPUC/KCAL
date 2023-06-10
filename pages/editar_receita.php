<?php
include_once('../database/connection.php');

$ID_receita = $_GET['receita'];

if (!$_SESSION['logado']) {
    echo 'Você precisa estar logado para entrar nessa página';
    return;
}

$sqlReceita = "SELECT * FROM receita WHERE ID = '$ID_receita'";
$resultReceita = $mysqli->query($sqlReceita);
$receitaRow = $resultReceita->fetch_assoc();

echo '<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/signup.css">
    <script src="../scripts/calcular.js" defer></script>
    <title>Editar Receita</title>
</head>
<body>
    <div class="flex-column recipe-div">
        <form id="formReceita" name="formReceita" method="POST" action="./editar_receitaPHP.php?receita=' . $ID_receita . '">
            <input type="text" name="nome" required placeholder="Nome" value="' . $receitaRow['nome'] . '" />
            <input type="text" name="descricao" required placeholder="Descrição" value="' . $receitaRow['descricao'] . '" />
            <input type="text" name="passo" required placeholder="Passo a passo" value="' . $receitaRow['passo_a_passo'] . '" />
            <input type="text" class="hidden" name="ingredientsInput">
            <input type="checkbox" name="publico" value="1"' . ($receitaRow['public'] ? ' checked' : '') . '>
            <label for="publico">Público</label>
          
            <br><br><br>
            <button>Editar</button>
        </form>
        <?php
        include("../database/connection.php");
        ?>
    </div>

    <script src="../scripts/edit_receita.js" defer></script>
</body>
</html>';
?>