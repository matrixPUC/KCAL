<?php
	//Conexão com o banco
	include('../database/connection.php');
    
  $nome = $mysqli->real_escape_string($_POST['nome']); // prepara a string recebida para ser utilizada em comando SQL
	$email = $mysqli->real_escape_string($_POST['email']); // prepara a string recebida para ser utilizada em comando SQL
  $senha = $mysqli->real_escape_string($_POST['senha']); // prepara a string recebida para ser utilizada em comando SQL
  $confirmarSenha = $mysqli->real_escape_string($_POST['confirmar-senha']); // prepara a string recebida para ser utilizada em comando SQL
  $nascimento = $mysqli->real_escape_string($_POST['nascimento']); // prepara a string recebida para ser utilizada em comando SQL
  $peso = $mysqli->real_escape_string($_POST['peso']); // prepara a string recebida para ser utilizada em comando SQL
  $altura = $mysqli->real_escape_string($_POST['altura']); // prepara a string recebida para ser utilizada em comando SQL
  $usuario = $mysqli->real_escape_string($_POST['usuario']); // prepara a string recebida para ser utilizada em comando SQL
  $celular = $mysqli->real_escape_string($_POST['celular']); // prepara a string recebida para ser utilizada em comando SQL
  $crn = $mysqli->real_escape_string($_POST['crn']); // prepara a string recebida para ser utilizada em comando SQL

  $anoNascimento = intval(substr($nascimento, 0, 4));

  if ($anoNascimento > 2023) {
      header('location: ./signup.php?error=4');
      return;
  }

  if ($senha !== $confirmarSenha) {
    header('location: ./signup.php?error=3');
    return;
  }

  $sql = "SELECT * FROM usuario WHERE email = '$email'";

  $result = $mysqli->query($sql);
  if ($result->num_rows > 0) {
    header('location: ./signup.php?error=2');
    return;
  }

  if ($usuario == 1) {
    $sql = "INSERT INTO usuario(nome, dataNasc, peso, altura, email, senha, celular, tipo_usuario, validado) VALUES('$nome', '$nascimento', '$peso', '$altura', '$email', '$senha', '$celular', 1, 1)";

    if ($mysqli->query($sql) === TRUE) {
      header('location: ./login.php');
      return;
    } else {
      header('location: ./signup.php?error=1');
      return;
    }

  } else if ($usuario == 2) {
    $sql = "INSERT INTO usuario(nome, dataNasc, peso, altura, email, senha, celular, tipo_usuario, validado) VALUES('$nome', '$nascimento', '$peso', '$altura', '$email', '$senha', '$celular', 2, 0)";

    if ($mysqli->query($sql) === TRUE) {
      $sql = "SELECT * FROM usuario WHERE email = '$email'";

        if ($result = $mysqli->query($sql)) {
          if ($result->num_rows == 1) {  
            $row = $result->fetch_assoc();
            $IDusuario = $row['ID'];
            
            $sql = "INSERT INTO nutricionista(ID_usuario, crn) VALUES ('$IDusuario', '$crn')";
            if ($mysqli->query($sql) === TRUE) {
              header('location: ./login.php');
              return;
            } else {
              header('location: ./signup.php?error=1');
              return;
            }
          }
        } 

    } else {
      header('location: ./signup.php?error=1');
      return;
    }
  }


?>