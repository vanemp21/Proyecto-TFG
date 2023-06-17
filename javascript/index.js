//Mostrar el cuadrado al clickar en un producto para añadirlo al carrito

function carritoComida(){
    const cuadrado = document.getElementById("cuadrado");
    cuadrado.style.display = "block";

    let opacity = 0;
    const interval = setInterval(() => { //Temporizador para que vaya dandole opacidad poco a poco
      opacity += 0.1;
      cuadrado.style.opacity = opacity;
      if (opacity >= 1) clearInterval(interval);
    }, 40);


}
//Para que haga un efecto suave al cerrar la ventana
function xCerrar() {
  $("#cuadrado").fadeOut("slow");
}
$(document).ready(function() {
  $("#botonCierre").click(function() {
    $("#bocadillo").fadeOut("slow");
  });
});
$(document).ready(function() {
  $("#cantidadComida").click(function() {
    $("#mensajeDiv").fadeIn("slow");
    setTimeout(function() {
      $("#mensajeDiv").fadeOut("slow");
    }, 20000); 
  });
});
$(document).ready(function() {
  $("#botonHideSesion1").click(function() {
    $("#bocadillo").fadeIn("slow");
  });
});
//Retraso en el boton submit para que pueda aparecer la ventana de "añadido correctamente o cerrado sesion", si no se recarga la página muy rápido y no aparece
function delaySubmit(event) {
  event.preventDefault(); // Evita la recarga de la página

  // Realiza el retraso antes de la recarga
  setTimeout(function() {
    event.target.submit(); // Envía el formulario después del retraso
  }, 2000); // Retraso de 2 milisegundos 

  return false; // Evita la recarga de la página inmediatamente
}


//Ventana que sale al cerrar sesion con la libreria de swal
function mensajeCerrarSesion(){
  Swal.fire({
    title: 'Sesión cerrada',
    text: '¡Has cerrado sesión correctamente!',
    icon: 'success',
    confirmButtonText: 'Aceptar',
    //Variables que le pongo al container, titulo etc para poder darle estilo
    customClass: {
      container: 'miContainerswal',
      title: 'miTituloswal',
      text: 'miTextoswal',
      confirmButton: 'miConfirmacionswal'
    }

  });
}


//Ventana que sale al añadir al carrito con la libreria de swal
function mensajeCarrito(){
  //event.preventDefault();
  Swal.fire({
    title: 'Añadido correctamente',
    text: '¡Tu artículo se agregó al carrito de compras!',
    icon: 'success',
    confirmButtonText: 'Aceptar',
    customClass: {
      container: 'miContainerswal',
      title: 'miTituloswal',
      text: 'miTextoswal',
      confirmButton: 'miConfirmacionswal'
    },
    //willOpen es una función de la librería Swal que oculta después el elemento cuadrado
    willOpen: () => {
      const divElement = document.getElementById('cuadrado');
      divElement.style.display = 'none';
     
    }

  });
}


//Expresiones regulares para los inputs de registro.php
var emailInput = document.getElementById('inputCorreo');
var passwordInput = document.getElementById('exampleInputPassword1');
var nombreInput = document.getElementById('inputNombre');
var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
var nombreRegex = /[0-9a-zA-Z]{3,}$/;
var form = document.querySelector('form');

function validateInputs() {
  //Valor que se introduce en los inputs
  const emailValue = emailInput.value;
  const passwordValue = passwordInput.value;
  const nombreValue = nombreInput.value;
  //trim para quitar espacios delante y atrás
  if(emailValue.trim() === ''){
    $("#errorCorreo").html("<small style=' color:#9c320f;'>Error el correo no puede estar vacío</small>");
    event.preventDefault();
  }
  if (!nombreRegex.test(nombreValue)) {
    $("#errorNombre").html("<small style=' color:#9c320f;'>Error en el nombre</small>");
 
    event.preventDefault();
  }

  if (!emailRegex.test(emailValue)) {
    $("#errorCorreo").html("<small style=' color:#9c320f;'>Error en el correo, debe ser xxx@xxx.xx</small>");

    event.preventDefault();
  }

  if (!passwordRegex.test(passwordValue)) {
    $("#errorPass").html("<small style=' color:#9c320f;'>Error en la contraseña, debe ser 8 caracteres, <br>1 mayúscula y 1 número</small>");
    event.preventDefault();
  }
//En caso de que haya algún error, no se reinicia la página para que aparezca los textos
}


//Comprobaciones para ver que en el login.php no estén los campos vacíos
function validarFormulario() {
  var contraseña = document.getElementById("inputContrasenya").value;
  var correo = document.getElementById("inputCorreo").value;
  var mensajeError = document.getElementById("mensajeError");
  var mensajeError1 = document.getElementById("mensajeError1");

  if(correo === "" && contraseña === ""){
    mensajeError.innerHTML = "<small style='color:#9c320f';>Debes ingresar los datos.</small>";
    return false;
  }
  if (correo === "") {
    mensajeError1.innerHTML = "<small style='color:#9c320f';>Por favor, ingresa un correo</small>";
    return false; // Evita el envío del formulario
}
  if (contraseña === "") {
      mensajeError.innerHTML = "<small style='color:#9c320f';>Por favor, ingresa la contraseña correctamente.</small>";
      return false; // Evita el envío del formulario
  }


}

//Función para mostrar la fecha y hora con el date en el top de la página, solo a resolución máxima
function mostrarFechaHora() {
  const fechaHoraActual = new Date(); //Iniciamos la estancia del date
  const diaSemana = obtenerNombreDiaSemana(fechaHoraActual.getDay()); //Obtenemos el nombre del dia, mediante la función de obtenerNombreDiaSemana
  const dia = fechaHoraActual.getDate(); //Obtenemos la hora
  const mes = obtenerNombreMes(fechaHoraActual.getMonth()); //Obtenemos el mes
  const año = fechaHoraActual.getFullYear(); //Obtenemos el año
  let hora = fechaHoraActual.getHours(); //Obtenemos la hora
  let minutos = fechaHoraActual.getMinutes(); //Obtenemos los minutos
  let segundos = fechaHoraActual.getSeconds(); //Obtenemos los segundos

  // Con esto se ajusta para que la hora tenga 2 digitos, si no, se le agrega un 0 delante, ejemplo si son las 1 pues 01
  if (hora < 10) {
    hora = "0" + hora;
  }
  if (minutos < 10) {
    minutos = "0" + minutos;
  }
  if (segundos < 10) {
    segundos = "0" + segundos;
  }
//Aquí usamos el template literal para añadir todas esas variables en una cadena de texto
  const fechaHoraTexto = `${diaSemana}, ${dia} de ${mes} de ${año} - ${hora}:${minutos}:${segundos}`;
  document.getElementById("fecha-hora").textContent = fechaHoraTexto; //Añadimos esa cadena al div de fecha-hora que hay para mostrarlo
}

//Con esta función obtengo el nombre del día, ya que cuenta con las posiciones 0,1,2... si le devuelve con el return 0, es lunes y así sucesivamente
function obtenerNombreDiaSemana(numeroDia) {
  const diasSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
  return diasSemana[numeroDia];
}
//Misma función que la de arriba pero con los meses
function obtenerNombreMes(numeroMes) {
  const meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
  return meses[numeroMes];
}


$(document).ready(function() {
  mostrarFechaHora();
});

