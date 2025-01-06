<?php
include("conexion.php");
$con = conectar();

$id = $_POST['id'];
$Nombre=$_POST['nombre'];
$Gmail=$_POST['correo'];
$Id_Evento=$_POST['evento_id'];
$asistencia=$_POST['estado_asistencia'];


$stmt = $con->prepare("UPDATE participantes SET Nombre=?, correo=?, evento_id=?, estado_asistencia=? WHERE id=?"); //la función prepare() se usa para preparar una sentencia SQL para su ejecución.
$stmt->bind_param("ssssi", $Nombre, $Gmail, $Id_Evento, $asistencia, $id);
// bind_param(...):Esta función asocia las variables de PHP con los placeholders ? en la sentencia SQL preparada. Es decir, le dice a la base de datos qué valor debe ir en cada ?.
if ($stmt->execute()) {
    Header("Location: /Proyecto-Final-main/Proyecto-Final/DashBoard/Participantes.php?success1=1");
} else {
    echo "<div class='alert alert-danger'>Error al actualizar el usuario.</div>";
}
?>
