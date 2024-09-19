<?php
$servername = "localhost";  // El servidor de la base de datos
$username = "root";         // El nombre de usuario por defecto en XAMPP
$password = "";             // La contraseña por defecto en XAMPP (deja en blanco si no tienes una)
$dbname = "citasmedicas";   // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
