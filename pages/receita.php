<?php 

  include_once('../database/connection.php');

  $sql = "SELECT * FROM ingrediente";
  $result = $mysqli->query($sql);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
    <title>Calcular</title>

</head>

<body>
  <div class="flex-column recipe-div">
    <form id="formReceita" name="formReceita" method="POST" action="./receitaPHP.php">
        <input type="text" name="nome" required  placeholder="Nome" />
		<input type="text" name="descricao" required placeholder="Descrição"/>
        <input type="text" name="passo" required placeholder="Passo a passo"/>
        <input type="text" class="hidden" name="ingredientsInput">
        <input type="checkbox" name="publico" value="1">
        <label for="publico">Público</label>
	
        <br><br><br>
        <label for="ingredient">Adicionar ingrediente: </label>
        <select class="ingredient">
          <option value="selecionar">Selecionar...</option>
        <?php 
          foreach ($rows as $row) {
            echo '<option value="' . $row['nome'] . '">' . $row['nome'] . ' (' . $row['porcao'] . ')</option>';
          }
        ?>

        </select>
        <input type="text" class="quantity" placeholder="Quantidade">
        <br>
        <h3 class="ingredients"></h3>
        <br><br><br>
        <button>Criar</button>
    </form>
    <button class="add-btn">Adicionar</button>
    <?php
			//Conexão com o banco
			include('../database/connection.php');
		
			if(isset($_GET['total'])){
				$total = $_GET['total'];
				echo '<p>A sua receita foi criada e o total de calorias dela é: ' . $total . '</p>';
			}else{?>
				<p></p>
			<?php
			}
	?>
  </div>
</body>

</html> 