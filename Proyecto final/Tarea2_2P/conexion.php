<?php
// conexion com My Sql
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "Floreria");

if ($con->connect_error) {   
    die("Connection failed: " . $con->connect_error);
    // die imprime y sale del script
}

echo "Conexion exitosa...";

?>
