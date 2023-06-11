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
<?php include_once '../includes/header.inc.php'; ?>
<head>
    <link rel="stylesheet" href="../style/receita.css">
    <script src="../scripts/calcular.js" defer></script>
    <title>Calcular</title>
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
        <form id="formReceita" name="formReceita" method="POST" action="./receitaPHP.php" enctype="multipart/form-data">
            <input type="text" name="nome" required placeholder="Nome" />
            <input type="text" name="descricao" required placeholder="Descrição" />
            <input type="text" name="passo" required placeholder="Passo a passo" />
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
            <input type="file" name="imagem" accept="image/*" required>
            <br><br>
            <button>Adicionar</button>
        </form>
        <button class="add-btn">Criar</button>
        <?php
        //Conexão com o banco
        include('../database/connection.php');
        

        if (isset($_GET['total'])) {
            $total = $_GET['total'];
            echo '<p>A sua receita foi criada e o total de calorias dela é: ' . $total . '</p>';
        } else {
        ?>
            <p></p>
        <?php
        }
        ?>
    </div>

</body>
</html>