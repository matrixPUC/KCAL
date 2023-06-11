<?php 
  include('../database/connection.php');

  if (!$_SESSION['logado']) {
    echo 'Você precisa estar logado para entrar nessa página';
    return;
  }
?>
<?php include_once '../includes/header.inc.php'; ?>
<head>
    <link rel="stylesheet" href="../style/publicacao.css">
    <title>Publicação</title>
</head>
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

  <div class="flex-column recipe-div">
    <form id="formReceita" name="formReceita" method="POST" action="./publicacaoPHP.php">
        <input type="text" name="texto" required  placeholder="Texto"/>
        <button>Criar</button>
    </form>
  </div>
</body>

</html> 