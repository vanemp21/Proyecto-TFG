<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/style.css">
    <script src="../javascript/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="../estilos/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../estilos/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>
<body>
<?php include 'encabezado.php';?>
      <main>
        <div class="fondoFormulario">
          <div id="formularioLogin">
          <!--Formulario que al pulsarlo hará comprobaciones si todo es válido con la función validarFormulario() y llevará esos datos a inicio-sesion.php -->
          <form action="inicio-sesion.php" method="POST" onsubmit="return validarFormulario()">
              <span id="titulosIndex">~ INICIAR SESIÓN ~</span>
              <div class="form-group" id="formularioSesion1">
                <label for="inputCorreo"><p>CORREO ELECTRÓNICO</p></label>
                <input type="email" class="form-control" id="inputCorreo" aria-describedby="emailHelp" placeholder="Introduce tu correo" name="correoUser">
             </div>
            <div id="mensajeError1"></div><!--Div que mostrará el error con un InnerHtml en caso de haberlo-->

           <div class="form-group" id="formularioSesion2">
              <label for="inputContrasenya"><p>CONTRASEÑA</p></label>
              <input type="password" class="form-control" id="inputContrasenya" placeholder="Contraseña" name="passUser">
          </div>
          <div id="mensajeError"></div><!--Div que mostrará el error con un InnerHtml en caso de haberlo-->
          
          <button type="submit"  name="logearBoton" id="enviarLogin">ENVIAR</button> <!--Botón para el submit del formulario que hará llevar los datos a login-backend.php-->
          <button type="submit"  id="botonARegistro"><a href="registro.php">REGÍSTRATE</a></button> <!--Simple botón que redirige a registro.php-->
        </form>
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
