<?php
    //Conexão com o banco
    $usuario = 'root';
    $senha = '';
    $database = 'kcal_db';
    $host = 'localhost:3306';

    $mysqli = new mysqli($host, $usuario, $senha, $database);

    if($mysqli->error){
        die("Falha ao conectar ao banco de dados: ") . $mysqli->error;
    }

    //Ocultar erro PHP
    error_reporting(0);

    //Inicia sessão
    session_start();
?>