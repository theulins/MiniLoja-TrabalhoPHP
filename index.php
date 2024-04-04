<?php
include ('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
    if (empty($_POST['email'])) {
        echo "Preencha seu e-mail";
    } elseif (empty($_POST['senha'])) {
        echo "Preencha sua senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);


        $senha_md5 = md5($senha);



        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha_md5'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL" . $mysqli->error);


        $quantidade = $sql_query->num_rows;
        if ($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("location: inicio.php");
            exit;
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <title>Logi</title>
</head>

<body>
    <div class="container">
        <h1>Mini Loja</h1>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu email" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
    </div>
</body>

</html>