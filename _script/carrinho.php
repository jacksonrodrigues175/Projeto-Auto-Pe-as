<!-- cadastrar_pecas.php -->

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

// Close connection
$conn->close();
?>





<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>AutoPeças A Firma</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">A firma Auto Peças</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="indexuser.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="list_pecas.php">Todos Itens</a></li>
                        
                    </ul>
                
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-6 fw-bolder">aki esta seu carrinho <i class="bi-cart-fill me-1"></i> </h1>
                    <p class="lead fw-normal text-white-50 mb-0"> A firma Auto Peças </p>
                
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            
                            
       
                    
                        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

                        <!-- ---------------- -->
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

// Get the part ID from the URL
if (isset($_GET['id'])) {
    $idPeca = $_GET['id'];

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT * FROM Pecas WHERE id = ?");
    $stmt->bind_param("i", $idPeca);
    $stmt->execute();
    $result = $stmt->get_result();

    // Output data of the part
    if ($row = $result->fetch_assoc()) {
        echo "<div class='container'>";
        echo "<h3>". $row["nomePeca"]. "</h3>";
        echo "<p><strong>ID:</strong> ". $row["id"]. "</p>";
        echo "<p><strong>Valor:</strong> ". $row["valorVenda"]. "</p>";
        echo "<img src='". $row["imagem"]. "' alt='Imagem da peça' class='img-thumbnail'>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger'>Nenhuma peça encontrada com o ID: " . $idPeca . "</div>";
    }
}

// Close connection
$conn->close();
?>




    <!-- Include listar_pecas.php -->
    
          
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>

        
    <script>
        function calculateTotal() {
            var valorVenda = document.getElementById('valorVenda').value;
            var qtde = document.getElementById('qtde').value;
            var total = valorVenda * qtde;
            document.getElementById('total').value = total;
        }
    </script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
