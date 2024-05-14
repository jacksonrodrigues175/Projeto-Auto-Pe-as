<?php
// Configuration
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'autopecas';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}
// Sanitize and validate form data
$login = htmlspecialchars(strip_tags(trim($_POST['login'])));
$senha = htmlspecialchars(strip_tags(trim($_POST['senha'])));
$nome = htmlspecialchars(strip_tags(trim($_POST['nome'])));
$telefone = htmlspecialchars(strip_tags(trim($_POST['telefone'])));
$email = htmlspecialchars(filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL));

// Insert data into the database
$sql = "INSERT INTO Usuarios (login, senha, nome, telefone, email) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("sssss", $login, $senha, $nome, $telefone, $email);

    // Execute the query
    if ($stmt->execute()) {
        echo "Novo registro criado com sucesso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
} else {
    echo "Erro ao preparar a declaração: " . $conn->error;
}

$conn->close();
?>