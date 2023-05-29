let resultado;
let juego = document.getElementById("juego");
let vidas = 5;
let marcador = 0;


  //Imagen aleatoria cada vez que carga la página
fetch('https://api.rawg.io/api/games?&key=cd721907eaba4ec29085eebb921d5f95&dates=2000-01-01,2023-04-07')
	.then(response => response.json())
	.then(response => { 
		let resultados = response ["results"]

		let imagen = resultados[Math.floor(Math.random()*resultados.length)]["background_image"]
		let portada1 = document.createElement('img')
		portada1.src = (imagen)

		juego.appendChild(portada1)

	})
	.catch(err => console.error(err));

  //imagen aleatoria cada vez que el jugador acierta el juego
function obtenerJuegoAleatorio() {
  fetch('https://api.rawg.io/api/games?&key=cd721907eaba4ec29085eebb921d5f95&dates=2000-01-01,2023-04-07')
	.then(response => response.json())
	.then(response => { 
		let resultados = response ["results"]
    // Obtén una imagen aleatoria del primer conjunto de resultados
    let imagen = resultados[Math.floor(Math.random()*resultados.length)]["background_image"]
    // Actualiza la imagen del juego en la página con la nueva imagen obtenida
    let portada = document.createElement('img')
    portada.src = (imagen)
    juego.replaceChild(portada, juego.firstElementChild)
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
    document.getElementById("mensajeacierto").innerHTML =`<h4 class="acierto">Acertaste!</h4><br>`;
    document.getElementById("mensajeerror").style.display = "none";
    marcador ++;
    document.getElementById("marcador").innerHTML =`<h4 class="acierto"> Marcador: ` + marcador + `</h4><br>`;
    vidas++;
    obtenerJuegoAleatorio();

  } else {
    document.getElementById("mensajeerror").style.display = "block";
    document.getElementById("mensajeerror").innerHTML =`<h4 class="error">Has fallado!</h4><br>`;
    document.getElementById("mensajeacierto").style.display = "none";
    perderVida();
  }
}

// Función para disminuir la cantidad de vidas y mostrar el mensaje de GAME OVER si se han agotado
function perderVida() {
  vidas--;
  const vidasElement = document.querySelector('#vidas');
  const vidasImagenes = vidasElement.querySelectorAll('img');
  if (vidasImagenes.length > 0) {
    const ultimaVida = vidasImagenes[vidasImagenes.length - 1];
    ultimaVida.parentNode.removeChild(ultimaVida);
    if (vidas === 0) {
        deleteForm()
      document.getElementById("gameover").style.display = "block";
      document.getElementById("gameover").innerHTML =`<h4 class="gameover">GAME OVER !</h4><br>`;
      document.getElementById("registrate").innerHTML =`<h4 class="gameover">REGÍSTRATE PARA MÁS!</h4><br>`;
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
      verificarVidas();
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

function verificarVidas(vidas) {
    if (vidas === 0) {
      document.getElementById('formbuscar').disabled = true;
    } else {
      document.getElementById('formbuscar').disabled = false;
      deleteForm();
    }
  }
  const formulario = document.getElementById("search-form");
  function deleteForm() {
    formulario.remove();
  }