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

              $ID_usuario_receita = $row['ID_usuario'];

              $sql = "SELECT * FROM usuario
                      WHERE ID = '$ID_usuario_receita'";
              $result = $mysqli->query($sql);
              $usuarioRow = mysqli_fetch_assoc($result);

              echo "<li>
              <div class='user-info'>
                <div>
                  <div>
                    <div>
                      <strong>" . $usuarioRow['nome'] . "</strong>
                    </div>";
                
              if ($ID_usuario === $ID_usuario_receita) {
                echo "<a href='deletar_receitaPHP.php?receita="  . $row['ID'] . "'>-Excluir</a>
                <a href='editar_receita.php?receita="  . $row['ID'] . "'>-Editar</a>";
              }
                echo "</div>
                </div>
                <p>Nome: " . $row['nome'] . "</p><br>
                <p>Descrição: " . $row['descricao'] . "</p><br>
                <p>Passo a passo: " . $row['passo_a_passo'] . "</p><br>
              ";

              $ID_receita = $row['ID'];

              $sql = "SELECT * FROM receita_ingrediente
                  WHERE ID_receita = '$ID_receita'";
              $result = $mysqli->query($sql);
              $receitaIngredienteRows = mysqli_fetch_all($result, MYSQLI_ASSOC);

              echo '<p>Ingredientes: ';

              foreach ($receitaIngredienteRows as $receitaIngrediente) {

                $ID_ingrediente = $receitaIngrediente['ID_ingrediente'];

                $sql = "SELECT * FROM ingrediente WHERE ID = '$ID_ingrediente'";
                $result = $mysqli->query($sql);
                $ingredienteRow = mysqli_fetch_assoc($result);

                echo $receitaIngrediente['quantidade'] . ' ' . $ingredienteRow['nome'] . '(' . $ingredienteRow['porcao'] . ') , ';
              }

              echo '</p>';

              echo "
              </div>
              <div class='image-feed'></div>
              <div class='actions-user'>
                <div>
                  <span class='material-icons'>thumb_up</span>
                  <strong>Curtir</strong>
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