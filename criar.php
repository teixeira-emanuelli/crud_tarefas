<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO tarefas (titulo, descricao) VALUES ('$titulo', '$descricao')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit;
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tarefa</title>
</head>
<body>
    <h1>Criar Nova Tarefa</h1>
    <form action="criar.php" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao"></textarea><br><br>

        <button type="submit">Criar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
