<?php
    //Conexão com o banco
    include_once('../database/connection.php');
    //ID do usuário
    
    if (!$_SESSION['logado']) {
      echo 'Você precisa estar logado para entrar nessa página';
      return;
    }
?>
  <?php include_once '../includes/header.inc.php';?>
  <head>
      <link rel="stylesheet" href="../style/home.css">
      <title>Feed</title>
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
  </ul>
  </aside>
  <section class="feed">
    <main>
      <ul>
        <?php
          //ID do usuário
          $ID_usuario = $_SESSION['ID'];
        
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
                      <strong>" . $row['ID_usuario'] . "</strong>
                      <p>4h<span class='material-icons'>supervisor_account</span></p>
                    </div>
                  </div>
                  <span class='material-icons'>more_horiz</span>
                </div>
                <p>" . $row['nome'] . "</p>
              </div>
              <div class='image-feed'></div>
              <div class='actions-user'>
                <div>
                  <span class='material-icons'>thumb_up</span>
                  <strong>Curtir</strong>
                </div>
                <div>
                  <span class='material-icons'>chat_bubble</span>
                  <strong>Comentar</strong>
                </div>
                <div>
                  <span class='material-icons'>share</span>
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