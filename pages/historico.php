<?php
    // Conexão com o banco
    include_once('../database/connection.php');
    
    // ID do usuário logado
    $userID = $_SESSION['ID'];

    // Consulta SQL para obter as entradas da calculadora do usuário logado em ordem decrescente de data
    $sql = "SELECT * FROM calculadora WHERE ID_usuario = '$userID' ORDER BY data DESC";
    $result = $mysqli->query($sql);
?>
<?php include_once '../includes/header.inc.php'; ?>
<head>
    <link rel="stylesheet" href="#">
    <title>Histórico Calculadora</title>
</head>
<?php 
    include_once '../includes/menu.inc.php';
    if ($_SESSION['adm'] == true) {
        echo '<li>
                <span class="material-icons">
                    group_work
                </span>
                <strong><a href="./validar.php">Validar nutricionistas</a></strong>
            </li>';
    }
?>
</ul>
</aside>
<?php 

if ($result->num_rows > 0) {
    // Exibir as entradas da calculadora
    while ($row = $result->fetch_assoc()) {
        $entryID = $row['ID'];
        $calories = $row['calorias'];
        $entryDate = $row['data'];

        echo "Calorias: $calories<br>";
        echo "Data e horário: $entryDate<br><br>";
    }
} else {
    echo "Nenhum histórico encontrado.";
}
?>
