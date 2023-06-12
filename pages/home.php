<?php
    //Conexão com o banco
    include_once('../database/connection.php');
    //ID do usuário
    if (!$_SESSION['logado']) {
      echo 'Você precisa estar logado para entrar nessa página';
      return;
    }
?>
<?php include_once '../includes/header.inc.php'; ?>
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
                $sql = "SELECT * FROM receita WHERE public = true";
                $result = $mysqli->query($sql);
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                //Loop de publicações
                if (sizeof($rows) > 0) {
                    foreach ($rows as $row) {

                        $ID_usuario_receita = $row['ID_usuario'];

                        $sql = "SELECT * FROM usuario WHERE ID = '$ID_usuario_receita'";
                        $result = $mysqli->query($sql);
                        $usuarioRow = mysqli_fetch_assoc($result);

                        $nomeUsuario = $usuarioRow['nome'];

                        $sql = "SELECT * FROM nutricionista WHERE ID_usuario = '$ID_usuario_receita'";
                        $result = $mysqli->query($sql);
                        $nutricionistaRow = mysqli_fetch_assoc($result);

                        if ($nutricionistaRow) {
                            $nomeUsuario .= "🥕";
                        }

                        echo "<li>
                                <div class='user-info'>
                                    <div>
                                        <div>
                                            <div>
                                                <strong>" . $nomeUsuario . "</strong>
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

                        $sql = "SELECT imagem, imagem_tipo FROM receita WHERE ID = '$ID_receita'";
                        $result = $mysqli->query($sql);
                        $receitaRow = $result->fetch_assoc();
                        $imagem = $receitaRow['imagem'];
                        $imagem_tipo = $receitaRow['imagem_tipo'];

                        echo "
                                <img src='data:$imagem_tipo;base64," . base64_encode($imagem) . "' alt='Receita Image'>
                                <div class='actions-user'>
                                    <div>";

                        $sqlCheckLiked = "SELECT liked FROM usuario_receita WHERE ID_usuario = '$ID_usuario' AND ID_receita = '$ID_receita'";
                        $resultLiked = $mysqli->query($sqlCheckLiked);

                        $rowLiked = mysqli_fetch_assoc($resultLiked);
                        $liked = $rowLiked['liked'];

                        if ($liked === "1") {
                          echo "<a class='liked'>Curtir</a>";
                        } else {
                          echo "<a href='likePHP.php?receita=" . $row['ID'] . "'>Curtir</a>";
                        }
                        echo "
                                        <span class='material-icons'>thumb_up</span>
                                        <div class='cenoura'>";
                        $sqlCheckCenoura = "SELECT cenoura FROM usuario_receita WHERE ID_usuario = '$ID_usuario' AND ID_receita = '$ID_receita'";
                        $resultCenoura = $mysqli->query($sqlCheckCenoura);

                        $rowCenoura = mysqli_fetch_assoc($resultCenoura);
                        $cenoura = $rowCenoura['cenoura'];

                        if ($cenoura === "1") {
                          echo "<a class='given-cenoura'>Cenoura</a>";
                        } else {
                          echo "<a href='cenouraPHP.php?receita=" . $row['ID'] . "'>Cenoura</a>";
                        }

                        $sqlCountLikes = "SELECT COUNT(*) as count_likes FROM usuario_receita WHERE ID_receita = '$ID_receita' AND liked = '1'";
                        $resultCountLikes = $mysqli->query($sqlCountLikes);
                        $rowCountLikes = mysqli_fetch_assoc($resultCountLikes);
                        $countLikes = $rowCountLikes['count_likes'];

                        $sqlCountCenouras = "SELECT COUNT(*) as count_cenouras FROM usuario_receita WHERE ID_receita = '$ID_receita' AND cenoura = '1'";
                        $resultCountCenouras = $mysqli->query($sqlCountCenouras);
                        $rowCountCenouras = mysqli_fetch_assoc($resultCountCenouras);
                        $countCenouras = $rowCountCenouras['count_cenouras'];

                        echo "
                                        </div>
                                         $countLikes curtidas e $countCenouras cenouras
                                    </div>
                                </div>
                            </li>";
                    }
                } else {
                    echo "Sem publicações.";
                }

                $sql = "SELECT * FROM publicacao";
                $result = $mysqli->query($sql);
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                //Loop de publicações
                if (sizeof($rows) > 0) {
                    foreach ($rows as $row) {

                        $ID_usuario_publicacao = $row['ID_usuario'];

                        $sql = "SELECT * FROM usuario WHERE ID = '$ID_usuario_publicacao'";
                        $result = $mysqli->query($sql);
                        $usuarioRow = mysqli_fetch_assoc($result);

                        $nomeUsuario = $usuarioRow['nome'];

                        $sql = "SELECT * FROM nutricionista WHERE ID_usuario = '$ID_usuario_publicacao'";
                        $result = $mysqli->query($sql);
                        $nutricionistaRow = mysqli_fetch_assoc($result);

                        if ($nutricionistaRow) {
                            $nomeUsuario .= "🥕";
                        }

                        $ID_publicacao = $row['ID'];

                        echo "<li>
                                <div class='user-info'>
                                    <div>
                                        <div>
                                            <div>
                                                <strong>" . $nomeUsuario . "</strong>
                                            </div>";

                        if ($ID_usuario === $ID_usuario_publicacao) {
                            echo "<a href='deletar_publicacaoPHP.php?publicacao="  . $ID_publicacao . "'>-Excluir</a>
                                  <a href='editar_publicacao.php?publicacao="  . $ID_publicacao . "'>-Editar</a>";
                        }
                        echo "</div>
                                </div>
                                <p>" . $row['texto'] . "</p><br>
                            </div>
                            <div class='actions-user'>
                                <div>";
                        $sqlCheckLiked = "SELECT liked FROM usuario_publicacao WHERE ID_usuario = '$ID_usuario' AND ID_publicacao = '$ID_publicacao'";
                        $resultLiked = $mysqli->query($sqlCheckLiked);
                      
                        $rowLiked = mysqli_fetch_assoc($resultLiked);
                        $liked = $rowLiked['liked'];

                        if ($liked === "1") {
                            echo "<a class='liked'>Curtir</a>";
                        } else {
                            echo "<a href='likePHP.php?publicacao=" . $row['ID'] . "'>Curtir</a>";
                        }
                        echo "
                                        <span class='material-icons'>thumb_up</span>
                                        <div class='cenoura'>";
                        $sqlCheckCenoura = "SELECT cenoura FROM usuario_publicacao WHERE ID_usuario = '$ID_usuario' AND ID_publicacao = '$ID_publicacao'";
                        $resultCenoura = $mysqli->query($sqlCheckCenoura);

                        $rowCenoura = mysqli_fetch_assoc($resultCenoura);
                        $cenoura = $rowCenoura['cenoura'];

                        if ($cenoura === "1") {
                            echo "<a class='given-cenoura'>Cenoura</a>";
                        } else {
                            echo "<a href='cenouraPHP.php?publicacao=" . $row['ID'] . "'>Cenoura</a>";
                        }

                        $sqlCountLikes = "SELECT COUNT(*) as count_likes FROM usuario_publicacao WHERE ID_publicacao = '$ID_publicacao' AND liked = '1'";
                        $resultCountLikes = $mysqli->query($sqlCountLikes);
                        $rowCountLikes = mysqli_fetch_assoc($resultCountLikes);
                        $countLikes = $rowCountLikes['count_likes'];

                        $sqlCountCenouras = "SELECT COUNT(*) as count_cenouras FROM usuario_publicacao WHERE ID_publicacao = '$ID_publicacao' AND cenoura = '1'";
                        $resultCountCenouras = $mysqli->query($sqlCountCenouras);
                        $rowCountCenouras = mysqli_fetch_assoc($resultCountCenouras);
                        $countCenouras = $rowCountCenouras['count_cenouras'];

                        echo "
                                        </div>
                                        $countLikes curtidas e $countCenouras cenouras
                                    </div>
                                </div>
                            </li>";
                    }
                }
                ?>
            </ul>
        </main>
    </section>
</div>
</body>
</html>