<?php
include ('conexao.php');
include 'protect.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos e Fornecedores - Mini Loja</title>
    <link rel="stylesheet" href="style3.css">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <h1 class="logo">Mini Loja</h1>
            <ul class="nav-menu">
                <li><a href="inicio.php">Início</a></li>
                <li><a href="inserir.php">Cadastrar</a></li>
                <li><a href="carrinho.php">Carrinho</a></li>
                <li><a href="Logout.php">Sair</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="half">
            <h2>Cadastro de Produtos</h2>
            <form action="cadastro_produtos.php" method="POST">
                <div class="form-group">
                    <label for="nome_produto">Nome do Produto:</label>
                    <input type="text" id="nome_produto" name="nome_produto" placeholder="Digite o nome do produto"
                        required>
                </div>
                <div class="form-group">
                    <label for="preco_produto">Preço:</label>
                    <input type="text" id="preco_produto" name="preco_produto" placeholder="Digite o preço do produto"
                        required>
                </div>
                <div class="form-group">
                    <label for="descricao_produto">Descrição:</label>
                    <input type="text" id="descricao_produto" name="descricao_produto"
                        placeholder="Digite a descrição do produto" required>
                </div>
                <div class="form-group">
                    <label for="fornecedor_produto">Fornecedor:</label>
                    <select id="fornecedor_produto" name="fornecedor_produto" required>
                        <option value="">Selecione um fornecedor</option>
                        <?php
                        // Conexão com o banco de dados
                        include 'conexao.php';

                        // Consulta para obter os fornecedores
                        $query = "SELECT id, nome FROM fornecedores";
                        $result = $mysqli->query($query);

                        // Loop para exibir as opções do menu suspenso
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                        }

                        // Fecha a conexão
                        $mysqli->close();
                        ?>
                    </select>
                </div>
                <button type="submit" name="submit_produto">Cadastrar Produto</button>
            </form>
        </div>
        <div class="half">
            <h2>Cadastro de Fornecedores</h2>
            <form action="cadastro_fornecedores.php" method="POST">
                <div class="form-group">
                    <label for="nome_fornecedor">Nome do Fornecedor:</label>
                    <input type="text" id="nome_fornecedor" name="nome_fornecedor"
                        placeholder="Digite o nome do fornecedor" required>
                </div>
                <div class="form-group">
                    <label for="cidade_fornecedor">Cidade:</label>
                    <input type="text" id="cidade_fornecedor" name="cidade_fornecedor"
                        placeholder="Digite a cidade do fornecedor" required>
                </div>
                <div class="form-group">
                    <label for="contato_fornecedor">Contato:</label>
                    <input type="text" id="contato_fornecedor" name="contato_fornecedor"
                        placeholder="Digite o contato do fornecedor" required>
                </div>
                <button type="submit" name="submit_fornecedor">Cadastrar Fornecedor</button>
            </form>
        </div>
    </div>
</body>

</html>