<?php
	//Conexão com o banco
	include_once('../database/connection.php');
    
	$ingredients = $mysqli->real_escape_string($_POST['ingredientsInput']); // prepara a string recebida para ser utilizada em comando SQL

  $parts = explode(',', $ingredients);
  $result = array();
  
  for ($i = 0; $i < count($parts); $i += 2) {
    $result[] = array($parts[$i], (int)$parts[$i+1]);
  }
  
  $total = 0;

  foreach($result as $ingredient) {
    $name = $ingredient[0];
    $quantity = $ingredient[1];

    $sql = "SELECT * FROM ingrediente WHERE nome = '$name'";
    $sqlResult = $mysqli->query($sql);
    $row = $sqlResult->fetch_assoc();

    $calories = $row['calorias'] * $quantity / $row['quantidadePadrao'];
    $total += $calories;
  }

  $userID = $_SESSION['ID'];

  $currentDateTime = date('Y-m-d H:i:s');

  $insertSql = "INSERT INTO calculadora (ID_usuario, calorias, data) VALUES ('$userID', '$total', '$currentDateTime')";
  $mysqli->query($insertSql);
  
  header('location: ./calcular.php?total=' . $total . '');

?>