<?php
    // Conexão com o banco
    include_once('../database/connection.php');
    
    // ID do usuário logado
    $userID = $_SESSION['ID'];

    // Consulta SQL para obter as entradas da calculadora do usuário logado em ordem decrescente de data
    $sql = "SELECT * FROM calculadora WHERE ID_usuario = '$userID' ORDER BY data DESC";
    $result = $mysqli->query($sql);

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