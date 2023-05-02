<?php
	//Conexão com o banco
	include('../database/connection.php');
    
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
  
  header('location: ./calcular.php?total=' . $total . '');

?>