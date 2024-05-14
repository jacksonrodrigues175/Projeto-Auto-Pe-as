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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomePeca = $_POST['nomePeca'];
    $fornecedor = $_POST['fornecedor'];
    $valorCompra = $_POST['valorCompra'];
    $valorVenda = $_POST['valorVenda'];
    $dataCadastro = $_POST['dataCadastro'];

    // Validate user input
    if (empty($nomePeca) || empty($fornecedor) || empty($valorCompra) || empty($valorVenda) || empty($dataCadastro)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Prepare and execute query
    $sql = "INSERT INTO Pecas (nomePeca, fornecedor, valorCompra, valorVenda, dataCadastro) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdds", $nomePeca, $fornecedor, $valorCompra, $valorVenda, $dataCadastro);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Peça cadastrada com sucesso!";
    } else {
        echo "Erro: ". $sql. "<br>". $conn->error;
    }
}

// Prepare and execute query for listing parts
$stmt = $conn->prepare("SELECT id, nomePeca, valorVenda FROM Pecas");
$stmt->execute();
$result = $stmt->get_result();

// Close connection
$conn->close();
?>

<!-- HTML code for the form and the parts list -->
<!DOCTYPE html>
<html lang="pt-br">
    <!-- ... rest of your HTML code ... -->

    
    <a href="cadastrar.php">voltar</a>
<a href=""></a>

    <!-- Table for listing parts -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0) :?>
                <?php while ($row = $result->fetch_assoc()) :?>
                    <tr>
                        <td><?= $row['id']?></td>
                        <td><?= $row['nomePeca']?></td>
                        <td><?= $row['valorVenda']?></td>
                    </tr>
                <?php endwhile;?>
            <?php else :?>
                <tr>
                    <td colspan="3">0 results</td>
                </tr>
            <?php endif;?>
        </tbody>
    </table>

    <!-- ... rest of your HTML code ... -->
</html>
