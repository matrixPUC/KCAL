<?php
    include('../database/connection.php');
    $nome_sessao = $_SESSION['nome'];
    $email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/header.css">
    <script src="../scripts/popup.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<header id="main-header">
    <div class="content">
        <div class="logo">
            <img src="../assets/kcal logo.png" alt="">
        </div>
        <nav class="menu-icons">
            <div class="home"><span class="material-icons"><a href="./home.php">home</a></span></div>
        </nav>
        <div class="user">
            <div><span><a href="./dados_usuario.php"><?php echo $nome_sessao ?></a></span></div>
        </div>
    </div>
</header>