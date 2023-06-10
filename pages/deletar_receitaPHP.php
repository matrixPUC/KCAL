<?php

include_once('../database/connection.php');

if (isset($_GET['receita'])) {
			$ID_receita = $_GET['receita'];
      
      $sqlDeleteIngrediente = "DELETE FROM receita_ingrediente WHERE ID_receita = '$ID_receita'";
      $mysqli->query($sqlDeleteIngrediente);
  
      $sqlDeleteReceita = "DELETE FROM receita WHERE ID = '$ID_receita'";
      $mysqli->query($sqlDeleteReceita);

      header('location: ./home.php');
}

?>