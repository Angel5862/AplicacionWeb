// Conexión a la base de datos
include 'conexion.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verificar el token en la base de datos
    $query = "SELECT * FROM pacientes WHERE token_verificacion = '$token' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Actualizar el estado de verificación
        $updateQuery = "UPDATE pacientes SET verificado = TRUE WHERE token_verificacion = '$token'";
        mysqli_query($conn, $updateQuery);

        echo "Correo verificado con éxito.";
    } else {
        echo "Token inválido o ya usado.";
    }
} else {
    echo "Token no proporcionado.";
}
