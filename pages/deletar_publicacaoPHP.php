<?php

include_once('../database/connection.php');

if (isset($_GET['publicacao'])) {
			$ID_publicacao = $_GET['publicacao'];
  
      $sqlDeleteUsuarioPublicacao = "DELETE FROM usuario_publicacao WHERE ID_publicacao = '$ID_publicacao'";
      $mysqli->query($sqlDeleteUsuarioPublicacao);

      $sqlDeletepublicacao = "DELETE FROM publicacao WHERE ID = '$ID_publicacao'";
      $mysqli->query($sqlDeletepublicacao);

      header('location: ./home.php');
}

?>