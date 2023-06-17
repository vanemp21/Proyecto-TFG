<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/style.css">
    <script src="javascript/jquery-3.6.4.min.js"></script>
   
    <link rel="stylesheet" href="estilos/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script src="estilos/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Inicio</title>
    <script src="javascript/index.js"></script>
</head>

<body>
<header>
<div class="main-content">

     <div class="menu-principal">
     <a href="php/inicio-sesion.php"><i class="fas fa-user fa-2x"></i></a>
     <a href="php/carrito.php"> <i class='fa fa-shopping-cart fa-2x'></i></a>
     <p id="fecha-hora"></p>
    <div class="apartadosIndex">
    <div class="apartadoContacto"><a href="index.php">Inicio</a></div>
      <div class="apartadoAyuda"><a href="php/ayuda.php">Ayuda</a></div>
      <div class="apartadoContacto"><a href="php/contacto.php">Contacto</a></div>

    </div>
          <br><br>
          <div class="overlay-navigation">
            <nav role="navigation">
              <ul>
               <li><a href="index.php">Índice</a></li>
               <li><a href="php/contacto.php">Contacto</a></li>
               <li><a href="php/inicio-sesion.php">Perfil</a></li>
               <li><a href="php/ayuda.php" >Ayuda</a></li>
            </ul>
          </nav>
        </div>

          <section class="home">

           <div class="open-overlay">
             <span class="bar-top"></span>
             <span class="bar-middle"></span>
             <span class="bar-bottom"></span>
           </div>
          </section>

    </div>
    <div class="banner">
      
        <a href="index.php"> <img src="imagenes/macia.png"></a>
    </div>
    <div class="banner2">
      
      <a href="index.php"> <img src="imagenes/logo.png"></a>
  </div>

    <div class="menu">
            <ul>
                <li><a href="php/frontend-entrantes.php">Entrantes</a></li>
                <li><a href="php/frontend-comidas.php">Comidas</a></li>
                <li><a href="php/frontend-bebidas.php">Bebidas</a></li>
                <li><a href="php/frontend-postres.php">Postres</a></li>
            </ul>
        </div>
</header>

<main>
<section id="seccion1">
<div class="imagenCrema">
<img src="imagenes/crema.png">
</div>
<div class="imagenSeccion">
<img src="imagenes/fondoseccion.png">
</div>
<div class="imagenSeccion2">
<img src="imagenes/fondoseccion2.png">
</div>
<span id="titulosIndex">~ Ofertas ~</span>
  <div class="imagenesOferta">
<div class="imagenIndex2" onclick="flipCard()"> <!--Imagen de la oferta del centro, que al hacer click o hover hace un efecto de darse la vuelta-->
  <div class="front">
<img src="imagenes/miercoles.png" class="imgIndex">
</div>
  <div class="back">
    <!-- Contenido de la parte trasera del div -->
    <p>Todos los <b>Miércoles</b> hay descuento del <b>10%</b> en entrantes<br>¡No te lo pierdas!</p><img src="imagenes/logo.png">
  </div>
</div>


<div class="imagenIndex2" onclick="flipCard()"> <!--Imagen de la oferta del centro, que al hacer click o hover hace un efecto de darse la vuelta-->
  <div class="front">
<img src="imagenes/lunes.png" class="imgIndex">
</div>
  <div class="back">
    <!-- Contenido de la parte trasera del div -->
    <p>Todos los <b>Lunes</b> hay descuento del <b>5%</b> en comidas<br>¡No te lo pierdas!</p><img src="imagenes/logo.png">
  </div>
</div>
<div class="imagenIndex2" onclick="flipCard()"> <!--Imagen de la oferta del centro, que al hacer click o hover hace un efecto de darse la vuelta-->
  <div class="front">
<img src="imagenes/viernes.png" class="imgIndex">
</div>
  <div class="back">
    <!-- Contenido de la parte trasera del div -->
    <p>Todos los <b>Viernes</b> hay descuento del <b>8%</b> en postres<br>¡No te lo pierdas!</p><img src="imagenes/logo.png">
  </div>
</div>
</div>
</section>
<!--La seccion 2 donde están las dos imagenes de los lados + slider-->
<section id="seccion2">
<br>
<div class="imagenCrema2">
<img src="imagenes/separador.png">
</div>
<span id="titulosIndex">~ Promociones ~</span>
<div class="imagenesCentral">
 <div class="imagenCentro"><img src="imagenes/vertical.gif"></div>


<!--El slider del centro-->
 <div class="slider2">
  <div class="slider2-container">
    <img src="imagenes/monologo.gif" alt="Imagen 1">
    <img src="imagenes/gratis.gif"  alt="Imagen 2">
    <img src="imagenes/refrescos.gif"  alt="Imagen 3">
  </div>
</div>


<div class="imagenCentro"><img src="imagenes/vertical.gif"></div>
</div>
</section>
<section id="seccion3">
<div class="imagenCrema2">
<img src="imagenes/separador.png">
</div>
<span id="titulosIndex">~ Tablón de fotos ~</span>

<!--Imagenes del tablón-->
<div class="image-board">
  <div class="image-container">
    <img src="imagenes/img1.png">
    <img src="imagenes/img2.png">
    <img src="imagenes/img3.png">
    <img src="imagenes/img4.png">
    <img src="imagenes/img5.png">
    <img src="imagenes/img6.png">
</section>
</main>
</div>

<script src="javascript/funciones-index.js"></script>
   <script src="javascript/hamburguer.js"></script>
<!--Termino con el footer y cierro el body y html que se abrieron en el include encabezado.php-->
  <footer>
    <span> &copy; 2023 Le Macià. Todos los derechos reservados.</span>
   </footer>
    
</body>
</html>
