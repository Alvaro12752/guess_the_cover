const apiKey = '8f7fb1324c844422ef19ce9b1d4afd65';
const moviesUrl = `https://api.themoviedb.org/3/movie/popular?api_key=${apiKey}&language=en-US`;
let movies = [];
let currentPage = 1;
const moviesPerPage = 20;

function fetchMovies() {
    fetch(`${moviesUrl}&page=${currentPage}`)
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

    // creo 4 películas en una fila
    for (let i = 0; i < movies.length; i += 4) {
        const row = document.createElement('div');
        row.classList.add('row');

        // creo una columna para cada película
        for (let j = i; j < i + 4 && j < movies.length; j++) {
            const movie = movies[j];

            const movieElement = document.createElement('li');
            movieElement.classList.add('col-md-3');

            // Crea un elemento de imagen y establece su origen en la imagen de la película
            const imageElement = document.createElement('img');
            imageElement.src = `https://image.tmdb.org/t/p/w500${movie.poster_path}`;
            imageElement.alt = movie.title;

            // creo un h4 para el título de la película
            const titleElement = document.createElement('h4');
            titleElement.textContent = movie.title;

            // añade la imagen y el título al elemento
            movieElement.appendChild(imageElement);
            movieElement.appendChild(titleElement);

            // añade la película a la fila
            row.appendChild(movieElement);
        }

        // añade la fila a la lista de películas
        moviesList.appendChild(row);
    }
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
const previousButton = document.getElementById('previous-button');
previousButton.addEventListener('click', goToPreviousPage);

const nextButton = document.getElementById('next-button');
nextButton.addEventListener('click', goToNextPage);

fetchMovies();

