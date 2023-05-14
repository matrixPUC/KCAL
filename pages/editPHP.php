<?php
	//Conexão com o banco
	include('../database/connection.php');
  
  $peso = $mysqli->real_escape_string($_POST['peso']); // prepara a string recebida para ser utilizada em comando SQL
  $ID = $_SESSION['ID'];

  $sql = "UPDATE usuario SET peso = '$peso' WHERE ID = '$ID'";

  $result = $mysqli->query($sql);
  
  header('location: ./perfil.php');

?>