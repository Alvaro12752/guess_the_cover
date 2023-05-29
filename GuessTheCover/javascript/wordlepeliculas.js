const WORDS = [
    "Titanic",
    "Rocky",
    "Grease",
    "Mamá",
    "Taxi",
    "Seven",
    "Blade",
    "ElReyLeon",
    "Batman",
    "JurassicPark",
    "Cazafantasmas",
    "Terminator",
    "LosGoones",
    "ElGraduado",
    "ElPianista",
    "ElResplandor",
    "ElIlusionista",
    "ElExorcista",
    "ElNombreDeLaRosa",
    "ElClubDeLaPelea",
    "MysticRiver",
    "ElHobbit",
    "ElSeñorDeLosAnillos",
    "LasAventurasDeTintin",
    "Camino",
    "ElCisneNegro",
    "VolverAlFuturo",
    "LaNaranjaMecanica",
    "Matrix",
    "AmericanBeauty",
    "PulpFiction",
    "ForrestGump",
    "CinemaParadiso",
    "Gladiator",
    "LaVidaEsBella",
    "ElReyArturo",
    "LaMillaVerde",
    "SalvarAlSoldadoRyan",
    "LaListaDeSchindler",
    "ElDiscursoDelRey",
    "ElArtista",
    "Gravity",
    "Birdman",
    "MadMax",
    "LaFormaDelAgua",
    "Joker",
    "Parasitos",
    "ElIrlandes",
    "AdAstra",
    "ElFarodeLasOrcas",
    "Coco",
    "LosIncreibles",
    "MonstruosSa",
    "ToyStory",
    "Up",
    "BuscandoANemo",
    "Aladdín",
    "LaBellaYLaBestia",
    "ElLibroDeLaSelva",
    "ElReyLeón",
    "Pinocho",
    "Dumbo",
    "Bambi",
    "Cenicienta",
    "PeterPan",
    "LaSirenita",
    "LaDamaYElVagabundo",
    "LosAristogatos",
    "RobinHood",
    "LaEspadaEnLaPiedra",
    "LaCenicienta",
    "LaBellaDurmiente",
    "ElJorobadoDeNotreDame",
    "Hercules",
    "Mulan",
    "Atlantis",
    "LiloYStitch",
    "ElPlanetaDelTesoro",
    "Tarzan",
    "BuscandoANemo",
    "Cars",
    "MonstruosUniversity",
    "Valiente",
    "Ratatouille",
    "WallE",
    "Coco",
    "Frozen",
    "Enredados",
    "Vaiana",
    "ElPrincipeDeEgipto",
    "ElCid",
    "TadeoJones"];

const WORD_LENGTH = 5; // Longitud de la palabra a adivinar
const MAX_GUESSES = 10; // Número máximo de intentos
let word; // Palabra a adivinar
let letters; // Letras de la palabra a adivinar
let guesses = []; // Letras adivinadas
let remainingGuesses; // Número de intentos restantes

// Función para obtener una palabra aleatoria del array WORDS
function getRandomWord() {
    const randomIndex = Math.floor(Math.random() * WORDS.length);
    return WORDS[randomIndex];
}

// Función para inicializar el juego
const newWordleButton = document.querySelector('#new-wordle-button');
newWordleButton.addEventListener('click', () => {
    init();
});

// Función para inicializar el juego
function init() {
    word = getRandomWord();
    letters = word.split('');
    guesses = [];
    remainingGuesses = MAX_GUESSES;
    renderWordle();
}

// Función para renderizar el juego
function renderWordle() {
    const wordleContainer = d3.select('#wordle');
    wordleContainer.selectAll('*').remove();
    wordleContainer.append('p')
        .text(`Adivina la palabra:`);
    const letterContainer = wordleContainer.append('div')
        .attr('class', 'letter-container');
    letters.forEach((letter, index) => {
        if (letter === " ") { // Ignorar los espacios en blanco
            letterContainer.append('span').text(" ");
        } else {
            const letterDiv = letterContainer.append('div')
                .attr('class', 'letter');
            letterDiv.append('span')
                .attr('class', 'letter-text')
                .text(guesses.includes(letter.toLowerCase()) ? letter : '_');
        }
    });
    const guessContainer = wordleContainer.append('div')
        .attr('class', 'guess-container');
    for (let i = 0; i < 26; i++) {
        const letter = String.fromCharCode(65 + i);
        const button = guessContainer.append('button')
            .attr('class', 'guess-button')
            .text(letter)
            .on('click', () => {
                if (guesses.includes(letter.toLowerCase()) || guesses.includes(letter.toUpperCase())) {
                    return;
                }
                guesses.push(letter.toLowerCase());
                if (letters.includes(letter.toLowerCase())) {
                    const allLettersGuessed = letters.every(letter => guesses.includes(letter.toLowerCase()));
                    if (allLettersGuessed) {
                        wordleContainer.html(`
            <p class="acertaste">Enhorabuena, acertaste la película</p>
            `);
                        wordleContainer.select(".acertaste").style("color", "lime");
                        return;
                    }
                } else {
                    remainingGuesses--;
                    if (remainingGuesses === 0) {
                        wordleContainer.html(`
    <p class="gameover">GAME OVER. La película era ${word}.</p>
  `);
                        wordleContainer.select(".gameover").style("color", "red");
                        return;
                    }
                }
                renderWordle();
            });
    }
    wordleContainer.append('p')
        .text(`Intentos restantes: ${remainingGuesses}`);
}
// Función

window.addEventListener('load', () => {
    init();
});