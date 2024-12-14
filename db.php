
<?php
$host = 'localhost';
$user = 'root'; // Usuário padrão do XAMPP
$pass = ''; // Senha padrão 
$db = 'crud_tarefas';

$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>

