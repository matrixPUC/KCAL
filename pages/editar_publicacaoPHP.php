<?php
// Conexão com o banco
include_once('../database/connection.php');

$IDusuario = $_SESSION['ID'];
$ID_publicacao = $_GET['publicacao'];

$texto = $mysqli->real_escape_string($_POST['texto']); // Prepara a string recebida para ser utilizada em comando SQL

$sql = "UPDATE publicacao SET texto = '$texto'";
$result = $mysqli->query($sql);

header('location: ./home.php');
?>