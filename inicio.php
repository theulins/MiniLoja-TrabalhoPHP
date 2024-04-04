<?php
include 'conexao.php';
include 'protect.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$produtos_selecionados = array();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>Mini Loja</title>
</head>

<body>
    <div class="navbar">
        <div class="container">
            <h1>Mini Loja</h1>
            <ul>
                <li><a href="inicio.php">Início</a></li>
                <li><a href="inserir.php">Cadastrar</a></li>
                <li><a href="carrinho.php">Carrinho</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </div>
    </div>

    <div class="container produtos">
        <h2>Produtos</h2>
        <form action="carrinho.php" method="POST">
            <?php
            $query = "SELECT p.id, p.nome AS nome_produto, p.descricao, p.preco, f.nome AS nome_fornecedor 
                      FROM produtos AS p 
                      LEFT JOIN fornecedores AS f ON p.fornecedor_id = f.id";
            $resultado = $mysqli->query($query);

            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $id_produto = $row['id'];
                    $nome_produto = $row['nome_produto'];
                    $descricao = $row['descricao'];
                    $preco = $row['preco'];
                    $nome_fornecedor = $row['nome_fornecedor'];

                    echo '<div class="produto">';
                    echo "<h3>$nome_produto</h3>";
                    echo "<p>$descricao</p>";
                    echo "<p><strong>Fornecedor:</strong> $nome_fornecedor</p>";
                    echo "<p>R$ $preco</p>";
                    echo "<input type='checkbox' name='produtos_selecionados[]' value='$id_produto'> Adicionar ao carrinho";
                    echo '</div>';
                }
            } else {
                echo "Nenhum produto encontrado.";
            }
            ?>
            <button type="submit">Adicionar ao Carrinho</button>
        </form>
    </div>
</body>

</html>
