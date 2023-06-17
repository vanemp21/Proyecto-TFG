<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<?php
require 'conexion.php';
echo "<title>Carrito</title>"; //Pongo aqui el title porque el encabezado.php ya contiene todo excepto el title
require 'encabezado.php';
require 'registro-backend.php';
require 'insertar_pedido.php';


//Comprobamos si está logeado mediante el correo, si no lo redireccionamos a login.php para que se logee
if (!isset($_SESSION['correo'])) {
  header("Location: login.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Verificar si se ha enviado el formulario
  
  // Esto es la X que aparece en el carrito por si quieres borrar algún producto que no quieras comprar
  if (isset($_POST["idProducto"])) {
    $idProductoAEliminar = $_POST["idProducto"];

    // Hace la consulta y ejecuta el query para borrarlo de la tabla carrito
    $sqlEliminacion = "DELETE FROM carrito WHERE idProducto = $idProductoAEliminar";
    $conexion->query($sqlEliminacion);
  }
}

$idUsuario = $_SESSION['correo']; //Obtenemos el correo que es por lo que nos ceñimos a buscar los pedidos al ser unique

// Resto del código para mostrar la tabla
$sql = "SELECT * FROM carrito WHERE idPedido = '$idUsuario'"; //La consulta
$resultado = $conexion->query($sql); //La ejecución de la query a la base de datos

if ($resultado->num_rows > 0) { //Si existen resultados con ese correo, muéstramelo a continuación (es una tabla), empezamos con los tr
  $total = 0; //Iniciamos cada pedido el total en 0 para ir sumando y luego mostrar el total
  echo "<main><div id='fondoPedidos'>";
  echo "<img src='../imagenes/probando.png'>";
  echo "<form action='' method='post'><table id='tablaCarrito'><tr><th>Comida</th><th>Precio</th><th>Cantidad</th><th>PrecioXCant</th><th></th></tr>";
  while ($fila = $resultado->fetch_assoc()) {
        $idComida = $fila['idComida']; //Cada producto tiene una id, asique la tomamos para luego hacer otro query para buscar el nombre en base a esa ID
        $sqlComida = "SELECT nombre FROM comida WHERE id = $idComida"; //Hacemos la consulta
        $resultadoComida = $conexion->query($sqlComida); //Ejecutamos el query
        $nombreComida = ""; //Inicializamos la variable sin nada para luego rellenarla con el nombre encontrado
         if ($resultadoComida->num_rows > 0) { //Mientras hayan resultados
          $filaComida = $resultadoComida->fetch_assoc(); //Dame el resultado de esa id 
          $nombreComida = $filaComida['nombre']; //El resultado insertalo en la variable que hemos inicializado antes
        }
    //Mostramos todos los td de la tabla con los datos que pedimos
    echo '<tr>
    <td>'.$nombreComida.'</td>
    <td>'.$fila['precio'].'€</td>
    <td>'.$fila['cantidad'].'</td>
    <td>'.$fila['cantidad'] * $fila['precio'].'€</td>
    <td><button type="submit" id="botonBorrarProducto" name="idProducto" value="'.$fila["idProducto"].'">X</button></td>
    </tr>';
    $subtotal = $fila['cantidad'] * $fila['precio']; //Es la multiplicación del producto x cantidad
    $total += $subtotal; //Lo añadimos al total
  }
  echo "</table></form>";
  echo "</div>"; //Mostramos el total

  
  // Botón para insertar los datos en la tabla "pedidos" y que al cliente se le borre, esto es al "Realizar el pedido" del carrito

  echo '<div id="botonesPedidoCarrito">';
  echo "<div id='totalPrecio'>Total: ".$total."€</div>";
  echo '<form action="" method="post">';
  echo '<button type="submit" name="insertarPedido" id="insertarPedido">Realizar pedido</button>';
  echo '</form>';
  echo '<button id="ticketPedido"><a href="fpdf.php">Ticket</a></button>'; //Puedes generar un pdf con el resumen de tu compra (Tras 2h averiguando porqué no iba resulta que solo Edge Microsoft permite el uso de esta librería)
  echo '</div>';
  echo "</main>";
} else {

  echo "<div id='fondoPedidos'><span id='nadaCarrito'>No tienes nada en el carrito</div></div></main>"; //Esto se muestra en caso de que no haya nada en el carrito
}
?>
<!--Termino con el footer y cierro el body y html que se abrieron en el include encabezado.php-->
   <footer>
    <span> &copy; 2023 Le Macià. Todos los derechos reservados.</span>
   </footer>
  </body>
</html>