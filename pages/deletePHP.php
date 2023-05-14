<?php
	//Conexão com o banco
	include('../database/connection.php');

  $ID = $_SESSION['ID'];

  try {
    $sql = "DELETE FROM nutricionista WHERE ID_usuario = '$ID'";
  
    $result = $mysqli->query($sql);
  } catch (Exception $e){};

  $sql = "DELETE FROM usuario WHERE ID = '$ID'";

  $result = $mysqli->query($sql);

  header('location: ./signup.php');

?>