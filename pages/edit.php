<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/signup.css">
    <title>Cadastro</title>
</head>

<body>
  <div class="container">
    <div class="form-image">
      <img src="../assets/imagem cadastro.png" alt="">
      </div>
      <form id="formEdit" name="formEdit" method="POST" action="./editPHP.php">
            
        <div class="input-box">
          <label for="peso">Peso</label>
          <input id="peso" type="text" name="peso" placeholder="kg" required pattern="^(?:(?:(?:[0-4]?\d{1,2})|500)(?:[.,]\d{1,2})?|\d{1,3})$" title="Insira um peso válido com até no maximo duas casas decimais">
        </div>

        <div class="continue-button">
            <button><a href="#">Edit</a></button>
        </div>
		
          </form>
      </div>
  </div>
</body>

</html>