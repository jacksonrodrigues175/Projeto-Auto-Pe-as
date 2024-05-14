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

// Prepare and execute query
$sql = "SELECT id, nomePeca, fornecedor, valorCompra, valorVenda, dataCadastro, imagem FROM Pecas";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: ". $row["id"]. " - Nome da Peça: ". $row["nomePeca"]. " - Fornecedor: ". $row["fornecedor"]. " - Valor de Compra: ". $row["valorCompra"]. " - Valor de Venda: ". $row["valorVenda"]. " - Data de Cadastro: ". $row["dataCadastro"]. " - Imagem: ". $row["imagem"]. "<br>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
