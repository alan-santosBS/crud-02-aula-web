<?php
require 'db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $ano = $_POST['ano'];
    $diretor = $_POST['diretor'];

    $stmt = $pdo->prepare('INSERT INTO filmes (nome, genero, ano, diretor) VALUES (?, ?, ?, ?)');
    $stmt->execute([$nome, $genero, $ano, $diretor]);

    header('Location: index-filme.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar aluno</title>
</head>
<body>
    <header>
        <h1>Bem Vindos ao Sistema de Grenciamento de Alunos</h1>
        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <a href="index-filme.php">Listar Filmes</a><br>
                <a href="create.php">Adicionar Filme</a>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Adicionar Filme</h2>
 
        <form method="POST" > 
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br>

            <label for="genero">Gênero:</label>
            <input type="text" id="genero" name="genero" required><br>

            <label for="ano">Ano:</label>
            <input type="number" id="ano" name="ano" required><br>

            <label for="diretor">Diretor:</label>
            <input type="text" id="diretor" name="diretor" required><br>

            <button type="submit">Adicionar</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 - Alan Santos - Sistema de gerenciamento de Filmes</p>
    </footer>
    
</body>
</html>