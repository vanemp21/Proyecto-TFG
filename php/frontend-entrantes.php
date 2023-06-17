<title>Entrantes</title>
<?php include 'encabezado.php'; ?>

<!--Aquí va el menu-content para luego darle estilo, que es donde se va a mostrar todos los productos donde el tipo es 2, osea las bebidas-->
        <div class="menu-content">
        <?php
        $comida = "SELECT * FROM comida where tipo = 0";
        require 'backend-comidas.php';
        ?>        
        </div>
    </div>
<!--Termino con el footer y cierro el body y html que se abrieron en el include encabezado.php-->
<footer>
 <span> &copy; 2023 Le Macià. Todos los derechos reservados.</span>
</footer>
</body>
</html>
