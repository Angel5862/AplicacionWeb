<?php
date_default_timezone_set('America/Mexico_City');  // Establece la zona horaria
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $primerApellido = $_POST['primer-apellido'];
    $segundoApellido = $_POST['segundo-apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $edad = $_POST['edad'];
    $carrera = $_POST['carrera'];
    $semestre = $_POST['semestre'];
    $contrasena = $_POST['contrasena'];

    // Generar la fecha de registro actual con la zona horaria correcta
    $fechaRegistro = date('Y-m-d');

    // Validar y limpiar los datos
    $telefono = filter_var($telefono, FILTER_SANITIZE_NUMBER_INT);

    // Preparar y ejecutar la consulta de inserción
    $stmt = $conn->prepare("INSERT INTO pacientes (MATRICULA, NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, CORREO, TELEFONO, EDAD, CARRERA, SEMESTRE, CONTRASENA, FECHA_REGISTRO) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $matricula, $nombre, $primerApellido, $segundoApellido, $correo, $telefono, $edad, $carrera, $semestre, $contrasena, $fechaRegistro);

    if ($stmt->execute()) {
        header("Location: InicioPagina.html");
    } else {
        echo "Error en el registro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
