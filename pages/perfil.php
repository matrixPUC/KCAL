<?php
    //Conexão com o banco
    include_once('../database/connection.php');
    include_once '../includes/header.inc.php';
    //ID do usuário
    $nome_sessao = $_SESSION['nome'];
    $email = $_SESSION['email'];

	if (!$_SESSION['logado']) {
		echo 'Você precisa estar logado para entrar nessa página';
		return;
	  }
?>
    <div class="wrapper-content content">
	<head>
		<link rel="stylesheet" href="../style/perfil.css">
		<title><?php echo $nome_sessao ?> | KCAL</title>
			<?php include_once '../includes/menu.inc.php'; ?>
			<li>
				<span class="material-icons">123</span>
				<strong><a href="./edit.php">Editar conta</a></strong>
			</li>
			<li><?php include_once '../includes/delete.inc.php';?></li>
			</ul>
			<li>
				<span class="material-icons">logout </span>
				<strong><a href="./logout.php">LogOut</a></strong>
			</li>
		</aside>
	</head>
	<section class="feed">    
		<main>
			<ul>
				<li>
					<div class="user-info">
						<div>
							<div>
								<img src="./assets/pessoa.png" alt="">
								<div><?php echo '<strong><h1>' . $nome_sessao . '</h1></strong><br>';?></div>
								
	</section>
</body>
</html>
