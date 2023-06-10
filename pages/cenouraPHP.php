<?php
include_once('../database/connection.php');

if (isset($_GET['receita'])) {
  $ID_receita = $_GET['receita'];
  $ID_usuario = $_SESSION['ID'];

  $sqlCheckRow = "SELECT * FROM usuario_receita WHERE ID_usuario = '$ID_usuario' AND ID_receita = '$ID_receita'";
  $result = $mysqli->query($sqlCheckRow);

  if ($result->num_rows > 0) {
    $sqlUpdateCenoura = "UPDATE usuario_receita SET cenoura = TRUE WHERE ID_usuario = '$ID_usuario' AND ID_receita = '$ID_receita'";
    $mysqli->query($sqlUpdateCenoura);
  } else {
    $sqlInsertRow = "INSERT INTO usuario_receita (ID_usuario, ID_receita, cenoura) VALUES ('$ID_usuario', '$ID_receita', TRUE)";
    $mysqli->query($sqlInsertRow);
  }

  header('location: ./home.php');
}

if (isset($_GET['publicacao'])) {
  $ID_publicacao = $_GET['publicacao'];
  $ID_usuario = $_SESSION['ID'];

  $sqlCheckRow = "SELECT * FROM usuario_publicacao WHERE ID_usuario = '$ID_usuario' AND ID_publicacao = '$ID_publicacao'";
  $result = $mysqli->query($sqlCheckRow);

  if ($result->num_rows > 0) {
    $sqlUpdateCenoura = "UPDATE usuario_publicacao SET cenoura = TRUE WHERE ID_usuario = '$ID_usuario' AND ID_publicacao = '$ID_publicacao'";
    $mysqli->query($sqlUpdateCenoura);
  } else {
    $sqlInsertRow = "INSERT INTO usuario_publicacao (ID_usuario, ID_publicacao, cenoura) VALUES ('$ID_usuario', '$ID_publicacao', TRUE)";
    $mysqli->query($sqlInsertRow);
  }

  header('location: ./home.php');
}
?>