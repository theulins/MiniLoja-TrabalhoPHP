<?php

$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha);

if ($mysqli->connect_error) {
    die("Falha ao conectar ao servidor MySQL: " . $mysqli->connect_error);
}

// Verifica se o banco de dados existe
$result = $mysqli->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database'");

if ($result->num_rows == 0) {
    echo "O banco de dados '$database' não existe. Criando...\n";

    // Cria o banco de dados
    if ($mysqli->query("CREATE DATABASE $database") === TRUE) {
        echo "Banco de dados '$database' criado com sucesso.\n";

        // Seleciona o banco de dados recém-criado
        $mysqli->select_db($database);

        // Inclui o script SQL para criar as tabelas
        $sqlScript = file_get_contents('login.sql');

        if ($sqlScript === false) {
            die("Falha ao ler o script de criação do banco de dados.\n");
        }

        // Executa o script SQL
        if ($mysqli->multi_query($sqlScript)) {
            echo "Tabelas criadas com sucesso.\n";
        } else {
            echo "Erro ao executar o script de criação do banco de dados: " . $mysqli->error . "\n";
        }
    } else {
        echo "Erro ao criar o banco de dados: " . $mysqli->error . "\n";
    }
} else {
    // Banco de dados já existe, seleciona-o
    $mysqli->select_db($database);
}



?>
