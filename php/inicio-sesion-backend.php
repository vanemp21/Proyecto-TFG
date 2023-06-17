<?php 
require 'login-backend.php';
require 'conexion.php';
//Aquí inicio sesión porque si no está logeado lo manda a login.php
session_start();
if (!isset($_SESSION['correo'])) {
  header("Location: login.php");
  exit;
}
//Obtengo los datos necesarios de la sesion añadiéndolas a las variables
$correo = $_SESSION['correo'];
$nombre = $_SESSION['nombreCliente'];

//Esta sesión es la que si es true, es la que va a permitir ver el boton de Enviar, para comprar un producto
$_SESSION['boleano'] = true;
//Con esta variable permitimos saber si es admin o no y en inicio-sesion.php si está en true se ve el botón de administrar
$verdadero = false;
if($correo === "admin@gmail.es"){
$verdadero = true;
}
//El botón de cerrar sesión, que si lo pulsan se va a ejecutar la función de mensajeCerrarSesion que es de una libreria de javascript para una ventana emergente.
  if(isset($_POST['cerrarSesion'])){
    echo "<div id='bocadillo'>
           <div id='botonCierre'>   
           </div>
          </div>
    <script> mensajeCerrarSesion(); setTimeout(function() {  window.location.href = 'login.php'; }, 3000);</script>"; //Una vez salga la ventaja se redirige a los 3 segundos a login.php
    $_SESSION['boleano'] = false; //Al cerrar sesión ya no podrá ver el botón de comprar en comida, bebida, entrante, postre
    //Además en la tabla login que es donde se ve quien esta logeado se pondrá en 0, que 1 significa que esta conectado y 0 desconectado
    $conectado = "INSERT INTO login (correo, conectado) VALUES ('$correo', '0')
    ON DUPLICATE KEY UPDATE conectado = 0";
    $conexion->query($conectado); //Se ejecuta la consulta
    session_destroy(); //Se destruye la sesión

    }else if(isset($_POST['misDatos'])){ //Si pulsa en el boton misDatos se mostrará un recuadro con su id, nombre y correo con el que se conecta
      $sql = "SELECT id,nombre,correo FROM registro WHERE correo = '$correo'"; //Se hace la consulta
      $result = $conexion->query($sql); //Se ejecuta la consulta
      echo "<div id='bocadillo' style='display:block;'><div id='botonCierre'>
      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-square-fill' viewBox='0 0 16 16'>
      <path d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z'/>
      </svg></div><span>";
      //Si existen resultados, entonces se mostrará
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $id = $row['id'];
          $nom = $row['nombre'];
          $cor = $row['correo'];
          echo "<div id='tarjetaDatos'>";
          echo "<div id='tituloBocadillo'class='gridBocadillo'>ID:</div> <div id='idResultado' class='gridBocadillo'> ".$id."</div>";
          echo "<div id='tituloBocadillo' class='gridBocadillo'>Nombre: </div><div id='nombreResultado' class='gridBocadillo'> ".$nom."</div>";
          echo "<div id='tituloBocadillo' class='gridBocadillo'>Correo: </div><div id='correoResultado' class='gridBocadillo'> ".$cor."</div>";
          echo "</div>";
        }
      }
      echo "</span></div>";
    }
?>