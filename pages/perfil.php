<?php
    //Conexão com o banco
    include('../database/connection.php');

    //ID do usuário
    $nome_sessao = $_SESSION['nome'];
    $email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nome_sessao ?> | KCAL</title>
    <link rel="stylesheet" href="../style/perfil.css">
    <script src="../scripts/popup.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <header id="main-header">
        <div class="content">
            <div class="logo">
                <img src="../assets/nutricionista.png" alt="">
                <input type="text" placeholder="Pesquisar no KCal">
            </div>
            <nav class="menu-icons">
                <div class="home">
                    <span class="material-icons">
                        <a href="./home.php">home</a>    
                    </span>
                </div>
                <div>
                    <span class="material-icons">ondemand_video</span>
                </div>
                <div>
                    <span class="material-icons">storefront</span>
                </div>
                <div>
                    <span class="material-icons">supervised_user_circle</span>
                </div>
                <div>
                    <span class="material-icons">casino</span>
                </div>
            </nav>
            <div class="user">
                <div>
                    <span><a href="./perfil.php"><?php echo $nome_sessao ?></a></span>
                </div>
                <nav class="actions">
                    <div><span class="material-icons">textsms</span></div>
                </nav>
            </div>
        </div>
    </header>
    <div class="wrapper-content content">
        <aside class="nav-icons">
            <ul>
                <li>
                    <img src="<?php echo $foto ?>" alt="Foto de perfil de <?php echo $user_name ?>">
                    <strong><a href="./perfil.php"><?php echo $nome_sessao ?></a></strong>
                </li>
                <li>
                    <span class="material-icons">assistant_photo</span>
                    <strong><a href="./receita.php">Criar Receita</a></strong>
                </li>
                <li>
                    <span class="material-icons">group_work</span>
                    <strong><a href="./calcular.php">Calcular</a></strong>
                </li>
                <li>
                    <span class="material-icons">123</span>
                    <strong><a href="./edit.php">Editar peso</a></strong>
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
              <div>
                <div>
                  <img src="./assets/pessoa.png" alt="">
                  <div>
                  <?php 
                    echo '<strong><h1>' . $nome_sessao . '</h1></strong>';
                    echo '<p>E-mail:</p>' . $email;
                    echo '<p>Celular:</p>' . $email;
                    echo '<p>Data de nascimento:</p>' . $email;
                    echo '<p>Altura:</p>' . $email;
                    echo '<p>Peso:</p>' . $email;
                  ?>
                
                  </div>
                </div>
                
              </div>
            </div>
          </li>
        </ul>
      </main>
    </section>  
    </div>
</body>
</html>
