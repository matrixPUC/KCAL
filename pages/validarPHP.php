<?php
    //Conexão com o banco
    include('../database/connection.php');

    $crn = $mysqli->real_escape_string($_POST['crn']); // prepara a string recebida para ser utilizada em comando SQL

    $sql = "UPDATE usuario INNER JOIN nutricionista ON ID = ID_usuario SET validado = 1 WHERE crn = '$crn'";

    $result = $mysqli->query($sql);

    header('location: ./validar.php');

?>