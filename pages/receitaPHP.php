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

if (count($parts) < 4) {
    echo 'Uma receita precisa ter pelo menos 2 ingredientes';
    return;
}

for ($i = 0; $i < count($parts); $i += 2) {
    $result[] = array($parts[$i], (int)$parts[$i+1]);
}

if ($publico === '1') {
    $ePublico = true;
} else {
    $ePublico = false;
}

$ID_usuario = $_SESSION['ID'];

// Check if an image file was uploaded
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $image = $_FILES['imagem'];

    // Get the image details
    $image_name = $mysqli->real_escape_string($image['name']);
    $image_type = $mysqli->real_escape_string($image['type']);
    $image_data = file_get_contents($image['tmp_name']);

    // Insert the image into the database
    $sql = "INSERT INTO receita (ID_usuario, nome, descricao, public, passo_a_passo, imagem, imagem_tipo)
            VALUES ('$ID_usuario', '$nome', '$descricao', '$ePublico', '$passo', ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $image_data, $image_type);
    $isSucesso = $stmt->execute();

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
}
?>