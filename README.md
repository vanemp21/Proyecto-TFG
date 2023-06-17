
¡Hola a todos!

Bienvenidos a mi proyecto Le Macià, un restaurante desarrollado por el Instituto. En este README, les proporcionaré una visión general de las características y el funcionamiento del proyecto.

**Portada (index.php)**
**Header:** Aquí se encuentra el menú principal, representado por una franja negra en la parte superior que cambia a un ícono de hamburguesa en función de la resolución/dispositivo. En el menú, se muestran los iconos de Perfil/Carrito/Fecha, así como los apartados de Inicio, Ayuda y Contacto.
**Banners:** En la portada, encontrarás dos banners. Dependiendo de la resolución/dispositivo, se mostrará uno u otro para garantizar una buena visualización.
**Menú:** Esta sección presenta una simple lista con efectos de JavaScript y CSS para una apariencia interactiva. Los enlaces del menú redirigen a las diferentes páginas del proyecto, como Entrantes, Comidas, Bebidas y Postres.
**Main**
**Sección 1:** Aquí se muestran varias imágenes, entre las cuales, tres de ellas (El chocolate, la hamburguesa y la tabla con la hamburguesa) están posicionadas mediante los valores de relative y absolute, mientras que las otras tres en el centro se muestran con un efecto de giro al pasar el cursor o hacer clic.
**Sección 2:** En esta sección, encontrarás dos gifs a los lados creados con canva.com, y otros tres en el centro que funcionan como un carrusel utilizando una función de JavaScript para alternar entre ellos.
**Sección 3:** Esta sección muestra un grid de 3x3 con imágenes de los productos. Originalmente, las imágenes eran clicables y se ampliaban, pero debido a dificultades técnicas, se decidió presentarlas como un tablón de fotos.

**Página de inicio de sesión (login.php)**
En esta página, puedes introducir un correo electrónico, una contraseña en los campos de entrada y encontrarás dos botones: "Enviar" y "Regístrate". Al hacer clic en "Regístrate", serás redirigido a la página de registro.php, de la cual hablaremos más adelante.

Los campos de entrada están validados mediante funciones de JavaScript para detectar errores como entradas incorrectas o campos vacíos. Además, se comprueba si la combinación de correo y contraseña existe en la base de datos. Sin una coincidencia en la tabla de registro, no se podrá acceder.

Una vez iniciada la sesión, se redirige a la página inicio-sesion.php (anclada a iniciosesion-backend.php), donde se muestran tres botones:

Para la cuenta "**admin@gmail.es - admin123**": "Mis datos" muestra los detalles de la cuenta (excepto la contraseña) y "Administrar" solo se muestra cuando se inicia sesión con esta cuenta. También se muestra el botón "Cerrar sesión" para finalizar la sesión.
Para los usuarios normales (**user@gmail.es - user123**): No se muestra el botón de administrador, en su lugar se muestra el botón "Carrito" junto con "Mis datos" y "Cerrar sesión". Al cerrar sesión, se destruye la sesión y en la tabla de inicio de sesión se cambia el estado de "conectado" a 0 para registrar la desconexión.
Página de registro (registro.php)
En esta página, se encuentran campos para el nombre, correo electrónico y contraseña. Se realizan validaciones utilizando expresiones regulares en el archivo index.js para comprobar la corrección de los datos ingresados. Si hay algún error, se muestra un mensaje y se evita el envío del formulario. Esto se implementó para evitar la pérdida de mensajes al actualizar la página después de hacer clic en el botón "submit".

**Carrito de compras (carrito.php)**
Al hacer clic en el carrito, se mostrará una lista de los productos que has agregado en las categorías de comida, bebida, entrantes y postres. Si no hay elementos en el carrito, se mostrará un mensaje indicando que está vacío. Cada producto de la lista tiene una opción "X" para eliminarlo si cambias de opinión y no deseas agregarlo. Además, se muestra una lista de todos los productos seleccionados, incluyendo la cantidad, precio y el total. Puedes ver un resumen del carrito haciendo clic en "ticket" (nota: la librería FPDF puede tener problemas de compatibilidad y solo funcionar en Microsoft Edge).

Al hacer clic en "Realizar pedido", el pedido se envía al administrador y se borra de la base de datos del carrito, agregándose a los "pedidos" que solo son visibles para el administrador.

Tanto el usuario como el administrador pueden eliminar cualquier producto de la lista utilizando la opción "X". Los archivos carrito.php, eliminar_pedido.php e insertar_pedidos.php están vinculados y se encargan de la lógica de inserción y eliminación de pedidos.

Añadir productos al carrito
Para agregar productos al carrito, debes visitar las páginas frontend-bebidas.php, frontend-comidas.php, frontend-entrantes.php o frontend-postres.php. Estas páginas están vinculadas a backend-comidas.php y backend-pedidos.php. Los archivos backend están organizados por tipos: entrantes (0), comidas (1), bebidas (2) y postres (3). Cada archivo realiza una consulta a la base de datos para mostrar solo los datos correspondientes al tipo seleccionado. Por ejemplo, si abres frontend-bebidas.php, la consulta sería $comida = "SELECT * FROM comida WHERE tipo = 2", y mostrará los datos obtenidos enviando la consulta a backend-comidas.php.

En estas páginas, se muestra una cuadrícula con el nombre, imagen, descripción y precio de los productos obtenidos de la base de datos. Puedes eliminar o agregar más productos sin que afecte la visualización de la cuadrícula existente.

Cabe mencionar que cualquier usuario puede ver los productos y obtener detalles como el precio sin necesidad de registrarse o iniciar sesión. Sin embargo, para ver el botón de compra, se verifica si hay una sesión iniciada. Si no es así, el botón no se mostrará (display: none).

Al hacer clic en un producto, aparecerá una ventana emergente con una animación de fade-out utilizando JavaScript y CSS.

Al hacer clic en "Añadir", se mostrará otra ventana emergente con un mensaje indicando que el producto se ha agregado al carrito. Esta ventana utiliza la librería Swal de CSS para proporcionar una apariencia más atractiva que la de los alerts predeterminados del navegador.

Y con esto concluye la documentación de mi proyecto. 

Agradezco tu atención y te saluda atentamente,

Vanessa Rubio Sánchez

Librerías utilizadas:

Bootstrap
Swal
FPDF
jQuery
