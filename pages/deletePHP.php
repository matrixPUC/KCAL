<?php
	//Conexão com o banco
	include_once('../database/connection.php');

  $ID = $_SESSION['ID'];

  try {
    $sql = "DELETE FROM nutricionista WHERE ID_usuario = '$ID'";
    $result = $mysqli->query($sql);

    $sql = "DELETE FROM calculadora WHERE ID_usuario = '$ID'";
    $result = $mysqli->query($sql);

    $sql = "DELETE FROM publicacao WHERE ID_usuario = '$ID'";
    $result = $mysqli->query($sql);

    $sql = "DELETE FROM usuario_publicacao WHERE ID_usuario = '$ID'";
    $result = $mysqli->query($sql);

    $sql = "DELETE FROM receita WHERE ID_usuario = '$ID'";
    $result = $mysqli->query($sql);

    $sql = "DELETE FROM usuario_receita WHERE ID_usuario = '$ID'";
    $result = $mysqli->query($sql);
  } catch (Exception $e){};


  $sql = "DELETE FROM usuario WHERE ID = '$ID'";

  $result = $mysqli->query($sql);

  header('location: ./signup.php');

?>