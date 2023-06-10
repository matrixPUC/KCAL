<?php 

  include('../database/connection.php');

  if (!$_SESSION['logado']) {
    echo 'Você precisa estar logado para entrar nessa página';
    return;
  }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/signup.css">
    <script src="../scripts/calcular.js" defer></script>
    <title>Publicacao</title>

</head>

<body>
  <div class="flex-column recipe-div">
    <form id="formReceita" name="formReceita" method="POST" action="./publicacaoPHP.php">
        <input type="text" name="texto" required  placeholder="Texto"/>
        <button>Criar</button>
    </form>
  </div>
</body>

</html> 