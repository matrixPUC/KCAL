<?php
    //Conexão com o banco
    include('../database/connection.php');

    //ID do usuário
    $nome_sessao = $_SESSION['nome'];
    $email = $_SESSION['email'];
?>

<?php include_once '../includes/header.inc.php';?>
<head>
    <title><?php echo $nome_sessao ?> | KCAL</title>
    <link rel="stylesheet" href="../style/perfil.css">
    <link rel="stylesheet" href="../style/header.css">
    <script src="../scripts/popup.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
    <div class="wrapper-content content">
        <?php 
        include_once '../includes/menu.inc.php';
        if ($_SESSION['adm'] == true) {
        echo '<li>
                <span class="material-icons">
                    group_work
                </span>
                <strong><a href="./validar.php">Validar nutricionistas</a></strong>
                </li>';
        }
        ?>
                <li>
                    <span class="material-icons">123</span>
                    <strong><a href="./edit.php">Editar conta</a></strong>
                </li>
                <li>
                    <span class="material-icons">delete</span>
                    <form id="delete-form" method="POST" action="./deletePHP.php">
                        <strong><a href="#" onclick="openModal()">Deletar conta</a></strong>
                        <div id="delete-modal" class="modal">
                            <div class="modal-content">
                                <span class="close" onclick="closeModal()">&times;</span>
                                <p>Tem certeza que deseja excluir sua conta?</p>
                                <button type="submit">Sim</button>
                               <button type="button" onclick="closeModal()">Cancelar</button>
                             </div>
                        </div>
                    </form>
                </li>
                <li>
                    <span class="material-icons">logout </span>
                    <strong><a href="./logout.php">LogOut</a></strong>
                </li>
                </ul>
        </aside>


	<section class="feed">    
		<main>
			<ul>
				<li>
					<div class="user-info">
                        <img src="./assets/pessoa.png" alt="">
                        <table width=500 align=center> <!--Alterar variáveis-->
                            <tr>
                                <td><h1><?php echo $nome_sessao ?></h1></td>
                                <td>
                                
                                </td>
                            </tr>
                            <tr>
                                <td><h2 align="right">E-mail</h2></td>
                                <td>
                                    <p align="left">teste</p>
                                    <?php echo $email ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h2 align="right">Celular</h2></td>
                                <td>
                                    <p align="left">teste</p>
                                    <?php echo $celular ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h2 align="right">Data de nascimento</h2></td>
                                <td>
                                    <p align="left">teste</p>
                                    <?php echo $dataNasc ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h2 align="right">Altura</h2></td>
                                <td>
                                    <p align="left">teste</p>
                                    <?php echo $altura ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h2 align="right">Peso</h2></td>
                                <td>
                                    <p align="left">teste</p>
                                    <?php echo $peso ?>
                                </td>
                            </tr>
                        </table>
					</div>
				</li>
                <li>
                    <div class="profile-stats">
                        <ul>
                            <li><span>1.2K</span> publicações</li>
                            <li><span>3.5K</span> seguidores</li>
                            <li><span>1.8K</span> seguindo</li>
                        </ul>
                    </div>
                </li>
			</ul>
		</main>
		<main>
			
		</main>
	</section>
    
</body>
</html>
