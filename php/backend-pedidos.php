<?php
    session_start();
    $idUsuario = $_SESSION['correo']; //Ya que nos manejamos por correo como unique, e id de usuario, pues comprobamos si ha iniciado
    //Si presiona en el botón enviar que está al lado de la cantidad entonces se añadirá a la tabla carrito
        if(isset($_POST['inputCantidad'])){
            require 'conexion.php';//Requerimos de conexión a la base de datos
            $insertPedido = "INSERT INTO carrito (idPedido, idComida, precio, cantidad) VALUES (?, ?, (SELECT precio FROM comida WHERE id = ?), ?)";
            $stmt = $conexion->prepare($insertPedido);
            
            // Asignar los valores a los parámetros de la consulta, es decir s = string , i = int, lo que se introduce es:
            //string string int string.
            $stmt->bind_param("ssis", $idUsuario, $_POST['idArticulo'], $_POST['idArticulo'], $_POST['inputCantidad']);

            // Ejecutar la consulta y redirecciona a la página dependiendo del tipo que sea a la pagina que toca
            $stmt->execute();
            if($_POST['tipo']==1) {
                header("location: http://localhost/Proyecto/php/frontend-comidas.php");
            } else if($_POST['tipo']==2){            
                header("location: http://localhost/Proyecto/php/frontend-bebidas.php");
             } else if($_POST['tipo']==3){
                header("location: http://localhost/Proyecto/php/frontend-postres.php");
             } else if($_POST['tipo']==0){
                header("location: http://localhost/Proyecto/php/frontend-entrantes.php");
             }   
    }
    
  
?>