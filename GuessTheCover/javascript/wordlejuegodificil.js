var words = [
  "Tetris",
  "Pong",
  "ComeCocos",
  "Snake",
  "Frogger",
  "Galaga",
  "Breakout",
  "Asteroids",
  "Centipede",
  "Doom",
  "Diablo",
  "Zelda",
  "Minecraft",
  "Fortnite",
  "Halo",
  "Overwatch",
  "Fallout",
  "PUBG",
  "Undertale",
  "Cuphead",
  "Limbo",
  "Inside",
  "Journey",
  "Braid",
  "Fez",
  "Raft",
  "Celeste",
  "Superhot",
  "Bastion",
  "Firewatch",
  "Gris",
  "Ori",
  "Hades",
  "Inside",
  "Unravel",
  "Sonic",
  "MarioBross",
  "Bully",
  "Sims",
  "ManEater",
  "Amnesia",
  "PREY",
  "DARQ",
  "Minit",
  "Control",
  "FrostPunk",
  "RAGUE",
  "Inside",
  "Godfall",
  "ABZU",
  "Tacoma",
  "Smite",
  "Devour",
  "Hitman"
];

var wordIndex = 0; // Índice de la palabra actual en el array
var word = words[wordIndex]; // Palabra objetivo
var remainingAttempts = 10; // Intentos restantes
var guesses = []; // Array para almacenar las palabras ingresadas

var wordTable = document.getElementById("wordTable");
var remainingAttemptsElement = document.getElementById("remainingAttempts");
var guessInput = document.getElementById("guessInput");
var guessButton = document.getElementById("guessButton");
var messageElement = document.getElementById("message");

guessInput.classList.add("input-width");

// Crea las celdas necesarias en la tabla según la longitud de la palabra objetivo
for (var i = 0; i < word.length; i++) {
  var cell = document.createElement("td");
  wordTable.rows[0].appendChild(cell);
}

// Función para obtener una palabra aleatoria del array
function getRandomWord() {
  return words[Math.floor(Math.random() * words.length)];
}

// Función para iniciar un nuevo juego
function startNewGame() {
  word = getRandomWord();
  remainingAttempts = 9;
  guesses = [];

  // Resto del código para reiniciar la interfaz y el juego
  // ...
}

// Llamada inicial para empezar el primer juego
startNewGame();

// Resto del código...

function processGuess() {
  var guess = guessInput.value;

  if (guess.length !== word.length) {
      messageElement.textContent = "El juego tiene " + word.length + " letras.";
      messageElement.classList.add("aviso-text");
      return;
  }

  if (remainingAttempts === 0) {
      messageElement.textContent = "¡Perdiste! La palabra era: " + word;
      messageElement.classList.add("red-text");
      guessInput.disabled = true;
      guessButton.disabled = true;
      return;
  }

  var letterCells = wordTable.rows[0].cells;
  var row = document.createElement("tr"); // Crea una nueva fila

  var remainingWord = word.toLowerCase(); // Copia de la palabra objetivo original en minúsculas

  for (var i = 0; i < word.length; i++) {
      var letter = word[i].toLowerCase(); // Letra objetivo en minúsculas
      var guessedLetter = guess[i].toLowerCase(); // Letra adivinada en minúsculas
      var cell = letterCells[i].cloneNode(); // Clona la celda actual

      if (guessedLetter === letter) {
          cell.textContent = guess[i];
          cell.classList.add("correct");
          cell.style.fontSize = "30px"; // Cambia el tamaño de texto a 30 píxeles
          remainingWord = remainingWord.replace(guessedLetter, ""); // Elimina la letra adivinada de la copia de la palabra
      } else if (remainingWord.includes(guessedLetter)) {
          cell.textContent = guess[i];
          cell.classList.add("partial");
          cell.style.fontSize = "30px"; // Cambia el tamaño de texto a 30 píxeles
          remainingWord = remainingWord.replace(guessedLetter, ""); // Elimina la letra adivinada de la copia de la palabra
      } else {
          cell.textContent = guess[i];
          cell.classList.add("incorrect");
          cell.style.fontSize = "30px"; // Cambia el tamaño de texto a 30 píxeles
      }

      cell.classList.add("text-center"); // Agrega la clase para centrar el contenido

      row.appendChild(cell); // Agrega la celda a la nueva fila
  }

  wordTable.appendChild(row); // Agrega la nueva fila a la tabla

  remainingAttempts--;

  if (guess.toLowerCase() === word.toLowerCase()) {
      messageElement.textContent = "¡Felicidades! Has adivinado la palabra";
      messageElement.classList.add("felicidades-text");
      guessInput.disabled = true;
      guessButton.disabled = true;

      var remainingWords = words.filter(function (word) {
          return word.length === word.length;
      });

      if (remainingWords.length > 0) {
          // Si hay más palabras, seleccionar una nueva palabra aleatoria y comenzar un nuevo juego
          words = remainingWords;
          wordIndex = Math.floor(Math.random() * words.length);
          startNewGame();
      } else {
          // Si no hay más palabras, mostrar mensaje de finalización o realizar otra acción
          // ...
      }
  }

  remainingAttemptsElement.textContent = remainingAttempts;
  guessInput.value = "";
  guessInput.focus();
}

guessButton.addEventListener("click", processGuess);

// Evento para procesar la adivinanza del jugador al presionar Enter en el campo de texto
guessInput.addEventListener("keydown", function (event) {
  if (event.key === "Enter") {
      processGuess();
  }
});

// Crear una instancia de XMLHttpRequest
var xhr = new XMLHttpRequest();

// Definir la función de manejo de la respuesta
xhr.onreadystatechange = function() {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      // Obtener la respuesta como objeto JSON
      var data = JSON.parse(xhr.responseText);
      
      // Verificar si el usuario tiene el rol "2"
      if (data.rol === '2') {
        // Mostrar un mensaje con el nombre del juego actual
        var message = "¡Bienvenido! El juego actual es: " + word;
        messageElement.textContent = message;
        messageElement.classList.add("rol2-message");
      }
    } else {
      // Manejar errores en la solicitud
      console.error('Error:', xhr.status);
    }
  }
};

// Realizar la solicitud para obtener el rol del usuario logueado
xhr.open('GET', 'obtenerRol.php');
xhr.send();
