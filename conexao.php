<?php

$usuario = 'root';
$senha = '';
$host = 'localhost';
$banco_de_dados = 'database';
$mysqli = new mysqli($host, $usuario, $senha);


if ($mysqli->connect_error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->connect_error);
}


if (!$mysqli->select_db($banco_de_dados)) {

    $script_sql = file_get_contents('caminho/do/seu/script.sql');


    if ($mysqli->multi_query($script_sql)) {
        echo "Banco de dados e tabelas criados com sucesso.";
    } else {
        echo "Erro ao criar banco de dados e tabelas: " . $mysqli->error;
    }
}


$mysqli->close();

?>