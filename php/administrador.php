<link rel="stylesheet" href="../estilos/style.css">
<?php
//Necesita  conexion.php para la conexion a la base de datos y el encabezado es el común en todas las páginas 
require 'conexion.php';
include 'encabezado.php';
//Iniciamos sesion para comprobar el correo y si no es el de administrador no puede ir a la página y lo devuelve a inicio-sesion.php
//que si no está logeado lo devuelve a login.php
session_start();
if (!isset($_SESSION['correo']) || $_SESSION['correo'] != "admin@gmail.es") {
  header("Location: inicio-sesion.php");
  exit;
}
  //Hago la consulta y con el $conexion query ejecuto el query a la base de datos
  $sql = "SELECT * FROM pedidos ORDER BY idPedido";
  $result = $conexion->query($sql);
  // Comprobar si existen pedidos
  if ($result->num_rows > 0) {
    echo "<main><div id='fondoPedidos'><img src='../imagenes/probando.png'><table id='tablaAdmin'>";
    echo "<tr><th>idPedido</th><th>Producto</th><th>Cant.</th><th>Precio</th><th></th></tr>";
    $total = 0;
    $currentIdPedido = null;

    while ($row = $result->fetch_assoc()) {
        $idPedido = $row["idPedido"];
        if ($idPedido != $currentIdPedido) {
            // Cerrar la fila anterior de la tabla (si existe)
            if ($currentIdPedido !== null) {
                echo "<tr><td colspan='3'><b>Total:</b></td><td>$total €</td><td></td></tr>";
                $total = 0; // Reiniciar el total para el siguiente bloque
            }

            // Iniciar una nueva fila para el idPedido actual
            echo "<tr><td>$idPedido</td></tr>";
            $currentIdPedido = $idPedido;
        }

        // Muestro los detalles del pedido
        $producto = $row["idComida"];
        $cantidad = $row["cantidad"];
        $precio = $row["precio"];
        $idProducto = $row["idProducto"];

        // Obtengo el ID de la tabla "comida" en base al valor de "$producto para saber el nombre del producto"
        $query = "SELECT nombre FROM comida WHERE id = '$producto'";
        $resultProducto = $conexion->query($query); //Le hacemos la consulta a la base de datos
        $rowProducto = $resultProducto->fetch_assoc(); //Obtenemos la fila del resultado
        $idComida = $rowProducto["nombre"]; //Añadimos ese dato de la fila a la variable idComida
        //Mostramos los datos en la tabla
        echo "<tr>";
        echo "<td></td>";
        echo "<td>$idComida</td>";
        echo "<td>$cantidad</td>";
        echo "<td>$precio €</td>";
        //Este es el botón del formulario para ir pasar el dato a eliminar_pedido.php para borrar el producto que ya se ha servido
        echo "<td><form method='post' action='eliminar_pedido.php'><input type='hidden' name='idPedido' value='$idPedido'><input type='hidden' name='idProducto' value='$idProducto'><button type='submit' id='botonAdmin'>X</button></form></td>";
        echo "</tr>";

        // Voy sumando para calcular el total de cada pedido y mostrarlo
        $subtotal = $cantidad * $precio;
        $total += $subtotal;
        
    }

    // Agrego el total al final de la última fila de la tabla
    echo "<tr><td colspan='3'><b>Total:</b></td><td>$total €</td><td></td></tr>";
    echo "</table></div></main>";
}else {
      echo "<main><div id='fondoAdmin'><span id='nadaCarrito'>No se encontraron pedidos.</span></div></main>";
  }

  // Cierro la conexión a la base de datos
  $conexion->close();
  
//}
?>
<!--Termino con el footer y cierro el body y html que se abrieron en el include encabezado.php-->
<footer>
 <span> &copy; 2023 Le Macià. Todos los derechos reservados.</span>
</footer>
</body></html>