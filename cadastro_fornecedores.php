<?php
include 'conexao.php';

// Verifica se o formulário de cadastro de fornecedor foi enviado
if (isset($_POST["submit_fornecedor"])) {
    // Obtém os dados do formulário
    $nome_fornecedor = $_POST["nome_fornecedor"];
    $cidade_fornecedor = $_POST["cidade_fornecedor"];
    $contato_fornecedor = $_POST["contato_fornecedor"];

    // Prepara a query SQL
    $sql = "INSERT INTO fornecedores (nome, cidade, contato) VALUES ('$nome_fornecedor', '$cidade_fornecedor', '$contato_fornecedor')";

    // Executa a query
    if ($mysqli->query($sql) === TRUE) {
        echo "Fornecedor cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o fornecedor: " . $mysqli->error;
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