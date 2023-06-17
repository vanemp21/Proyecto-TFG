<?php
require 'conexion.php';
//Si pulsa el boton de registroEnviar, recopilará datos en las variables
if (isset($_POST['registroEnviar'])) {
    $nombre = $_POST['nombreUser'];
    $correo = $_POST['correoUser'];
    $contra = $_POST['passUser'];
    //Comprueba si está vacío y si tiene una mayúscula, contiene un número y tiene una longitud mínima de 8 caracteres
    if (empty($correo) || empty($contra) || !preg_match('/^(?=.*[A-Z])(?=.*[a-z]).{8,}$/', $contra)) {
        // Manejar otros casos de error aquí si es necesario
    } else {
        // Verifica si el correo ya existe
        $consulta = "SELECT correo FROM registro WHERE correo = ?";
        $stmt = $conexion->prepare($consulta); //Hacemos la consulta
        $stmt->bind_param("s", $correo); //El correo es un string
        $stmt->execute(); //La ejecutamos
        $stmt->store_result(); //Lo guardamos en la variable stmt
        
        if ($stmt->num_rows > 0) { //Si $stmt tiene alguna fila, entonces mostrará un error
            // El correo ya existe, mostrar mensaje de error
            echo "<script>$('#errorCorreo').html('Error, correo ya existente');event.preventDefault();
            </script>";
        } else {
            // Si el correo no existe, se realiza la introducción de datos a la base de datos
            $sql = "INSERT INTO registro (nombre, correo, pass) VALUES (?, ?, ?)";
            $stmt = $conexion->prepare($sql); //Hacemos la consulta a la base de datos
            $stmt->bind_param("sss", $nombre, $correo, $contra); //Se ejecuta la consulta, 3 strings que son el nombre, correo y contraseña
            
            if ($stmt->execute() === TRUE) { //Si se ha ejecutado entonces nos mandará a login.php, si no saldrça un error
                header("Location: login.php");
            } else {
                echo "Error al insertar el registro: " . $conexion->error;
            }
        }
        $stmt->close(); //Liberamos memoria cerrando la consulta
    }
    $conexion->close(); //Cerramos la base de datos
}
?>