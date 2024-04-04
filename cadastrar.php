<?php
session_start();
include ('conexao.php');

$nome = mysqli_real_escape_string($mysqli, trim($_POST['nome']));
$email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
$senha = mysqli_real_escape_string($mysqli, trim(md5($_POST['senha'])));
$senhamd5 = $senha;

$sql = "SELECT COUNT(*) AS TOTAL FROM usuarios WHERE email = '$email' ";
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
$row = mysqli_fetch_assoc($result);

if ($row['TOTAL'] == 1) { 
    $_SESSION['usuario_existe'] = true;
    header('Location: cadastro.php');
    exit;
}

$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha') "; 

if ($mysqli->query($sql) === true) {
    $_SESSION['status_cadastro'] = true;
}
$mysqli->close();

header('Location: index.php');
exit;
?>
