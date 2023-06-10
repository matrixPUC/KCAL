<?php
	//Conexão com o banco
	include('../database/connection.php');
    
	$texto = $mysqli->real_escape_string($_POST['texto']); // prepara a string recebida para ser utilizada em comando SQL

    $ID_usuario = $_SESSION['ID'];

    $sql = "INSERT INTO publicacao(ID_usuario, texto) 
            VALUES ('$ID_usuario', '$texto')";

    $mysqli->query($sql);

    header('location: ./home.php');

?>  