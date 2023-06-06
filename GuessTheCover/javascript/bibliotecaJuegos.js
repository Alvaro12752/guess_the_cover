const apiKey = 'cd721907eaba4ec29085eebb921d5f95';
const gamesUrl = `https://api.rawg.io/api/games?dates=2000-01-01,${new Date().toISOString().slice(0, 10)}`;
let games = [];
let currentPage = 1;
const gamesPerPage = 20;

function fetchGames(searchTerm) {
    let url = `${gamesUrl}&key=${apiKey}&page=${currentPage}&page_size=${gamesPerPage}`;

    if (searchTerm) {
        url += `&search=${encodeURIComponent(searchTerm)}`;
    }

    fetch(url)
        .then(response => response.json())
        .then(data => {
            games = data.results;
            displayGames();
        })
        .catch(error => console.error(error));
}
function searchGames() {
    const searchInput = document.getElementById('search');
    const searchTerm = searchInput.value;

    fetchGames(searchTerm);
}

const searchButton = document.getElementById('search-button');
searchButton.addEventListener('click', searchGames);
function displayGames() {
    const gamesList = document.getElementById('games-list');
    gamesList.innerHTML = '';

    // crea 4 juegos en una fila
    for (let i = 0; i < games.length; i += 4) {
        const row = document.createElement('div');
        row.classList.add('row');

        // crea una columna para cada juego
        for (let j = i; j < i + 4 && j < games.length; j++) {
            const game = games[j];

            const gameElement = document.createElement('li');
            gameElement.classList.add('col-md-3');

            // crea un elemento de imagen y establece su origen en la imagen de fondo del juego
            const imageElement = document.createElement('img');
            imageElement.src = game.background_image;
            imageElement.alt = game.name;

            // crea un h4 para el nombre del juego
            const nameElement = document.createElement('h4');
            nameElement.textContent = game.name;

            // añade el evento click para mostrar los detalles del juego
            gameElement.addEventListener('click', () => {
                showGameDetails(game);
            });

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

function showGameDetails(game) {
    const gamePageUrl = `detallesvideojuegos.html?id=${game.id}`;
    window.open(gamePageUrl, '_blank');

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
function resetSearch() {
    const searchInput = document.getElementById('search');
    searchInput.value = '';
    searchTerm = '';
    currentPage = 1; // Resetear la página actual al restablecer la búsqueda
    fetchGames();
}
const resetButton = document.getElementById('reset-button');
resetButton.addEventListener('click', resetSearch);

const previousButton = document.getElementById('previous-button');
previousButton.addEventListener('click', goToPreviousPage);

const nextButton = document.getElementById('next-button');
nextButton.addEventListener('click', goToNextPage);

fetchGames();