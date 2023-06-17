<link rel="stylesheet" href="../estilos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../javascript/index.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>


<?php
require 'conexion.php';
//Iniciamos la sesion para después recopilar datos de sesión
session_start();  

//Hacemos la consulta a la base de datos, que nos viene el dato de $comida de las páginas frontend-comidas.php, frontend-entrantes.php, frontend-bebidas.php, frontend-postres.php
$Tcomida=$conexion->query($comida);
?>

<div class="menu-comida">
<br>
<span id="titulosIndex">~ MENÚ ~</span>
<?php
//Esto simplemente muestra los items de la db en la pagina, se puede añadir mas items en la db que no afecta visualmente
$idComida="0"; //Inicializamos la variable idComida para luego darle un valor y en base a ese valor mostrarlo
    echo '<div class="productoMostrado">';
    while($Mcomida=$Tcomida->fetch_array(MYSQLI_BOTH)){
        echo '
        <form action="'.'" method="post">
            <div class="pr'.$Mcomida['id'].'">
                <button type="submit" name='.$Mcomida['id'].' class="clickComida" id="clickComida">
                    <div name='.$Mcomida['id'].' class="producto-'.$Mcomida['id'].'" id="producto-'.$Mcomida['id'].'" >
                        <img src="'.$Mcomida['imagen'].' "width="60px" height="60px">
                        <span id="eltexto">'.$Mcomida['nombre'].'</span>
                    </div>                        
                </button>
            </div>
       </form>';
       if(isset($_POST[$Mcomida['id']])){ //Si pulsan el botón del producto que aparece, entonces recopila esos datos en esas variables
            $idComida = $Mcomida['id'];
            $tipo = $Mcomida['tipo'];
       }
    }
    echo '</div>';

    
    $consulta = "SELECT * FROM comida WHERE id = $idComida"; //La consulta que queremos hacer, de buscar la comida por su id
    $resultado = mysqli_query($conexion, $consulta); //Ejecutamos la consulta en la base de datos
    $fila = mysqli_fetch_assoc($resultado); //Guardamos esa fila en la variable
   //Si esta conectado se muestra el boton de Enviar y el input de cantidad, ya que si no está logeado no puede comprar
    if(isset($_POST[$idComida])){
        if (session_status() === PHP_SESSION_ACTIVE) {
            //Si está iniciado como usuario, entonces muestra los datos con el boton para comprar
            if(isset($_SESSION['boleano'])){
                echo '<div id="cuadrado" style="display:block;"><div onclick="xCerrar()"><span><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                </svg></i></span></div>
                <div id="cuadradoComida">
                <div id="imagenComida"><img src="'.$fila['imagen'].' width="120px" height="140px" "></div>
                <div id="nombreComida">'.$fila['nombre'].'</div>
                <div id="descripcionComida">'.$fila['descripcion'].'</div>
                <div id="precioComida">'.$fila['precio'].'€</div> 
                <div id="botonComida" style="display:block;"><form action="backend-pedidos.php" method="post" onsubmit="return delaySubmit(event)">
                <input type="hidden" id="idArticulo" name="idArticulo" value="'.$idComida.'">
                <input type="hidden" id="tipo" name="tipo" value="'.$tipo.'">
                <input type="number" id="inputCantidad" name="inputCantidad" min="1" max="15" value="1"><button type="submit" onclick="mensajeCarrito()" id="cantidadComida" name="aniadirComida">Añadir</button></form></div>
                </div></div>
                ';
                //Si no, mostrará el recuadro del producto, precio y descripción pero no puede comprarlo
            }else{
                echo '<div id="cuadrado" style="display:block;"><div onclick="xCerrar()"><span><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                </svg></i></span></div>
                <div id="cuadradoComida">
                <div id="imagenComida"><img src="'.$fila['imagen'].' width="120px" height="140px" "></div>
                <div id="nombreComida">'.$fila['nombre'].'</div>
                <div id="descripcionComida">'.$fila['descripcion'].'</div>
                <div id="precioComida">'.$fila['precio'].'€</div> 
                <div id="botonComida" style="display:none;"><form action="backend-pedidos.php" method="post">
                <input type="hidden" id="idArticulo" name="idArticulo" value="'.$idComida.'">
                <input type="hidden" id="tipo" name="tipo" value="'.$tipo.'">
               <input type="number" id="inputCantidad" name="inputCantidad" min="1" max="15" value="1"><button type="submit" id="cantidadComida" name="aniadirComida">Enviar</button></form></div>
               </div></div>';
            }
        }        
    }
?>
</div>




