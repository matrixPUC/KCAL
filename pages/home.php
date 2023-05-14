<?php
    //Conexão com o banco
    include('../database/connection.php');
    //ID do usuário
    $nome_sessao = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feed</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../style/home.css">
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
            <a href = "./home.php"> 
              home
            </a>    
          </span>
        </div>

        <div>
          <span class="material-icons">
            ondemand_video
          </span>
        </div>

        <div>
          <span class="material-icons">
            storefront
          </span>
        </div>

        <div>
          <span class="material-icons">
            supervised_user_circle
          </span>
        </div>

        <div>
          <span class="material-icons">
            casino
          </span>
        </div>


      </nav>

      <div class="user">
        <div>
          <?php 
          echo '<span><a href="./perfil.php">' . $nome_sessao . '</a></span>'
        
          ?>
        </div>

        <nav class="actions">
          <div><span class="material-icons">
              textsms
            </span></div>
        </nav>

      </div>
    </div>
  </header>

  <div class="wrapper-content content">
    <aside class="nav-icons">
      <ul>

        <li>
          <img src="../assets/pessoa.png" alt="">
          <?php 
            echo '<strong><a href="./perfil.php">' . $nome_sessao . '</a></strong>'
          ?>
        </li>

        <li>
          <span class="material-icons">
            assistant_photo
          </span>
          <strong><a href="./receita.php">Criar Receita</a></strong>
        </li>

        <li>
          <span class="material-icons">
            group_work
          </span>
          <strong><a href="./calcular.php">Calcular</a></strong>
        </li>
        <li>
            <span class="material-icons">
                logout 
            </span>
            <strong><a href="./logout.php">LogOut</a></strong>
         </li>

        <?php
          if ($_SESSION['adm'] == true) {
            echo '<li>
                    <span class="material-icons">
                      group_work
                    </span>
                    <strong><a href="./validar.php">Validar nutricionistas</a></strong>
                 </li>';
          }
        ?>



      </ul>
    </aside>

    <section class="feed">
      
      <main>
        <ul>
          <?php
            //Conexão com o banco
            include('../database/connection.php');

            //ID do usuário
            $id_sessao = $_SESSION['ID'];

            //Match no SQL para obter as publicações em ordem de data descendente de perfis que o usuário segue
            $sql = "SELECT * FROM receita
                    WHERE public = true";
            $result = $mysqli->query($sql);
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

            //Loop de publicações
            if (sizeof($rows) > 0) {
              foreach ($rows as $row) {
                echo "<li>
                <div class='user-info'>
                  <div>
                    <div>
                      <img src='./assets/pessoa.png' alt=''>
                      <div>
                        <strong>" . $row["ID_usuario"] . "</strong>
                        <p>4 h
                          <span class='material-icons'>
                            supervisor_account
                          </span>
                        </p>
                      </div>
                    </div>
                    <span class='material-icons'>
                      more_horiz
                    </span>
                  </div>
                  <p>" . $row["nome"] . "</p>
                </div>

                <div class='image-feed'></div>

                <div class='actions-user'>
                  <div>
                    <span class='material-icons'>
                      thumb_up
                    </span>
                    <strong>Curtir</strong>
                  </div>

                  <div>
                    <span class='material-icons'>
                      chat_bubble
                    </span>
                    <strong>Comentar</strong>
                  </div>

                  <div>
                    <span class='material-icons'>
                      share
                    </span>
                    <strong>Compartilhar</strong>

                  </div>

                </div>

              </li>";
              }
            } else {
              echo "Sem publicações.";
            }
    
          ?>
        </ul>
      </main>
    </section>

    
  </div>

</body>

</html>