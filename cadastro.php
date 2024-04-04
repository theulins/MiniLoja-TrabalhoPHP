<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Mini Loja</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Mini Loja</h1>
        <?php if (isset($_SESSION['status_cadastro'])): ?>
            <div class="notification">
                Cadastro realizado com sucesso!
            </div>
            <?php
            unset($_SESSION['status_cadastro']);
        endif;
        ?>

        <?php if (isset($_SESSION['usuario_existe'])): ?>
            <div class="notification">
                O usuário escolhido já existe. Por favor, informe outro e tente novamente.
            </div>
            <?php
            unset($_SESSION['usuario_existe']);
        endif;
        ?>

        <form action="cadastrar.php" method="POST">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="nome" placeholder="Digite seu nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu email" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="senha" placeholder="Digite sua senha" required>
            </div>
            <button type="submit">Continuar</button>
        </form>
    </div>
</body>

</html>