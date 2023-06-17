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
    <title>Registro</title>
</head>
<!--Incluimos el encabezado y el registro-backend.php para hacer la parte del backend del formulario de aqui-->
<?php include 'encabezado.php';require 'registro-backend.php';?>
<body>
  <main>
    <div id="formularioLogin1">
      <form action="" method="POST" onsubmit="return validateInputs()"> <!--Comprobamos los inputs con expresiones regulares-->
          <span id="titulosIndex">~ Registro ~</span>   
            <div class="form-group">
              <label for="inputNombre">NOMBRE</label>
              <input class="form-control" id="inputNombre"  placeholder="Introduce tu nombre" name="nombreUser">
              <div id="errorNombre" style="color:red;"></div><!--Este div se muestra en caso de que no cumpla con las expresiones regulares-->
            </div>

            <div class="form-group">
              <label for="inputCorreo">CORREO ELECTRÓNICO</label>
              <input type="email" class="form-control" id="inputCorreo"  placeholder="Introduce tu correo" name="correoUser">
            </div>
            <div id="errorCorreo" style="color:red;"></div><!--Este div se muestra en caso de que no cumpla con las expresiones regulares-->

            <div class="form-group">
              <label for="exampleInputPassword1">CONTRASEÑA</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" name="passUser">
              <div id="textoAyudaEmail">Debe estar formado por 8 caracteres mínimo<br> una mayúscula y una minúscula</div>
            </div>
            <div id="errorPass" style="color:red;"></div><!--Este div se muestra en caso de que no cumpla con las expresiones regulares-->
            
          <br>
          <button type="submit" id="botonARegistro" name="registroEnviar">ENVIAR</button> <!--Botón para su comprobación de campos en la función de validateInput y en lo que conlleva registro-backend.php-->
        </form>
        </div>

  </main>
    <script src="../javascript/index.js"></script>
    <footer>
 <span> &copy; 2023 Le Macià. Todos los derechos reservados.</span>
</footer>
</body>
</html>
