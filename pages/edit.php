<?php 

  include('../database/connection.php');  

  $IDusuario = $_SESSION['ID'];

  $sql = "SELECT * FROM usuario WHERE ID = '$IDusuario'";
  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();

?>;


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/signup.css">
    <script src="../scripts/signup.js"></script>
    <title>Editar</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="../assets/sign up.svg" alt="">
        </div>
        <div class="form">
            <form id="formEdit" name="formEdit" method="POST" action="./editPHP.php">
                <div class="form-header">
                    <div class="title">
                        <h1>Edite seus dados</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Nome Completo </label>
                        <input id="nome" type="text" name="nome" placeholder="Digite seu nome completo" required value="<?php echo $row['nome'] ?>">
                    </div>

                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" value="<?php echo $row['email'] ?>" placeholder="Digite seu e-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Deve conter um @" required>
                    </div>

                    <div class="input-box">
                        <label for="phone">Celular</label>
                        <input id="celular" type="phone" name="celular" value="<?php echo $row['celular'] ?>" placeholder="Digite seu celular" required pattern="^-?[0-9]+$" title="Insira um celular válido">
                    </div>

                    
                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&!*]).{6,10}" title="A senha deve ter de 6 a 10 caracteres e conter pelo menos um número, uma letra minúscula, uma letra maiúscula e um caractere especial">
                    </div>
                    
                    <div class="input-box">
                        <label for="senha">Confirmar senha</label>
                        <input id="confirmar-senha" type="password" name="confirmar-senha" placeholder="Confirme sua senha" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&!*]).{6,10}" title="A senha deve ter de 6 a 10 caracteres e conter pelo menos um número, uma letra minúscula, uma letra maiúscula e um caractere especial">
                    </div>
                    
                  
                    <div class="input-box">
                        <label for="peso">Peso</label>
                        <input id="peso" type="text" name="peso" value="<?php echo $row['peso'] ?>" placeholder="kg" required pattern="^(?:(?:(?:[0-4]?\d{1,2})|500)(?:[.,]\d{1,2})?|\d{1,3})$" title="Insira um peso válido com até no maximo duas casas decimais">
                    </div>

                    <div class="input-box">
                        <label for="altura">Altura</label>
                        <input id="altura" type="text" name="altura" value="<?php echo $row['altura'] ?>" placeholder="cm" required pattern="^(?:(?:(?:[0-4]?\d{1,2})|500)(?:[.,]\d{1,2})?|\d{1,3})$" title="Insira uma altura em centímetros válida">
                    </div>
                </div>

                <div class="continue-button">
                    <button>Editar</button>
                </div>
                <?php
					//Conexão com o banco
					include('../database/connection.php');
				
					if(isset($_GET['error'])){
						$error = $_GET['error'];
						switch($error){
							case 1:?>
								<p>Ocorreu um erro com o sistema</p>
								<?php
								break;
                            case 2:?>
                                <p>Este email já possui uma conta</p>
                                <?php
                                break;
                            case 3:?>
                                <p>As senhas estão diferentes</p>
                                <?php
                                break;
						}
						
					}else{?>
						<p></p>
					<?php
					}
				?>
            </form>
        </div>
    </div>
</body>

</html>