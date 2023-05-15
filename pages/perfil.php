<?php
    //Conexão com o banco
    include('../database/connection.php');
    include_once '../includes/header.inc.php';
    //ID do usuário
    $nome_sessao = $_SESSION['nome'];
    $email = $_SESSION['email'];
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
								<div class="profile-stats">
									<ul>
										<li><span>1.2K</span> publicações</li>
										<li><span>3.5K</span> seguidores</li>
										<li><span>1.8K</span> seguindo</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</main>
		<main>
			<div class="container">
				<div class="gallery">
					<div class="gallery-item"><img src="../assets/post1.png" alt="Imagem 1"></div>
					<div class="gallery-item"><img src="../assets/post2.jpg" alt="Imagem 2"></div>
					<div class="gallery-item"><img src="../assets/post3.png" alt="Imagem 3"></div>
					<div class="gallery-item"><img src="../assets/post4.jpg" alt="Imagem 4"></div>
					<div class="gallery-item"><img src="../assets/post5.jpg" alt="Imagem 5"></div>
					<div class="gallery-item"><img src="../assets/post6.jpg" alt="Imagem 6"></div>
                </div>
			</div>
		</main>
	</section>
</body>
</html>
