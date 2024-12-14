<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tarefas WHERE id = $id";
    $result = $conn->query($sql);
    $tarefa = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    $sql = "UPDATE tarefas SET titulo = '$titulo', descricao = '$descricao' WHERE id = $id";
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
    <title>Editar Tarefa</title>
</head>
<body>
    <h1>Editar Tarefa</h1>
    <form action="editar.php" method="POST">
        <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?= $tarefa['titulo'] ?>" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao"><?= $tarefa['descricao'] ?></textarea><br><br>

        <button type="submit">Atualizar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>

