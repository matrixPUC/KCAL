<?php
	//Conexão com o banco
	include_once('../database/connection.php');

  $IDusuario = $_SESSION['ID'];

  $nome = $mysqli->real_escape_string($_POST['nome']); // prepara a string recebida para ser utilizada em comando SQL
	$email = $mysqli->real_escape_string($_POST['email']); // prepara a string recebida para ser utilizada em comando SQL
  $senha = $mysqli->real_escape_string($_POST['senha']); // prepara a string recebida para ser utilizada em comando SQL
  $confirmarSenha = $mysqli->real_escape_string($_POST['confirmar-senha']); // prepara a string recebida para ser utilizada em comando SQL
  $peso = $mysqli->real_escape_string($_POST['peso']); // prepara a string recebida para ser utilizada em comando SQL
  $altura = $mysqli->real_escape_string($_POST['altura']); // prepara a string recebida para ser utilizada em comando SQL
  $celular = $mysqli->real_escape_string($_POST['celular']); // prepara a string recebida para ser utilizada em comando SQL

  if ($senha !== $confirmarSenha) {
    header('location: ./edit.php?error=3');
    return;
  }

  $sql = "UPDATE usuario SET nome = '$nome' WHERE ID = '$IDusuario'";
  $result = $mysqli->query($sql);

  $sql = "UPDATE usuario SET email = '$email' WHERE ID = '$IDusuario'";
  $result = $mysqli->query($sql);

  $sql = "UPDATE usuario SET senha = '$senha' WHERE ID = '$IDusuario'";
  $result = $mysqli->query($sql);

  $sql = "UPDATE usuario SET peso = '$peso' WHERE ID = '$IDusuario'";
  $result = $mysqli->query($sql);

  $sql = "UPDATE usuario SET altura = '$altura' WHERE ID = '$IDusuario'";
  $result = $mysqli->query($sql);

  $sql = "UPDATE usuario SET celular = '$celular' WHERE ID = '$IDusuario'";
  $result = $mysqli->query($sql);

  header('location: ./perfil.php');

?>