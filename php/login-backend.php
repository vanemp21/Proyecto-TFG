<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<script src="../javascript/index.js"></script>
<?php
require 'conexion.php'; //Necesitamos iniciar la conexión a la base de datos
//Si pulsa el botón logearBoton,  se recopila los posts del correo y pass
if(isset($_POST['logearBoton'])){
    $correo = $_POST['correoUser'];
    $pass = $_POST['passUser'];
    //Se hace la consulta del correo y pass insertados en los inputs
    $sql = "SELECT correo,pass FROM registro WHERE correo = \"$correo\" AND pass = \"$pass\""; 
    $result = mysqli_query($conexion, $sql); //Se ejecuta la consulta en la base de datos
    if (mysqli_num_rows($result) > 0) { //Si existe ese registro entonces:
         //Hacemos la consulta para cambiar a la persona en la tabla login a conectado, que es el valor 1
         $correos = mysqli_real_escape_string($conexion, $correo);
         $sql = "INSERT INTO login (correo, conectado) VALUES ('$correo', '1')
         ON DUPLICATE KEY UPDATE conectado = 1";
        //Ejecutamos la consulta a la base de datos
         $resultado = mysqli_query($conexion, $sql);

         //Hacemos la consulta para pillar el nombre de la persona para despues poder usarla
         $sql2 = "SELECT nombre FROM registro WHERE correo = \"$correo\"";
         //Ejecutamos la consulta a la base de datos
         $resultado2 = $conexion->query($sql2);
             if ($resultado2->num_rows > 0) { //Si existe la fila entonces
             $fila2 = $resultado2->fetch_assoc(); //$fila2 se convierte en la fila
             $pronombre = $fila2['nombre']; //Entonces guardamos la variable del nombre
             session_start(); //Starteamos sesion para rellenar datos de sesion para empezar a trabajar con ellos
             $_SESSION['nombreCliente'] = $pronombre;
             $_SESSION['correo'] = $correo;
             header("Location: inicio-sesion.php"); //Lo mandamos a inicio-sesion que solo podrá ir una vez haya pillado esas 2 sesiones
             exit;
             } 
    }
}
?>