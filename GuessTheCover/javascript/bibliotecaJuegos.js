const apiKey = 'cd721907eaba4ec29085eebb921d5f95';
const gamesUrl = `https://api.rawg.io/api/games?dates=2000-01-01,${new Date().toISOString().slice(0, 10)}`;
let games = [];
let currentPage = 1;
const gamesPerPage = 20;

function fetchGames() {
    fetch(`${gamesUrl}&key=${apiKey}&page=${currentPage}&page_size=${gamesPerPage}`)
        .then(response => response.json())
        .then(data => {
            games = data.results;
            displayGames();
        })
        .catch(error => console.error(error));
}

function displayGames() {
    const gamesList = document.getElementById('games-list');
    gamesList.innerHTML = '';

    // creo 4 juegos en una fila
    for (let i = 0; i < games.length; i += 4) {
        const row = document.createElement('div');
        row.classList.add('row');

        // creo una columna para cada juego
        for (let j = i; j < i + 4 && j < games.length; j++) {
            const game = games[j];

            const gameElement = document.createElement('li');
            gameElement.classList.add('col-md-3');

            // Crea un elemento de imagen y establece su origen en la imagen de fondo del juego
            const imageElement = document.createElement('img');
            imageElement.src = game.background_image;
            imageElement.alt = game.name;

            // creo un h4 para el nombre del juego
            const nameElement = document.createElement('h4');
            nameElement.textContent = game.name;

            // añade la imagen y el nombre al elemento
            gameElement.appendChild(imageElement);
            gameElement.appendChild(nameElement);

            // añade el juego a la fila
            row.appendChild(gameElement);
        }

        // añade la fila a la lista de juegos
        gamesList.appendChild(row);
    }
}

function goToPreviousPage() {
    if (currentPage > 1) {
        currentPage--;
        window.scrollTo(0, 0);
        fetchGames();
    }
}

function goToNextPage() {
    currentPage++;
    window.scrollTo(0, 0);
    fetchGames();
}

const previousButton = document.getElementById('previous-button');
previousButton.addEventListener('click', goToPreviousPage);

const nextButton = document.getElementById('next-button');
nextButton.addEventListener('click', goToNextPage);


fetchGames();
