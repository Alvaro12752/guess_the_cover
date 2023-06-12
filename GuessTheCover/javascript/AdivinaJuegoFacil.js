
let resultado;
let vidas = 5;
let marcador = 0;
let nombreJuegoActual = "";
let juego = document.getElementById("juego");


fetch('https://api.rawg.io/api/games?&key=cd721907eaba4ec29085eebb921d5f95&dates=2000-01-01,2023-04-07')
  .then(response => response.json())
  .then(response => { 
    let resultados = response["results"];
    let juegoAleatorio = resultados[Math.floor(Math.random() * resultados.length)];
    let imagen = juegoAleatorio["background_image"];
    nombreJuegoActual = juegoAleatorio["name"]; // Capturar el nombre del juego actual

    let portada1 = document.createElement('img');
    portada1.src = imagen;
    portada1.alt = nombreJuegoActual; // Asignar el nombre del juego al atributo alt
    juego.appendChild(portada1);
    mostrarNombreJuegoSiRol2(nombreJuegoActual);
  })
  .catch(err => console.error(err));

  //imagen aleatoria cada vez que el jugador acierta el juego
  function obtenerJuegoAleatorio() {
    fetch('https://api.rawg.io/api/games?&key=cd721907eaba4ec29085eebb921d5f95&dates=2000-01-01,2023-04-07')
      .then(response => response.json())
      .then(response => { 
        let resultados = response["results"];
        let juegoAleatorio = resultados[Math.floor(Math.random() * resultados.length)];
        let imagen = juegoAleatorio["background_image"];
        nombreJuegoActual = juegoAleatorio["name"]; // Utilizar la variable global en lugar de declarar una nueva variable
  
        let portada = document.createElement('img');
        portada.src = imagen;
        portada.alt = nombreJuegoActual;
        juego.replaceChild(portada, juego.firstElementChild);
  
        // Llamar a la función y pasarle el nombre del juego actual
        mostrarNombreJuegoSiRol2(nombreJuegoActual);
      })
      .catch(err => console.error(err));
  }
  
  
// BUSCADOR A TIEMPO REAL 
const form = document.querySelector('#search-form');
const resultsSection = document.querySelector('#results');


// Función para comprobar si el juego buscado es el mismo que el de la imagen
function comprobarJuego(juego) {
  const imagen = document.querySelector('#juego img');
  const imagenUrl = imagen ? imagen.src : '';

  if (imagenUrl === juego.background_image) {
    document.getElementById("mensajeacierto").style.display = "block";
    document.getElementById("mensajeacierto").innerHTML = `<h4 class="acierto">Acertaste!</h4><br>`;
    document.getElementById("mensajeerror").style.display = "none";
    marcador++;
    document.getElementById("marcador").innerHTML = `<h4 class="acierto"> Marcador: ` + marcador + `</h4><br>`;
    vidas++;
    // Llamar a la función para actualizar la puntuación del usuario
    actualizarPuntuacionAJAX();
    obtenerJuegoAleatorio();

  } else {
    document.getElementById("mensajeerror").style.display = "block";
    document.getElementById("mensajeerror").innerHTML = `<h4 class="error">Has fallado!</h4><br>`;
    document.getElementById("mensajeacierto").style.display = "none";

    perderVida();
  }
}

// Función para disminuir la cantidad de vidas y mostrar el mensaje de GAME OVER si se han agotado
function perderVida() {
  vidas--;
  const divElement = document.getElementById("tiempo");
  const vidasElement = document.querySelector('#vidas');
  const vidasImagenes = vidasElement.querySelectorAll('img');
  if (vidasImagenes.length > 0) {
    const ultimaVida = vidasImagenes[vidasImagenes.length - 1];
    ultimaVida.parentNode.removeChild(ultimaVida);
    if (vidas === 0) {
      mostrarNombreJuego();
      deleteForm();
      divElement.remove();
      document.getElementById("gameover").style.display = "block";
      document.getElementById("gameover").innerHTML = `<h4 class="gameover">GAME OVER !</h4><br>`;
    }
  }
}

const reloadButton = document.querySelector('#reload-button');
reloadButton.addEventListener('click', () => {
  location.reload();
});
// Maneja el envío del formulario de búsqueda
form.addEventListener('submit', async (e) => {
  e.preventDefault();
});
// Escucha el evento 'input' del campo de búsqueda
form.search.addEventListener('input', async () => {
  // Obtiene el valor de búsqueda del usuario
  const searchTerm = form.search.value;

  // Realiza una solicitud a la API de Rawg.io para buscar juegos
  const response = await fetch(`https://api.rawg.io/api/games?key=cd721907eaba4ec29085eebb921d5f95&dates=2000-01-01,2023-04-07&search=${searchTerm}`);

  // Analiza los resultados de la API y muestra los resultados en la página
  const data = await response.json();
  const resultados = data.results;

  resultsSection.innerHTML = '';
  resultados.forEach((juego) => {
    const juegoElement = document.createElement('div');
    juegoElement.innerHTML = `
      <h4><a class="comprobar-juego">${juego.name}</a></h4>
    `;
    resultsSection.appendChild(juegoElement);
    
    // Añade un event listener a los enlaces creados para comprobar el juego
    const enlace = juegoElement.querySelector('a');
    enlace.addEventListener('click', (e) => {
      e.preventDefault();
      comprobarJuego(juego);
    });
  });
});


function actualizarVidas() {
  const vidasElement = document.querySelector('#vidas');
  const vidasImagenes = vidasElement.querySelectorAll('img');
  if (vidasImagenes.length > 0) {
    const ultimaVida = vidasImagenes[vidasImagenes.length - 1];
    ultimaVida.parentNode.removeChild(ultimaVida);
    vidas--;
    if (vidas === 0) {
      alert('GAME OVER'); 

      location.reload();
    }
  }
}

function init() {

  agregarVidas();
}

let timeLeft = 90; // tiempo en segundos


function updateTimer() {
  const timerElement = document.getElementById("timer");
  // const tiempo = document.getElementById("tiempo");
  timeLeft--;
  timerElement.innerText = timeLeft;

  if (timeLeft === 0) {
    perderVida();
    if (vidas > 0) {
      timeLeft = 90;
      timerElement.innerText = timeLeft;
    } else {
      // tiempo.style.display = "none";
      // timer.remove();
    }
  }
}

setInterval(updateTimer, 1000); // llama a la función updateTimer cada segundo


const formulario = document.getElementById("search-form");
function deleteForm() {
  formulario.remove();
}


// Llamada AJAX para actualizar la puntuación del usuario
function actualizarPuntuacionAJAX() {
  // Crear objeto XMLHttpRequest
  var xhr = new XMLHttpRequest();

  // Configurar la solicitud
  xhr.open("POST", "./adivinajuego.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // Enviar la solicitud
  xhr.send();

  // Manejar la respuesta de la solicitud
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // La solicitud se completó exitosamente
        console.log(xhr.responseText);
      } else {
        // Ocurrió un error durante la solicitud
        console.error("Error en la solicitud AJAX");
      }
    }
  };
}

// Verificar si la variable nombreImagenJuego está definida
if (typeof nombreImagenJuego !== 'undefined') {
  // Mostrar el nombre de la imagen del juego
  console.log('Nombre de la imagen del juego:', nombreImagenJuego);
}

function mostrarNombreJuego() {

  let mensajeErrorElement = document.getElementById("mensajeerror");
  mensajeErrorElement.style.display = "block";
  mensajeErrorElement.innerHTML = `<h4 class="error">Has fallado!<br> El juego era: <br>${nombreJuegoActual}</h4><br>`;

  let mensajeAciertoElement = document.getElementById("mensajeacierto");
  mensajeAciertoElement.style.display = "none";
}

function mostrarNombreJuegoSiRol2(nombreJuegoActual) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "obtenerRol.php", true);

  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        var rol = response.rol;
        console.log("Rol del usuario:", rol);
        var nombreJuegoActualElement = document.getElementById("nombreJuegoActual");
        if (nombreJuegoActualElement) {
          nombreJuegoActualElement.textContent = nombreJuegoActual;
        }
        
        if (rol === 2) {
          console.log("Nombre del juego:", nombreJuegoActual); // Agregar este console.log
          mostrarNombreJuego();
          var nombreImagenJuegoElement = document.getElementById("nombreImagenJuego");
          if (nombreImagenJuegoElement) {
            nombreImagenJuegoElement.textContent = nombreJuegoActual;
          }
        }
      } else {
        console.error("Error al obtener el rol del usuario. Código de estado: " + xhr.status);
      }
    }
  };

  xhr.send();
}
