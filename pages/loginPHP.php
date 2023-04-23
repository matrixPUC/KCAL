<?php
	//Conexão com o banco
	include('../database/connection.php');
    
	$email = $mysqli->real_escape_string($_POST['txtEmail']); // prepara a string recebida para ser utilizada em comando SQL
    $senha = $mysqli->real_escape_string($_POST['txtSenha']); // prepara a string recebida para ser utilizada em comando SQL


    // Faz Select na Base de Dados
    $sql = "SELECT * FROM usuario WHERE email = '$email'";

    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows == 1) {               
            $row = $result->fetch_assoc();
            $senhaBD = $row['senha'];
            if($senha == $senhaBD){
                $_SESSION['ID']           = $row['ID'];
                $_SESSION['administrador'] = $row['administrador'];
                $_SESSION['logado']       = 1;
                
                if($_SESSION['administrador'] == 1){           
                    $mysqli->close();  //Encerra conexao com o BD
                    header('location: ./home_admin.php');  // Perfil Administrador
                    exit();
                }else{  
                    $mysqli->close();  //Encerra conexao com o BD                               
                    header('location: ./home.php');  // Perfil Kcaller
                    exit();
                }
            }else{
                $_SESSION['logado']  = 0;
                $mysqli->close();  //Encerra conexao com o BD
                header('location: ./login.php?error=2');  //Senha incorreta               
                exit(); 
            }
            
        }else{            
            $_SESSION['logado']  = 0;
            $mysqli->close();  //Encerra conexao com o BD
            header('location: ./login.php?error=1');  //Nao existe cadastro com este email na base                
            exit();
        }
    }

?>