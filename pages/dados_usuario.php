<?php
    //Conexão com o banco
    include_once('../database/connection.php');

    if (!$_SESSION['logado']) {
        echo 'Você precisa estar logado para entrar nessa página';
        return;
      }
?>

<?php include_once '../includes/header.inc.php';?>

<?php 

$IDusuario = $_SESSION['ID'];
    $sql = "SELECT * FROM usuario WHERE ID ='$IDusuario'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
?>
<head>
    <title><?php echo $row['nome'] ?> | KCAL</title>
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
                        <table width=500 align=center> 
                            <tr>
                                <td><h1><?php echo $row['nome'] ?></h1></td>

                            </tr>
                            <tr>
                                <td><h2 align="right">E-mail</h2></td>
                                <td>
                                    <p align="left"><?php echo $row['email'] ?></p> 
                                </td>
                            </tr>
                            <tr>
                                <td><h2 align="right">Celular</h2></td>
                                <td>
                                    <p align="left"><?php echo $row['celular'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td><h2 align="right">Data de nascimento</h2></td>
                                <td>
                                    <p align="left"><?php echo $row['dataNasc'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td><h2 align="right">Altura</h2></td>
                                <td>
                                    <p align="left"><?php echo $row['altura'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td><h2 align="right">Peso</h2></td>
                                <td>
                                    <p align="left"><?php echo $row['peso'] ?></p>
                                </td>
                            </tr>
                        </table>
					</div>
				</li>
                <li>
                </li>
			</ul>
		</main>
		<main>
			
		</main>
	</section>
   
</body>
</html>
