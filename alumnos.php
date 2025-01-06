<?php
    session_start(); 
    include("crud/conexion.php");
    $con = conectar();

    // Consulta SQL para obtener los datos
    $sql = "SELECT id_alumno, nombre, nota_1, nota_2, nota_3   FROM notas_alumnos";
    $query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/alumnostyle.css">
    
    <title>Gestion de Notas</title>
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
    <div class="conteiner mt-5" style="justify-items: center; max-width: 400px;">
            <div class="card ">
                <div class="card-body " >
                    <form action="procesar_registro.php" method="post"> 
                        <div class="row">
                            <div class="col-12" style="justify-content: center; color: white; background-color:blue ">
                                <h1>Registro</h1>
                            </div>
                        </div>
                        
                        <div class="row mt-5">
                            <div class="col">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" required>
                            </div>
                            <div class="col">
                                <label for="nota_1">Nota 1:</label>
                                <input type="text" id="nota_1" name="nota1" required>
                            </div>
                            <div class="col">
                                <label for="nota_2">Nota 2:</label>
                                <input type="text" id="nota_2" name="nota1" required>
                            </div>
                            
                            <div class="col">
                                <label for="nota_3">Nota_3:</label>
                                <input type="text" id="nota_3" name="nota3" required>
                            </div>
                            
                            
                                
                           
                                
                                <button type="submit" class="btn btn-primary">Registrar</button>
                                
                                
                            </div>
                           
                        </div>
                  
                        
                    </form>
                </div>
            </div>    
        </div>
           
    </div>
    </div>
    


<!-- Tabla -->
 <div class="container-fluid"></div>
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
                                        <form action="../crud/eliminar.php" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este participante?');">
                                            <input type="hidden" name="participante_id" value="<?php echo $row['participante_id']; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    <!-- Botón Modificar -->
                                        <form action="../crud/modificar_asistencia.php" method="POST" style="display:inline;">
                                            <input type="hidden" name="id_alumno" value="<?php echo $row['id_alumno']; ?>">
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

   

    

    

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>