<?php
require_once 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM filmes WHERE id = :id');

$stmt->execute([':id' => $id]); //[':id' => $id]

$filme = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $ano = $_POST['ano'];
    $diretor = $_POST['diretor'];

    $updateStmt = $pdo->prepare('UPDATE filmes SET nome = :nome, genero = :genero, ano = :ano, diretor = :diretor WHERE id = :id');
    $updateStmt->execute([':nome' => $nome,':genero' => $genero,':ano' => $ano,':diretor' => $diretor,':id' => $id]);

    header('Location: index.php');
    exit;
}
?> 

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Filme</title>
</head>
<body>
    <header>
        <h1>Bem Vindos ao Sistema de Grenciamento de Alunos</h1>
        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <a href="index-filme.php">Listar Filmes</a>
                <a href="create.php">Adicionar Filme</a>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Editar Filme</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= ($filme['nome']); ?>" required><br>
            <label for="genero">Gênero:</label>
            <input type="text" id="genero" name="genero" value="<?= ($filme['genero']); ?>" required><br>
            <label for="ano">Ano:</label>
            <input type="number" id="ano" name="ano" value="<?= ($filme['ano']); ?>" required><br>
            <label for="diretor">Diretor:</label>
            <input type="text" id="diretor" name="diretor" value="<?= ($filme['diretor']); ?>" required><br>
            
            <button type="submit">Salvar Alterações</button>
        </form>
</body>
    <footer>
        <p>&copy; 2025 - Alan Santos - Sistema de gerenciamento de Filmes</p>
    </footer>
</html>