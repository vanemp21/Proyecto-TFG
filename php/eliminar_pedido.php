<?php
//Iniciamos la conexión a la base de datos
require 'conexion.php';
//Si hemos recibido respuesta del formulario mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPedido = $_POST["idPedido"]; //El idPedido recopilado de idPedido mediante el post
    $producto = $_POST["idProducto"]; //El idProducto recopilado mediante el metodo post
   
    //Borramos de la base de datos de la tabla pedidos donde esté la idPedido y idProducto que nos ha generado el botón del formulario de administrador.php
    $sql = "DELETE FROM pedidos WHERE idPedido = '$idPedido' AND idProducto = '$producto'";
    //Si se borra correctamente nos redirecciona a administrador.php
    if ($conexion->query($sql) === TRUE) {
        header("Location: administrador.php");
    } else {
    //Si no, saldrá un error
        echo "Error al eliminar el registro: " . $conexion->error;
    }
 
    exit;
    $conn->close();
}
?>