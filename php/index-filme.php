<?php
require 'db.php';

$stmt = $pdo->query('SELECT * FROM filmes');
$filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);   

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud_filmes</title>
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
        <h2>Lista de Filmes</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Gênero</th>
                    <th>Ano</th>
                    <th>Diretor</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($filmes as $filme): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($filme['id']); ?></td>
                        <td><?php echo htmlspecialchars($filme['nome']); ?></td>
                        <td><?php echo htmlspecialchars($filme['genero']); ?></td>
                        <td><?php echo htmlspecialchars($filme['ano']); ?></td>
                        <td><?php echo htmlspecialchars($filme['diretor']); ?></td>
                        <td>
                            <a href="delet.php?id=<?php echo $filme['id']; ?>" onclick="return confirm('Tem certeza que deseja deletar este filme?');">Deletar</a>
                            <a href="reAd.php?id=<?php echo $filme['id']; ?>">Ver Detalhes</a>
                            <a href="update.php?id=<?php echo $filme['id']; ?>">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>

    <footer>
        <p>&copy; 2025 - Alan Santos - Sistema de gerenciamento de Filmes</p>
    </footer>
</body>
</html>