const apiKey = '8f7fb1324c844422ef19ce9b1d4afd65';
const moviesUrl = `https://api.themoviedb.org/3/movie/popular?api_key=${apiKey}&language=en-US`;
let movies = [];
let currentPage = 1;
const moviesPerPage = 20;

function fetchMovies(searchTerm = '') {
    let url = `${moviesUrl}&page=${currentPage}`;

    if (searchTerm) {
        url = `https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&language=en-US&query=${encodeURIComponent(searchTerm)}`;
    }

    fetch(url)
        .then(response => response.json())
        .then(data => {
            movies = data.results;
            displayMovies();
        })
        .catch(error => console.error(error));
}

function displayMovies() {
    const moviesList = document.getElementById('movies-list');
    moviesList.innerHTML = '';

    // Creo 4 películas en una fila
    for (let i = 0; i < movies.length; i += 4) {
        const row = document.createElement('div');
        row.classList.add('row');

        // Creo una columna para cada película
        for (let j = i; j < i + 4 && j < movies.length; j++) {
            const movie = movies[j];

            const movieElement = document.createElement('li');
            movieElement.classList.add('col-md-3');

            // Crea un elemento de imagen y establece su origen en la imagen de la película
            const imageElement = document.createElement('img');
            imageElement.src = `https://image.tmdb.org/t/p/w500${movie.poster_path}`;
            imageElement.alt = movie.title;

            // Añade un event listener al hacer clic en la imagen
            imageElement.addEventListener('click', () => {
                openMoviePage(movie);
            });

            // Creo un h4 para el título de la película
            const titleElement = document.createElement('h4');
            titleElement.textContent = movie.title;

            // Añade la imagen y el título al elemento
            movieElement.appendChild(imageElement);
            movieElement.appendChild(titleElement);

            // Añade la película a la fila
            row.appendChild(movieElement);
        }

        // Añade la fila a la lista de películas
        moviesList.appendChild(row);
    }
}

function openMoviePage(movie) {
    // Abre una nueva página HTML con los detalles de la película
    const moviePageUrl = `detallespeliculas.html?id=${movie.id}`;
    window.open(moviePageUrl, '_blank');
}

function goToPreviousPage() {
    if (currentPage > 1) {
        currentPage--;
        window.scrollTo(0, 0);
        fetchMovies();
    }
}

function goToNextPage() {
    currentPage++;
    window.scrollTo(0, 0);
    fetchMovies();
}

function searchMovies() {
    const searchInput = document.getElementById('search');
    const searchTerm = searchInput.value.trim();

    if (searchTerm !== '') {
        fetchMovies(searchTerm);
    }
}
function resetSearch() {
    const searchInput = document.getElementById('search');
    searchInput.value = '';
    searchTerm = '';
    currentPage = 1; // Resetear la página actual al restablecer la búsqueda
    fetchMovies();
}
const resetButton = document.getElementById('reset-button');
resetButton.addEventListener('click', resetSearch);

const previousButton = document.getElementById('previous-button');
previousButton.addEventListener('click', goToPreviousPage);

const nextButton = document.getElementById('next-button');
nextButton.addEventListener('click', goToNextPage);

const searchButton = document.getElementById('search-button');
searchButton.addEventListener('click', searchMovies);

fetchMovies();
