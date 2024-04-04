<?php
include 'conexao.php';
include 'protect.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$produtos_selecionados = array();

if (isset($_POST['produtos_selecionados']) && is_array($_POST['produtos_selecionados'])) {
    $produtos_selecionados = $_POST['produtos_selecionados'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras - Mini Loja</title>
    <link rel="stylesheet" href="style3.css">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <h1 class="logo">Mini Loja</h1>
            <ul class="nav-menu">
                <li><a href="inicio.php">Início</a></li>
                <li><a href="inserir.php">Cadastrar</a></li>
                <li><a href="#">Carrinho</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </div>
    </nav>

    <div class="container carrinho">
        <h2>Carrinho de Compras</h2>

        <?php
        if (!empty($produtos_selecionados)) {
            $total_carrinho = 0;
            echo "<ul>";
            foreach ($produtos_selecionados as $id_produto) {
                $query = "SELECT nome, preco FROM produtos WHERE id = $id_produto";
                $resultado = $mysqli->query($query);
                if ($resultado->num_rows > 0) {
                    $produto = $resultado->fetch_assoc();
                    $nome = $produto['nome'];
                    $preco = $produto['preco'];

                    // Verifica se o preço é numérico antes de somá-lo ao total
                    if (is_numeric($preco)) {
                        $total_carrinho += (float)$preco;
                    }

                    echo "<li>";
                    echo "<p><strong>Produto:</strong> $nome</p>";
                    echo "<p><strong>Preço:</strong> R$ " . number_format($preco, 2, ',', '.') . "</p>";
                    echo "</li>";
                }
            }
            echo "</ul>";

            echo "<div class='resumo-carrinho'>";
            echo "<p><strong>Total de Produtos:</strong> " . count($produtos_selecionados) . "</p>";
            echo "<p><strong>Total a Pagar:</strong> R$ " . number_format($total_carrinho, 2, ',', '.') . "</p>";
            echo "</div>";
        } else {
            echo "<p>Nenhum produto no carrinho.</p>";
        }
        ?>
    </div>
</body>

</html>
