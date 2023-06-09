let resultado;
let pelicula = document.getElementById("pelicula");
let vidas = 5;
let nombrePeliculaActual = "";
let marcador = 0;
let peliculaSeleccionada;

//Imagen aleatoria cada vez que carga la página
fetch('https://api.themoviedb.org/3/movie/popular?api_key=8f7fb1324c844422ef19ce9b1d4afd65&language=es&page_size=50')
  .then(response => response.json())
  .then(response => {
    let resultados = response.results;
    let peliculaSeleccionada = resultados[Math.floor(Math.random() * resultados.length)];
    let imagen = peliculaSeleccionada.backdrop_path;
    let url_imagen = "https://image.tmdb.org/t/p/w500" + imagen;
    nombrePeliculaActual = peliculaSeleccionada.title;

    let portada1 = document.createElement('img');
    portada1.src = url_imagen;
    portada1.alt = nombrePeliculaActual;
    pelicula.appendChild(portada1);
    mostrarNombrePeliculaSiRol2(nombrePeliculaActual)
  })
  .catch(err => console.error(err));

//imagen aleatoria cada vez que el jugador acierta la pelicula
function obtenerPeliculaAleatoria() {
  fetch('https://api.themoviedb.org/3/movie/popular?api_key=8f7fb1324c844422ef19ce9b1d4afd65&language=es&page_size=50')
    .then(response => response.json())
    .then(response => {
      let resultados = response.results;
      peliculaSeleccionada = resultados[Math.floor(Math.random() * resultados.length)]; // Almacenar la película seleccionada
      let imagen = peliculaSeleccionada.backdrop_path;
      let url_imagen = "https://image.tmdb.org/t/p/w500" + imagen;
      nombrePeliculaActual = peliculaSeleccionada.title; // Obtener el nombre de la película

      let portada = document.createElement('img');
      portada.src = url_imagen;
      pelicula.replaceChild(portada, pelicula.firstElementChild);

      // Actualizar el nombre de la película en la página
      mostrarNombrePeliculaSiRol2(nombrePeliculaActual);
      // Reiniciar el temporizador
      timeLeft = 90;
      const timerElement = document.getElementById("timer");
      timerElement.innerText = timeLeft;
    })
    .catch(err => console.error(err));
}

// BUSCADOR A TIEMPO REAL 
const form = document.querySelector('#search-form');
const resultsSection = document.querySelector('#results');


// Función para comprobar si la pelocula buscada es el mismo que el de la imagen
function comprobarPelicula(pelicula, poster) {
  const imagen = document.querySelector('#pelicula img');
  const compararhttp = 'https://image.tmdb.org/t/p/w500' + poster;
  if (compararhttp === imagen.src) {
    document.getElementById("mensajeacierto").style.display = "block";
    document.getElementById("mensajeacierto").innerHTML = `<h4 class="acierto">Acertaste!</h4><br>`;
    document.getElementById("mensajeerror").style.display = "none";
    marcador++;
    document.getElementById("marcador").innerHTML = `<h4 class="acierto"> Marcador: ` + marcador + `</h4><br>`;
    obtenerPeliculaAleatoria();
    acertarJuego();
    // Reiniciar el temporizador
    timeLeft = 90;
    const timerElement = document.getElementById("timer");
    timerElement.innerText = timeLeft;
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
      mostrarNombrePelicula();
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

  // Realiza una solicitud a la API de TMDB para buscar películas
  const response = await fetch(`https://api.themoviedb.org/3/search/movie?api_key=8f7fb1324c844422ef19ce9b1d4afd65&query=${searchTerm}&language=es&page_size=50`);

  // Analiza los resultados de la API y muestra los resultados en la página
  const data = await response.json();
  const resultados = data.results;

  resultsSection.innerHTML = '';

  resultados.forEach((pelicula) => {

    const peliculaElement = document.createElement('div');
    peliculaElement.innerHTML = `
        <h4><a class="comprobar-pelicula">${pelicula.title}</a></h4>
      `;
    resultsSection.appendChild(peliculaElement);

    // Añade un event listener a los enlaces creados para comprobar la película
    const enlace = peliculaElement.querySelector('a');
    enlace.addEventListener('click', (e) => {
      const poster = pelicula.backdrop_path;

      e.preventDefault();
      comprobarPelicula(pelicula, poster);
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
function agregarVidas() {
  const vidasElement = document.querySelector('#vidas');
  for (let i = 0; i < 5; i++) {
    const vidaImagen = document.createElement('img');
    vidaImagen.src = './imagenes/vida.png';
    vidasElement.appendChild(vidaImagen);
  }
}
function init() {

  agregarVidas();
}

let timeLeft = 90; // tiempo en segundos


function updateTimer() {
  const timerElement = document.getElementById("timer");
  timeLeft--;
  timerElement.innerText = timeLeft;

  if (timeLeft === 0) {
    perderVida();
    if (vidas > 0) {
      timeLeft = 90;
      timerElement.innerText = timeLeft;
    } else {
      //QUITAR TEMPORIZADOR
    }
  }
}

setInterval(updateTimer, 1000); // llama a la función updateTimer cada segundo


const formulario = document.getElementById("search-form");
function deleteForm() {
  formulario.remove();
}



// Llamar a la función para obtener la partida al cargar la página
window.addEventListener('load', obtenerPartidaAJAX);

// Llamar a la función para aumentar la puntuación al acertar
function acertarJuego() {
    aumentarPuntuacionAJAX();
    obtenerPeliculaAleatoria();
}

// Llamada AJAX para obtener la partida al cargar la página
function obtenerPartidaAJAX() {
    // Crear objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configurar la solicitud
    xhr.open("GET", "./obtenerPartidaPelicula.php", true);

    // Enviar la solicitud
    xhr.send();

    // Manejar la respuesta de la solicitud
    xhr.onreadystatechange = function () {
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

// Llamada AJAX para aumentar la puntuación al acertar
function aumentarPuntuacionAJAX() {
    // Crear objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configurar la solicitud
    xhr.open("POST", "./sumarPuntuacion.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Enviar la solicitud
    xhr.send();

    // Manejar la respuesta de la solicitud
    xhr.onreadystatechange = function () {
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

// Verificar si la variable nombreImagenPelicula está definida
if (typeof nombreImagenPelicula !== 'undefined') {
  // Mostrar el nombre de la imagen del Pelicula
  console.log('Nombre de la imagen de la pelicula:', nombreImagenPelicula);
}

function mostrarNombrePelicula() {

  let mensajeErrorElement = document.getElementById("mensajeerror");
  mensajeErrorElement.style.display = "block";
  mensajeErrorElement.innerHTML = `<h4 class="error">Has fallado!<br> La película era: <br>${nombrePeliculaActual}</h4><br>`;

  let mensajeAciertoElement = document.getElementById("mensajeacierto");
  mensajeAciertoElement.style.display = "none";
}


function mostrarNombrePeliculaSiRol2(nombrePeliculaActual) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "obtenerRol.php", true);

  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        var rol = response.rol;
        console.log("Rol del usuario:", rol);
        var nombrePeliculaActualElement = document.getElementById("nombrePeliculaActual");
        
        if (rol === "2") {
          nombrePeliculaActualElement.innerHTML = "El nombre de la película actual es: <br>" + nombrePeliculaActual;
          
          var nombrePeliculaActualElement = document.getElementById("nombrePeliculaActual");
       
        }
      } else {
        console.error("Error al obtener el rol del usuario. Código de estado: " + xhr.status);
      }
    }
  };

  xhr.send();
}
