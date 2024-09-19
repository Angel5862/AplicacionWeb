<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "citasmedicas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener los datos del formulario
$matricula = isset($_POST['matricula']) ? $conn->real_escape_string($_POST['matricula']) : '';
$contrasena = isset($_POST['contrasena']) ? $conn->real_escape_string($_POST['contrasena']) : '';

// Consultar la base de datos
$sql = "SELECT * FROM pacientes WHERE MATRICULA = '$matricula' AND CONTRASENA = '$contrasena'";
$result = $conn->query($sql);

// Verificar si la consulta devolvió un resultado
if ($result->num_rows > 0) {
    // Iniciar sesión y redirigir
    echo 'success'; // O redirigir aquí si es necesario
} else {
    // Devolver mensaje de error
    echo 'Matrícula o contraseña incorrectos';
}

// Cerrar conexión
$conn->close();
?>
