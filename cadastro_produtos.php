<?php
include 'conexao.php';

// Verifica se o formulário de cadastro de produto foi enviado
if (isset($_POST["submit_produto"])) {
    // Obtém os dados do formulário
    $nome_produto = $_POST["nome_produto"];
    $preco_produto = $_POST["preco_produto"];
    $descricao_produto = $_POST["descricao_produto"];
    $fornecedor_id = $_POST["fornecedor_produto"];

    // Prepara a query SQL
    $sql = "INSERT INTO produtos (nome, preco, descricao, fornecedor_id) VALUES ('$nome_produto', '$preco_produto', '$descricao_produto', '$fornecedor_id')";

    // Executa a query
    if ($mysqli->query($sql) === TRUE) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o produto: " . $mysqli->error;
    }

    // Fecha a conexão
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucesso!</title>
</head>
<body>
    <br>
    <a href="inserir.php">Voltar</a>
</body>
</html>