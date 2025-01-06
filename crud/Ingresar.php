<?php
include("conexion.php");
$con = conectar();

$Nombre = $_POST['nombre'];
$nota_1 = $_POST['nota_1'];
$Id_Evento = $_POST['evento_id']; // Se usará como evento inicial obligatorio
$asistencia = $_POST['estado_asistencia'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si el participante ya existe
    $sql_check = "SELECT id, evento_id FROM participantes WHERE correo = '$Gmail'";
    $query_check = mysqli_query($con, $sql_check);

    if (mysqli_num_rows($query_check) > 0) {
        // El participante existe, obtenemos su id y evento_id
        $row = mysqli_fetch_assoc($query_check);
        $participante_id = $row['id'];
        $evento_actual = $row['evento_id'];

        // Verificar si el evento es diferente
        if ($evento_actual != $Id_Evento) {
            // El participante ya existe pero el evento es diferente, agregamos la relación al nuevo evento
            $sql_insert_evento = "INSERT INTO evento_participante (evento_id, participante_id, estado_asistencia) 
                                  VALUES ('$Id_Evento', '$participante_id', '$asistencia')";
            $query_insert_evento = mysqli_query($con, $sql_insert_evento);

            if ($query_insert_evento) {
                header("Location: /Proyecto-Final/DashBoard/Participantes.php?success=1");
                exit;
            } else {
                die("Error al asociar participante con nuevo evento: " . mysqli_error($con));
            }
        } else {
            // El participante ya está en el evento, no hacer nada
            header("Location: /Proyecto-Final/DashBoard/Participantes.php?error=evento_existente");
            exit;
        }
    } else {
        // El participante no existe, insertamos un nuevo participante
        $sql_insert_participante = "INSERT INTO participantes (nombre, correo, evento_id, estado_asistencia) 
                                    VALUES ('$Nombre', '$Gmail', '$Id_Evento', '$asistencia')";
        $query_insert_participante = mysqli_query($con, $sql_insert_participante);

        if ($query_insert_participante) {
            $participante_id = mysqli_insert_id($con); // Obtener el ID generado para el participante

            // Insertar la relación evento-participante
            $sql_insert_evento = "INSERT INTO evento_participante (evento_id, participante_id, estado_asistencia) 
                                  VALUES ('$Id_Evento', '$participante_id', '$asistencia')";
            $query_insert_evento = mysqli_query($con, $sql_insert_evento);

            if ($query_insert_evento) {
                header("Location: /Proyecto-Final/DashBoard/Participantes.php?success=1");
                exit;
            } else {
                die("Error al asociar participante con evento: " . mysqli_error($con));
            }
        } else {
            die("Error al insertar participante: " . mysqli_error($con));
        }
    }
}
?>
