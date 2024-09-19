<?php
session_start();
include 'conexion.php'; // Asegúrate de tener este archivo con los datos de conexión a la base de datos.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matricula = $_POST['matricula'];
    $contrasena = $_POST['contrasena'];

    // Conectar a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar y ejecutar la consulta
    $sql = "SELECT * FROM pacientes WHERE MATRICULA = ? AND CONTRASENA = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $matricula, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Iniciar sesión
        $_SESSION['matricula'] = $matricula;
        header("Location: InicioPaguina.html"); // Redirige a la página principal después de iniciar sesión
    } else {
        echo "<script>document.getElementById('error-message').innerText = 'Matrícula o contraseña incorrectos';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
