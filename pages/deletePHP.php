<?php
	//Conexão com o banco
	include('../database/connection.php');

  $ID = $_SESSION['ID'];

  $sql = "DELETE FROM usuario WHERE ID = '$ID'";

  $result = $mysqli->query($sql);

  header('location: ./signup.php');

?>