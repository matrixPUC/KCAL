<?php
// Verifica se o arquivo foi enviado sem erros
if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
    // Define o diretório de destino para salvar o arquivo
    $diretorioDestino = './database/uploads';

    // Gera um nome único para o arquivo
    $nomeArquivo = uniqid() . '_' . $_FILES['arquivo']['name'];

    // Move o arquivo para o diretório de destino
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorioDestino . $nomeArquivo)) {
        // Arquivo movido com sucesso, agora você pode salvar o caminho no banco de dados
        $caminhoArquivo = $diretorioDestino . $nomeArquivo;

        // Conexão com o banco de dados
        include_once('../database/connection.php');
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Insere o caminho do arquivo no banco de dados
        $sql = "INSERT INTO sua_tabela (caminho_arquivo) VALUES ('$caminhoArquivo')";
        if ($conn->query($sql) === TRUE) {
            echo "Arquivo enviado e caminho salvo no banco de dados com sucesso!";
        } else {
            echo "Erro ao salvar o caminho do arquivo no banco de dados: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Erro ao mover o arquivo para o diretório de destino.";
    }
} else {
    echo "Erro no envio do arquivo.";
}
?>
