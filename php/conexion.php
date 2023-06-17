<?php
$host = "localhost";
$usuario = "root";
$clave="";
$bd="restaurante-macia";
$conexion = mysqli_connect($host,$usuario,$clave,$bd);
if(!$conexion){
    echo "Conexión fallida";
}
?>