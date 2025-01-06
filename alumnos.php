<?php
    session_start(); 
    include("conexion.php");
    $con = conectar();

    // Consulta SQL para obtener los datos
    $sql = "SELECT notas_alumnos  FROM alumnos
           
            $filtro_evento 
            ORDER BY participantes.id, evento_participante.fecha_inscripcion";
    $query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/alumnosstyle.css">
    
    <title>Gestion Notas</title>
</head>
<body>

   

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

    <br><br>

    <!---Formularios--->
<div class="container">
    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
    

    <!-- Botón Insertar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-user-plus"></i> Agregar</button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Registro</h1>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3" action="../crud/Crud_Jorge/insertar.php" method="post">
                                    <div class="col-md-6">
                                        <label for="inputname" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="inputname" name="nombre" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ]+" title="Solo se pueden letras" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputemail" class="form-label">Gmail</label>
                                        <input type="email" class="form-control" id="inputemail" name="correo" placeholder="example@gmail.com" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="evento_id" class="form-label">Seleccionar Evento</label>
                                        <select class="form-select" id="evento_id" name="evento_id" required>
                                            <option value="">Seleccione un evento</option>
                                            <?php
                                                $eventos = mysqli_query($con, "SELECT id, tipo_evento FROM gestion");
                                                while ($evento = mysqli_fetch_assoc($eventos)) {
                                                    echo "<option value='{$evento['id']}'>{$evento['tipo_evento']}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputgen" class="form-label">Asistencia</label>
                                        <select id="inputgen" class="form-select" name="estado_asistencia" required>
                                            <option value="Pendiente">Pendiente</option>   
                                            <option value="Presente">Presente</option>
                                            <option value="Ausente">Ausente</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>      
                                </form>    
                            </div>
                        </div>
                    </div>
                </div>  
            </div>

          

            <!-- Tabla -->
            <div class="col-md-12">
                <table class="table table-dark table-bordered">
                    <thead>
                        <tr class="table-info">
                            <th scope="col">Nombre</th>
                            <th scope="col">Nota 1</th>
                            <th scope="col">Nota 2</th>
                            <th scope="col">Nota 3</th>
                            <th scope="col">Promedio</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id_alumno']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['nota_1']; ?></td>
                                <td><?php echo $row['nota_2']; ?></td>
                                <td><?php echo $row['nota_3']; ?></td>
                                <td><?php echo $row['promedio']; ?></td>
                                <td>
                                     <!-- Botón Editar -->
                                        <button 
                                            type="button" 
                                            class="btn btn-warning btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editModal<?php echo $row['id_alumno']; ?>">
                                            Editar
                                        </button>
                                            <!-- Modal Editar -->
                                                <div class="modal fade" id="editModal<?php echo $row['participante_id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $row['participante_id']; ?>" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel<?php echo $row['participante_id']; ?>">Editar Participante</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="../crud/Crud_Jorge/editar.php" method="POST">
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="participante_id" value="<?php echo $row['participante_id']; ?>">

                                                                    <!-- Nombre -->
                                                                    <div class="mb-3">
                                                                        <label for="nombre<?php echo $row['participante_id']; ?>" class="form-label">Nombre</label>
                                                                        <input 
                                                                            type="text" 
                                                                            class="form-control" 
                                                                            id="nombre<?php echo $row['participante_id']; ?>" 
                                                                            name="nombre" 
                                                                            value="<?php echo htmlspecialchars($row['participante_nombre']); ?>" 
                                                                            required>
                                                                    </div>

                                                                    <!-- Correo -->
                                                                    <div class="mb-3">
                                                                        <label for="correo<?php echo $row['participante_id']; ?>" class="form-label">Correo</label>
                                                                        <input 
                                                                            type="email" 
                                                                            class="form-control" 
                                                                            id="correo<?php echo $row['participante_id']; ?>" 
                                                                            name="correo" 
                                                                            value="<?php echo htmlspecialchars($row['participante_correo']); ?>" 
                                                                            required>
                                                                    </div>

                                                                    <!-- Evento -->
                                                                    <div class="mb-3">
                                                                        <label for="evento<?php echo $row['participante_id']; ?>" class="form-label">Evento</label>
                                                                        <select 
                                                                            class="form-select" 
                                                                            id="evento<?php echo $row['participante_id']; ?>" 
                                                                            name="evento_id" 
                                                                            required>
                                                                            <?php
                                                                            $eventos = mysqli_query($con, "SELECT id, tipo_evento FROM gestion");
                                                                            while ($evento = mysqli_fetch_assoc($eventos)) {
                                                                                $selected = $row['evento_id'] == $evento['id'] ? 'selected' : '';
                                                                                echo "<option value='{$evento['id']}' $selected>{$evento['tipo_evento']}</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                     <!-- Botón Eliminar -->
                                        <form action="../crud/Crud_Jorge/eliminar.php" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este participante?');">
                                            <input type="hidden" name="participante_id" value="<?php echo $row['participante_id']; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    <!-- Botón Modificar Asistencia -->
                                        <form action="../crud/Crud_Jorge/modificar_asistencia.php" method="POST" style="display:inline;">
                                            <input type="hidden" name="participante_id" value="<?php echo $row['participante_id']; ?>">
                                            <input type="hidden" name="evento_id" value="<?php echo $row['evento_id']; ?>">
                                            <input type="hidden" name="estado_actual" value="<?php echo $row['estado_asistencia']; ?>">
                                            <button type="submit" class="btn btn-info btn-sm">
                                                Modificar Asistencia
                                            </button>
                                        </form>
                                </td>
                                    
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



    <!-- Exportar -->
    
         <a href="/Proyecto-Final/crud/Crud_Jorge/exportar.php?format=csv&evento_id==<?php echo isset($_GET['evento_id']) ? $_GET['evento_id'] : ''; ?>" class="btn btn-success">
        Exportar CSV
        </a>
        <a href="/Proyecto-Final/crud/Crud_Jorge/exportar.php?format=pdf&evento_id=<?php echo isset($_GET['evento_id']) ? $_GET['evento_id'] : ''; ?>" class="btn btn-danger">
            Exportar PDF
        </a>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybfiPb82b0g3QBXfD0S72JpTx7rAZ2NEzB6F7M0L6f7V9gVJY" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-Q6v/5n32sp2XJ6QpEPOq8NhAyQbxGGG5TxvnmrZolGFZgXYlXis48o5u00F4VfYW" crossorigin="anonymous"></script>



    <!-- footer -->
    <footer class="py-5 px-4 mt-5 bg-dark">
        <div class="container-fluid">        
            <section id="Links" class="row mb-5">
                <div class="col-12 col-md-4 mb-3">
                    <h3 class="text-center">Conócenos</h3>
                    <ul class="list-unstyled">
                        <li><a href="historia.html" class="text-color-principal text-decoration-none">Nuestra Historia</a></li>
                        <li><a href="contacto.html" class="text-color-principal text-decoration-none">Contáctanos</a></li>
                        <li><a href="equipo.html" class="text-color-principal text-decoration-none">Nuestro Equipo</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <h3 class="text-color-principal text-center">Nuestros eventos</h3>
                    <ul class="list-unstyled">
                        <li><a href="eventos-futuros.html" class="text-color-principal text-decoration-none">Próximos Eventos</a></li>
                        <li><a href="torneos.html" class="text-color-principal text-decoration-none">Torneos</a></li>
                        <li><a href="charlas.html" class="text-color-principal text-decoration-none">Charlas y Conferencias</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <h3 class="text-color-principal text-center">Accesos Rápidos</h3>
                    <ul class="list-unstyled">
                        <li><a href="index.html" class="text-color-principal text-decoration-none">Inicio</a></li>
                        <li><a href="faq.html" class="text-color-principal text-decoration-none">Preguntas Frecuentes</a></li>
                        <li><a href="privacidad.html" class="text-color-principal text-decoration-none">Políticas de Privacidad</a></li>
                        <li><a href="terminos.html" class="text-color-principal text-decoration-none">Términos y Condiciones</a></li>
                    </ul>
                </div>
            </section>
            <section class="Social text-center mb-4">
                <a href="https://facebook.com" class="mx-2"><img src="../img/face.png" alt="Facebook" class="img-fluid img-social"></a>
                <a href="https://whatsapp.com" class="mx-2"><img src="../img/wsp.png" alt="WhatsApp" class="img-fluid img-social"></a>
                <a href="https://instagram.com" class="mx-2"><img src="../img/instagram.png" alt="Instagram" class="img-fluid img-social"></a>
                <a href="https://tiktok.com" class="mx-2"><img src="../img/tiktok.png" alt="TikTok" class="img-fluid img-social"></a>
                <a href="mailto:info@expo.com" class="mx-2"><img src="../img/correo.png" alt="Correo" class="img-fluid img-social"></a>
            </section>
            <div class="text-center">
                <p>&copy; 2024 ExpoGame. Todos los derechos reservados.</p>
                <p>Gracias por ser parte de nuestra comunidad gamer y tecnológica. ¡Nos vemos en el próximo evento!</p>
            </div>
        </div>
    </footer>

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>