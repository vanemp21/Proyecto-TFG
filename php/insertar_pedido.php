<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../javascript/index.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<html><body></body></html>
<?php
require 'conexion.php'; // Archivo de conexión a la base de datos
//Inicio sesion y compruebo si al iniciar existe correo, si no existe esque no ha iniciado sesión y lo mando a login.php
session_start();
if (!isset($_SESSION['correo'])) {
  header("Location: login.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { //Como hay un require de este .php a carrito.php , pues al comprobar que se ha enviado los datos del formulario
  if (isset($_POST["insertarPedido"])) { //Si ha apretado el boton de insertar Pedido que significa que le ha dado a Realizar pedido del carrito que tenía
    
    $idUsuario = $_SESSION['correo']; //Obtenemos la id del usuario

    // Ahora obtenemos todos los datos de esa id del carrito"
    $sql = "SELECT * FROM carrito WHERE idPedido = '$idUsuario'";
    $resultado = $conexion->query($sql); //Ejecutamos la consulta

    if ($resultado->num_rows > 0) { //Si existen datos entonces añadimos esos datos a las variables
      
      while ($fila = $resultado->fetch_assoc()) {
        $idComida = $fila['idComida'];
        $cantidad = $fila['cantidad'];
        $precio = $fila['precio'];

        // Hacemos la consulta e insertamos los datos en la tabla "pedidos" para que el admin pueda ver/borrar los pedidos para realizarlos
        $sqlInsercion = "INSERT INTO pedidos (idPedido,idComida, cantidad, precio) VALUES ('$idUsuario','$idComida', '$cantidad', '$precio')";
        $conexion->query($sqlInsercion);
      }

      // Al realizar la compra, ya no hay lista de carrito, pasa a ser lista de admin nada mas, por lo tanto se hace la consulta para borrar "
      $sqlEliminacion = "DELETE FROM carrito WHERE idPedido = '$idUsuario'";
      $conexion->query($sqlEliminacion); //Ejecución para borrarlo
      
      
      //Mostrará una ventana emergente con la libreria Swal de javascript cuando se cumpla que dirá pedido realizado
      echo "<script>
      Swal.fire({
        title: 'Compra realizada',
        text: '¡Tu compra será revisada!',
        icon: 'success',
        confirmButtonText: 'Aceptar',
        customClass: {
          container: 'miContainerswal',
          title: 'miTituloswal',
          text: 'miTextoswal',
          confirmButton: 'miConfirmacionswal'
        }
      });
    </script>";
      
    } 
  }
}
?>
