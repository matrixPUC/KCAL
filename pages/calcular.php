<?php 

  include('../database/connection.php');

  $sql = "SELECT * FROM ingrediente";
  $result = $mysqli->query($sql);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
  <div class="flex-column">
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
    <button class="add-btn">Adicionar</button>
    <h3 class="ingredients"></h3>
    <br><br><br>
    <form id="formCalcular" name="formCalcular" method="POST" action="./calcularPHP.php">
      <input type="text" class="hidden" name="ingredientsInput">
      <button>Calcular</button>
		</form>
    <?php
					//Conexão com o banco
					include('../database/connection.php');
				
					if(isset($_GET['total'])){
						$total = $_GET['total'];
						echo '<p>O total de calorias é: ' . $total . '</p>';
					}else{?>
						<p></p>
					<?php
					}
				?>
  </div>
</body>

</html> 