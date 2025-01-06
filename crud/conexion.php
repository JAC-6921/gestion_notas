<?php
function conectar(){
    $server = "localhost";
    $user = "root";
    $pass="";
    $db = "alumnos";

    $con=mysqli_connect($server,$user,$pass,$db);

    mysqli_select_db($con,$db);
    if (!$con) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    return $con;
}
?>
