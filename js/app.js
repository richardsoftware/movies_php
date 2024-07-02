const APIURL = 'http://localhost:8080/Curso_PHP/CRUD_MOVIES/index.php';//ruta del projecto (dentro de XAMPP)

document.addEventListener('DOMContentLoaded', loadMovies);

function loadMovies() {
    fetch(APIURL)
        .then(response => response.json())
        .then(movies => {
            const table = document.getElementById('moviesTable');
            table.innerHTML = '';
            movies.forEach(movie => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${movie.titulo}</td>
                    <td>${movie.ano_estreno}</td>
                    <td>${movie.genero}</td>
                    <td>${movie.director}</td>
                    <td>${movie.actores}</td>
                    <td>${movie.sinopsis}</td>
                    <td>${movie.rating}</td>
                    <td><img src="${movie.poster}" alt="${movie.titulo}" style="width:50px;"></td>
                    <td>
                        <button onclick="editMovie(${movie.id})">Editar</button>
                        <button onclick="deleteMovie(${movie.id})">Eliminar</button>
                    </td>
                `;
                table.appendChild(row);
            });
        });
}

function showAddForm() {
    document.getElementById('formTitle').innerText = 'Agregar Película';
    document.getElementById('form').reset();
    document.getElementById('movieId').value = '';
    document.getElementById('movieForm').style.display = 'block';
}

function hideForm() {
    document.getElementById('movieForm').style.display = 'none';
}

function saveMovie() {
    const id = document.getElementById('movieId').value;
    const movie = {
        titulo: document.getElementById('titulo').value,
        ano_estreno: document.getElementById('ano_estreno').value,
        genero: document.getElementById('genero').value,
        director: document.getElementById('director').value,
        actores: document.getElementById('actores').value,
        sinopsis: document.getElementById('sinopsis').value,
        rating: document.getElementById('rating').value,
        poster: document.getElementById('poster').value
};

const method = id ? 'PUT' : 'POST';
const url = id ? `${APIURL}?id=${id}` : APIURL;

fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(movie)
    }).then(() => {
        hideForm();
        loadMovies();
    });
}

function editMovie(id) {
    fetch(`${APIURL}?id=${id}`)
        .then(response => response.json())
        .then(movie => {
            document.getElementById('movieId').value = movie.id;
            document.getElementById('titulo').value = movie.titulo;
            document.getElementById('ano_estreno').value = movie.ano_estreno;
            document.getElementById('genero').value = movie.genero;
            document.getElementById('director').value = movie.director;
            document.getElementById('actores').value = movie.actores;
            document.getElementById('sinopsis').value = movie.sinopsis;
            document.getElementById('rating').value = movie.rating;
            document.getElementById('poster').value = movie.poster;
            document.getElementById('formTitle').innerText = 'Editar Película';
            document.getElementById('movieForm').style.display = 'block';
        });
}

function deleteMovie(id) {
    fetch(`${APIURL}?id=${id}`, {
        method: 'DELETE'
    }).then(() => {
        loadMovies();
    });
}
