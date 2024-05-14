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
    $quantidade = $_POST['quantidade'];
    $dataCadastro = $_POST['dataCadastro'];
    $imagem = $_FILES['imagem']['name'];

    // Validate user input
    if (empty($nomePeca) || empty($fornecedor) || empty($valorCompra) || empty($valorVenda) || empty($dataCadastro) || empty($quantidade) || empty($imagem)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Upload image
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($imagem);
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);

    // Prepare and execute query
    $sql = "INSERT INTO Pecas (nomePeca, fornecedor, valorCompra, valorVenda, quantidade, dataCadastro, imagem) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssddss", $nomePeca, $fornecedor, $valorCompra, $valorVenda, $quantidade, $dataCadastro, $target_file);
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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
                        
                        
                    </ul>
                    <form class="d-flex">
                    <a href="carrinho.php"> <button  class="btn btn-outline-dark" type="button" >
                            <i class="bi-cart-fill me-1"></i>
                            Carrinho
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button> </a>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">AutoPeças a firma</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Encontre aki a peça para seu Carro</p>
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

                    <!-- retorno do banco de dados-->
                    <?php

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$stmt = $conn->prepare("SELECT id, nomePeca, valorVenda, quantidade, imagem FROM Pecas");
$stmt->execute();
$result = $stmt->get_result();

$conn->close();
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Quantidade</th>
            <th>Imagem</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result->num_rows > 0) :?>
            <?php while ($row = $result->fetch_assoc()) :?>
                <tr>
                    <td><?= $row['id']?></td>
                    <td><?= $row['nomePeca']?></td>
                    <td><?= $row['valorVenda']?></td>
                    <td><?= $row['quantidade']?></td>
                    <td><img src="<?= $row['imagem']?>" alt="Imagem da peça" width="100"></td>
                    <td><button onclick="sendData(<?= $row['id']?>)" class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Adicione ao carrinho
                        </button></td>
                </tr>
            <?php endwhile;?>
        <?php else :?>
            <tr>
                <td colspan="5">0 results</td>
            </tr>
        <?php endif;?>
    </tbody>
</table>
                   
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
function sendData(id) {
    // Redireciona para outra página com o ID da peça como um parâmetro de URL
    window.location.href = 'carrinho.php?id=' + id;
}
</script>
        
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



 

   