
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
                        
                        <li class="nav-item"><a class="nav-link" href="list_pecasc.php">Todos Itens</a></li>
                        <li class="nav-item"><a class="nav-link" href="cadastrar.php">Cadastrar Peças</a></li>
                        <li class="nav-item"><a class="nav-link" href="calendar.php">Calendario</a></li>

                        
                    </ul>
                   <form class="d-flex ">
                    <a href="carrinho.php" > <button  class="btn btn-outline-dark" type="button" >
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
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

                       <!--carrousel --> 


                       <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner ">
  <div class="carousel-item active">
      <img src="_img/car1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="_img/bmw.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="_img/car2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  
   
  </div>
</div>

                           <!--fim carrousel --> 
          
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
          

        <section class="py-5 bg-light">
        <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="_img/RODA.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Roda de diversos Tipos</h5>
        <p class="card-text">Melhores rodas do Mercado</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="_img/MOTOR.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Motores</h5>
        <p class="card-text">Encontre tudo para seu motor</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="_img/SUSP.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Suspensões</h5>
        <p class="card-text">Suspensões de diversas marcas </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="_img/ace.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Acessorios</h5>
        <p class="card-text">Acessorios em geral para seu carrão</p>
      </div>
    </div>
  </div>
</div>
        </section>


        <section  class="py-5 bg-light">

        <div class="card text-bg-dark">
  <img src="_img/peç.png" class="card-img" alt="...">
  <div class="card-img-overlay">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small>Last updated 3 mins ago</small></p>
  </div>
</div>
        </section>





        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        
            <a class="nav-link active" aria-current="page" href="login.php">Deslogar</a>
        
        </footer>

        

    
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
