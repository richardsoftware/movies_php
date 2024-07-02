<?php
$host = 'localhost';
$db = 'movies_php';
$user = 'root';
$pass = ''; // Reemplaza con tu contraseña

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>