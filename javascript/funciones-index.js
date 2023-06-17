
  window.onload = function() { //Al cargar la página sucederá esto continuamente
    let slideIndex2 = 0; //Inicializamos en 0 para dar un valor a la posicion de la imagen por si llega a la última volver a la primera
    const slides2 = document.querySelectorAll('.slider2-container img'); //Obtiene de la clase slider2-container todas las imagenes
    const intervalTime = 5000; // Creamos una variable con el intervalo de 5 milisegundos
  
    function showSlide2() {
      //Recorremos todas las imagenes del querySelector denominado slide2 y las ponemos en ocultas
      slides2.forEach((slide2) => {
        slide2.style.display = 'none';
      });
      //Si la posicion es mayor o igual a la última, entonces significa que estamos en la última imagen y por lo tanto reseteamos la posición a 0
      if (slideIndex2 >= slides2.length) {
        slideIndex2 = 0;
      } 
      //Aquí pilla de nuevo la posición de esa imagen y la convierte en block para mostrarla
      slides2[slideIndex2].style.display = 'block';
    }
  
    //Contador que va sumando la posicion de la diapositiva en base a la posicion que está, n es al principio 1 que se 
    //vuelve a cambiar al pasar por la funcion pasado el intervalo de tiempo en la línea 32
    function changeSlide2(n) {
      slideIndex2 += n; 
      showSlide2(); //Despues ejecuta la funcion de showslide2 con el nuevo valor de n 
    }
  
    function cambioSlide() { //Esto es simplemente una función para resetear a 1 cada 5000 milisegundos (linea 32)
      changeSlide2(1);
    }
  
    showSlide2(); //Al haber un window.onload primero se ejecutará este showslide, para garantizar
    //que se ejecute un showslide al iniciar la página, luego pasa por el setInterval y
    //ahí llama al nuevo showslide todo el rato, haciendo que pueda ejecutarse todo el rato por el setinterval
    setInterval(cambioSlide, intervalTime); //Aquí es donde va a cambiar la imagen cada tanto tiempo fijado en la variable
  };

//Función que añade la clase flipped al clickarlo para cambiarle  el estilo
function flipCard() {
  const card = event.currentTarget;
  card.classList.toggle('flipped');
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
