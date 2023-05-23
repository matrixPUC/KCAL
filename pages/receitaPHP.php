<?php
	//Conexão com o banco
	include('../database/connection.php');
    
	$ingredients = $mysqli->real_escape_string($_POST['ingredientsInput']); // prepara a string recebida para ser utilizada em comando SQL
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $descricao = $mysqli->real_escape_string($_POST['descricao']);
    $passo = $mysqli->real_escape_string($_POST['passo']);
    $publico = $mysqli->real_escape_string($_POST['publico']);

    $parts = explode(',', $ingredients);
    $result = array();
  
    for ($i = 0; $i < count($parts); $i += 2) {
      $result[] = array($parts[$i], (int)$parts[$i+1]);
    }

    if ($publico === '1') {
        $ePublico = true;
    } else {
        $ePublico = false;
    }

    $ID_usuario = $_SESSION['ID'];

    $sql = "INSERT INTO receita(ID_usuario, nome, descricao, public, passo_a_passo) 
            VALUES ('$ID_usuario', '$nome', '$descricao' , '$ePublico', '$passo')";

    $isSucesso = $mysqli->query($sql);

    if ($isSucesso) {
        $sql = "SELECT ID FROM receita WHERE ID_usuario = '$ID_usuario' AND nome = '$nome'";
        $sqlResult = $mysqli->query($sql);
        $receitaRow = $sqlResult->fetch_assoc();
        $receitaID = $receitaRow['ID'];

        $total = 0;

        foreach($result as $ingredient) {
            $name = $ingredient[0];
            $quantidade = $ingredient[1];
        
            $sql = "SELECT * FROM ingrediente WHERE nome = '$name'";
            $sqlResult = $mysqli->query($sql);
            $ingredienteRow = $sqlResult->fetch_assoc();
            $ingredienteID = $ingredienteRow['ID'];
            $calories = $ingredienteRow['calorias'] * $quantidade / $ingredienteRow['quantidadePadrao'];
            $total += $calories;

            $sql = "INSERT INTO receita_ingrediente(ID_receita, ID_ingrediente, quantidade)
                    VALUES('$receitaID', '$ingredienteID', '$quantidade')";

            $mysqli->query($sql);
        }

        header('location: ./receita.php?total=' . $total . '');
    }


?>  