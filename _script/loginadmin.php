<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "autopecas";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname, 3306);

// Verificar conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

$sql = "INSERT INTO admin (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

if ($username && $password) {
  // Autenticação bem-sucedida, redirecionar para a página de boas-vindas
  header('Location: index.php');
  exit();
} else {
  // Autenticação falhou, mostrar uma mensagem de erro
  echo "Login ou senha incorretos.";
}
?>