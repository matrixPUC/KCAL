<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <html lang="pt-br">
	<link rel="stylesheet" href="../style/login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Login </title>
	<link rel="icon" href="./assets/nutricionista.png" type="image/jpg">
</head>
<body>
	<div class="container" id="container">
		<div class="form-container log-in-container">
			<form id="formLogin" name="formLogin" method="POST" action="./loginPHP.php">
        <h1>KCAL</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fa fa-facebook fa-2x"></i></a>
					<a href="#" class="social"><i class="fab fa fa-twitter fa-2x"></i></a>
          <a href="#" class="social"><i class="fab fa fa-instagram fa-2x"></i></a>
				</div>
				<span>ou use sua conta</span>
				<input type="email" id="txtEmail" name="txtEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required name = "Email" title="Deve conter um @" placeholder="Email" />
				<input type="password" id="txtSenha" name="txtSenha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&!*]).{6,10}"  required name="Senha" title="A senha deve ter de 6 a 10 caracteres e conter pelo menos um número, uma letra minúscula, uma letra maiúscula e um caractere especial" placeholder="Senha"/>
				<a href="#">Esqueceu sua senha?</a>
				<button>Entrar</button>

				<?php
					//Conexão com o banco
					include('../database/connection.php');
				
					if(isset($_GET['error'])){
						$error = $_GET['error'];
						switch($error){
							case 1:?>
								<p>Email Nao Cadastrado</p>
								<?php
								break;
							case 2:?>
								<p>Email ou Senha Incorretos</p>
								<?php
								break;
							case 3:?>
								<p>Conta ainda não validada</p>
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
		
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<p>Insira o seu Login e aproveite a rede social de nutrição!!</p>
          <img src="../assets/login.svg">
				</div>
			</div>
		</div>
	</div>
</body>
</html>