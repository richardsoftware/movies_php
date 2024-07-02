<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

require 'conexion.php';

// Obtener todas las películas
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_GET['id'])) {
    $result = $mysqli->query("SELECT * FROM peliculas");
    $peliculas = [];
    while ($row = $result->fetch_assoc()) {
        $peliculas[] = $row;
    }
    echo json_encode($peliculas);
    exit;
}

// Obtener una película por ID
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $mysqli->real_escape_string($_GET['id']);
    $result = $mysqli->query("SELECT * FROM peliculas WHERE id = $id");
    echo json_encode($result->fetch_assoc());
    exit;
}

// Crear una nueva película
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $titulo = $mysqli->real_escape_string($data['titulo']);
    $ano_estreno = $mysqli->real_escape_string($data['ano_estreno']);
    $genero = $mysqli->real_escape_string($data['genero']);
    $director = $mysqli->real_escape_string($data['director']);
    $actores = $mysqli->real_escape_string($data['actores']);
    $sinopsis = $mysqli->real_escape_string($data['sinopsis']);
    $rating = $mysqli->real_escape_string($data['rating']);
    $poster = $mysqli->real_escape_string($data['poster']);
    $mysqli->query("INSERT INTO peliculas (titulo, ano_estreno, genero, director, actores, sinopsis, rating, poster) VALUES ('$titulo', '$ano_estreno', '$genero', '$director', '$actores', '$sinopsis', '$rating', '$poster')");
    echo json_encode(["message" => "Película agregada"]);
    exit;
}

// Actualizar una película
if ($_SERVER['REQUEST_METHOD'] === 'PUT' && isset($_GET['id'])) {
    $id = $mysqli->real_escape_string($_GET['id']);
    $data = json_decode(file_get_contents('php://input'), true);
    $titulo = $mysqli->real_escape_string($data['titulo']);
    $ano_estreno = $mysqli->real_escape_string($data['ano_estreno']);
    $genero = $mysqli->real_escape_string($data['genero']);
    $director = $mysqli->real_escape_string($data['director']);
    $actores = $mysqli->real_escape_string($data['actores']);
    $sinopsis = $mysqli->real_escape_string($data['sinopsis']);
    $rating = $mysqli->real_escape_string($data['rating']);
    $poster = $mysqli->real_escape_string($data['poster']);
    $mysqli->query("UPDATE peliculas SET titulo='$titulo', ano_estreno='$ano_estreno', genero='$genero', director='$director', actores='$actores', sinopsis='$sinopsis', rating='$rating', poster='$poster' WHERE id=$id");
    echo json_encode(["message" => "Película actualizada"]);
    exit;
}

// Eliminar una película
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
    $id = $mysqli->real_escape_string($_GET['id']);
    $mysqli->query("DELETE FROM peliculas WHERE id = $id");
    echo json_encode(["message" => "Película eliminada"]);
    exit;
}
?>
