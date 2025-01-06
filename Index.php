<?php
 session_start(); 

 include("crud/conexion.php");
 
 // Conexión a la base de datos
 $conexion = conectar();
 
 $sql = "SELECT * FROM notas_alumnos";
 $query = mysqli_query($conexion, $sql);
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/indexstyle.css">
    
    <title>Gestion de Notas</title>
    
</head>
    

        
        
    </div>
    

    
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestion de Notas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="alumnos.php">Notas</a>
                    </li>                
                    
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Banner   -->

    
    <div>
        <img src="img/banner.jpg" class="img-fluid" alt="Banner"  >
    </div>
 
    
   
    <div class="container-fluid mt-5 Display-center">
        <div class="row">
            <!-- Tarjeta 1 -->
            <div class="col-12 col-md-2 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Alumons</h5>
                        <img src="img/tarjeta1.jpg" class="card-img-top" alt="Alumos" >
                        
                    </div>
                </div>
            </div>
            <!-- Tarjeta 1 -->
            <div class="col-12 col-md-2 mb-4">
            
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Notas</h5>
                        <img src="img/tarjeta2.jpg" class="card-img-top" alt="Notas" >
                        
                    </div>
                </div>
            </div>

        </div> 
    </div>  
   

<!-- Carrusel -->
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="img/carrusel1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="img/carrusel2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="img/carrusel3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
            </div>

        </div>
        

    </div>
    

</div>
    
  

     <!-- footer -->
     <footer class="py-5 px-4 mt-5 " >
        <div class="container-fluid" id="footer">        
           <!-- <section id="Links" class="row mb-3"> -->
                <div class="col-12 col-md-4 mb-3">
                    <h3 class="text-center">Conócenos</h3>
                    <ul class="list-unstyled">
                        <li><a href="historia.html" class="text-color-principal text-decoration-none">Nuestra Historia</a></li>
                        <li><a href="contacto.html" class="text-color-principal text-decoration-none">Contáctanos</a></li>
                        <li><a href="equipo.html" class="text-color-principal text-decoration-none">Nuestro Equipo</a></li>
                    </ul>
                </div>
                
                <div class="col-12 col-md-4 mb-3">
                    <h3 class="text-color-principal text-center">Accesos Rápidos</h3>
                    <ul class="list-unstyled">
                        <li><a href="index.html" class="text-color-principal text-decoration-none">Inicio</a></li>
                        <li><a href="alumnos.html" class="text-color-principal text-decoration-none">Notas</a></li>
                        
                    </ul>
                </div>
           
        </div>
        <div class="container-fluid" id="footer">   
             <!--</section> -->

            <section class="Social text-center mb-4 ">
                
                <a href="https://whatsapp.com" class="mx-2"><img src="img/whatssap.jpg" alt="WhatsApp" class="img-fluid img-social"></a>
                <a href="https://instagram.com" class="mx-2"><img src="img/instagram.avif" alt="Instagram" class="img-fluid img-social"></a>
                <a href="https://mail.google.com/" class="mx-2"><img src="img/gmail.jpg" alt="Correo" class="img-fluid img-social"></a>
            </section>
        </div>           
         <div class="text-center">
                <p>&copy; Gestion de Notas 2025. Todos los derechos reservados.</p>
                <p>Plataforma desarrollada para el manejo y control de notas de los Alumons</p>
            </div>
        
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    

</body>
</html>
