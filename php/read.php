<?php
require_once 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM filmes WHERE id = :id');
$stmt->execute([':id' => $id]); //[':id' => $id]
$filme = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes dos Filmes</title>
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
        <h2>Detalhes dos Filmes</h2>
        <?php if ($filme): ?>
            <p><strong>ID:</strong> <?php echo htmlspecialchars($filme['id']); ?></p>
            <p><strong>Nome:</strong> <?php echo htmlspecialchars($filme['nome']); ?></p>
            <p><strong>Gênero:</strong> <?php echo htmlspecialchars($filme['genero']); ?></p>
            <p><strong>Ano:</strong> <?php echo htmlspecialchars($filme['ano']); ?></p>
            <p><strong>Diretor:</strong> <?php echo htmlspecialchars($filme['diretor']); ?></p>

        <?php else: ?>
            <p>Filme não encontrado.</p>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2025 - Alan Santos - Sistema de gerenciamento de Filmes</p>
    </footer>
</body>
</html>