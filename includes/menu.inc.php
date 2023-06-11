<?php
    include('../database/connection.php');
    $nome_sessao = $_SESSION['nome'];
    $email = $_SESSION['email'];
?>
<head>
    <link rel="stylesheet" href="../style/menu.css">
</head>
<aside class="nav-icons">
    <ul>
        <li>
            <span class="material-symbols-outlined">person</span>
            <strong><a href="./dados_usuario.php"><?php echo $nome_sessao ?></a></strong>
        </li>
        <li>
            <span class="material-icons">assistant_photo</span>
            <strong><a href="./receita.php">Criar Receita</a></strong>
        </li>
        <li>
            <span class="material-icons">assistant_photo</span>
            <strong><a href="./publicacao.php">Criar Publicação</a></strong>
        </li>
        <li>
            <span class="material-icons">group_work</span>
            <strong><a href="./calcular.php">Calcular</a></strong>
        </li>
        <li>
            <span class="material-icons">assistant_photo</span>
            <strong><a href="./historico.php">Histórico da Calculadora</a></strong>
        </li>
    