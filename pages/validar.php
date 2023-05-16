<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/validar.css">

    
    <title>Perfil</title>
    

</head>
    <?php include_once '../includes/header.inc.php';?>
<body>
    <h2>Nutricionistas para serem validados:</h2>
    

    <?php 
        //Conexão com o banco
        include('../database/connection.php');

        $sql = "SELECT * FROM usuario WHERE validado = 0";
        $result = $mysqli->query($sql);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if (sizeof($rows) > 0) {
            foreach ($rows as $row) {
                $rowID = $row['ID'];

                $sql = "SELECT crn FROM nutricionista WHERE ID_usuario = '$rowID'";
                $result = $mysqli->query($sql);
                $crnRow = $result->fetch_assoc();

              echo '<h3>' . $row['ID'] . ' | ' . $row['nome'] . ' | ' . $row['email'] . ' | ' . $crnRow['crn'] . ' </h3>';
            }
        } else {
            echo '<h3>Nenhum</h3>';
        }
    ?>

    <form id="formValidate" name="formValidate" method="POST" action="./validarPHP.php">
            
            <div class="input-box">
              <label for="crn">Validar</label>
              <input id="crn" type="text" name="crn" placeholder="crn" required pattern="^[A-Z]{2}[0-9]{5}$" title="Insira um CRN válido">
            </div>
    
            <div class="continue-button">
                <button>Validar</button>
            </div>
            
    </form>

</body>
</html>