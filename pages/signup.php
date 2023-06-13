

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/signup.css">
    <script src="../scripts/signup.js"></script>
    <title>Cadastro</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="../assets/sign up.svg" alt="">
        </div>
        <div class="form">
            <form id="formSignup" name="formSignup" method="POST" action="./signupPHP.php">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="./login.php">Entrar</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Nome Completo </label>
                        <input id="nome" type="text" name="nome" placeholder="Digite seu nome completo" required>
                    </div>
                    

                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Deve conter um @" required>
                    </div>

                    <div class="input-box">
                        <label for="nasc">Data de Nascimento</label>
                        <input id="nascimento" type="date" name="nascimento" placeholder="Digite sua data de nascimento" required >
                    </div>

                    <div class="input-box">
                        <label for="phone">Celular</label>
                        <input id="celular" type="phone" name="celular" placeholder="41XXXXXXXXX" required pattern="^-?[0-9]+$" title="Insira um celular válido">
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
                        <input id="peso" type="text" name="peso" placeholder="kg" required pattern="^(?:(?:(?:[0-4]?\d{1,2})|500)(?:[.,]\d{1,2})?|\d{1,3})$" title="Insira um peso válido com até no maximo duas casas decimais">
                    </div>

                    <div class="input-box">
                        <label for="altura">Altura</label>
                        <input id="altura" type="text" name="altura" placeholder="cm" required pattern="^(?:(?:(?:[0-4]?\d{1,2})|500)(?:[.,]\d{1,2})?|\d{1,3})$" title="Insira uma altura em centímetros válida">
                    </div>

                </div>

                <div class="usuario-inputs">
                    <div class="usuario-title">
                        <h6>Usuário</h6>
                    </div>

                    <div class="usuario-group">
                    <div class="usuario-inputs">
    <div class="usuario-title">
        <h6>Usuário</h6>
    </div>

    <div class="usuario-group">
        <div class="usuario-input">
            <input id="nutricionista" type="radio" name="usuario" value="2" onclick="mostrarCampo()">
            <label for="nutricionista">Nutricionista</label>
        </div>

        <div id="campo-crn" class="campo" style="display:none;">
            <input type="text" id="input-crn" name="crn" placeholder="UF12345" pattern="^[A-Z]{2}[0-9]{5}$" title="Insira um CRN válido">
            <label for="input-crn"></label>
            
            <input type="text" id="input-instagram" name="instagram" placeholder="Digite seu username do Instagram">
            <label for="input-instagram"></label>
        </div>


                        <div class="usuario-input">
                            <input id="male" type="radio" name="usuario" value="1" onclick="ocultarCampo()" checked>
                            <label for="male">KCaller</label>
                        </div>

                       
                    </div>
                </div>

                <div class="continue-button">
                    <button>Cadastrar</button>
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
                            case 4:?>
                                <p>Essa data de nascimento é inválida</p>
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