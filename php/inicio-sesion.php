<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--Añado el título porque va el encabezado aquí para que se modifique--> 
<title>Inicio Sesión</title>
<?php require 'inicio-sesion-backend.php';include 'encabezado.php';?>
<main>
  <div class="fondoFormulario">
      <div id="formularioLogin">
       <!--Aquí muestra el formulario de inicio-sesion, que va despues de login.php, donde están los botones datos, carrito o cerrar sesión, el echo nombre viene de inicio-sesion-backend, que recopila el nombre del usuario-->
        <form action="" method="POST"><small><span id="titulosIndex2">Bienvenido/a <?php echo $nombre;?></span></small>
        <div id="botonesSesion">  
          <button  id="botonHideSesion1"  name="misDatos">Mis datos</button> 
          <button id="botonHideSesion2" name="miCarrito" class="botonHideSesion2"><a href="carrito.php">Mi carrito</a>
          </button><br><button id="botonHideSesion3" name="cerrarSesion">Cerrar Sesión</button>
        </form>
        </div>
        <!--Esto es que si entra con la cuenta de administrador, a él en vez de carrito le sale administrar y le redirige a administrar.php-->
        <?php
                if($verdadero){
                  echo "<script>
                  const botonHideSesion2 = document.getElementById('botonHideSesion2');
                  const enlaceBoton = botonHideSesion2.querySelector('a');
                  enlaceBoton.href = 'administrador.php';
                  enlaceBoton.innerHTML = 'Administrar';
                  </script>";
                }
        ?>
      </div>
  </div>
</main>
    <script src="../javascript/index.js"></script>
<!--Termino con el footer y cierro el body y html que se abrieron en el include encabezado.php-->
<footer>
 <span> &copy; 2023 Le Macià. Todos los derechos reservados.</span>
</footer>
</body>
</html>
