<?php
require 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare('DELETE FROM filmes WHERE id = :id');
$stmt->execute([':id' => $id]); //[':id' => $id]

header('Location: index-filme.php');
?> 
