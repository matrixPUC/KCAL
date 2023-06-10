<?php
// Conexão com o banco
include_once('../database/connection.php');

$IDusuario = $_SESSION['ID'];
$ID_receita = $_GET['receita'];

$nome = $mysqli->real_escape_string($_POST['nome']); // Prepara a string recebida para ser utilizada em comando SQL
$descricao = $mysqli->real_escape_string($_POST['descricao']); // Prepara a string recebida para ser utilizada em comando SQL
$passo = $mysqli->real_escape_string($_POST['passo']); // Prepara a string recebida para ser utilizada em comando SQL
$publico = isset($_POST['publico']) ? 1 : 0; // Verifica se o checkbox foi marcado

$sql = "UPDATE receita SET nome = '$nome', descricao = '$descricao', passo_a_passo = '$passo', public = $publico WHERE ID = '$ID_receita' AND ID_usuario = '$IDusuario'";
$result = $mysqli->query($sql);

header('location: ./home.php');
?>