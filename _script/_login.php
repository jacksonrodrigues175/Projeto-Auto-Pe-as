<?php
// Configuration
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'autopecas';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3306);

// Checar conexão
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}
?>



<?php
// Initialize the variables with empty strings
$login = "";
$senha = "";

// ... (código para verificar as credenciais do usuário)

// Assign the values from the form to the variables
if (isset($_POST['login']) && isset($_POST['senha'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
}

if ($login && $senha) {
    // Autenticação bem-sucedida, redirecionar para a página de boas-vindas
    header('Location: indexuser.php');
    exit();
} else {
    // Autenticação falhou, mostrar uma mensagem de erro
    echo "Login ou senha incorretos.";
}
?>