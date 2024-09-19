<?php   
session_start();
include('Conexion.php');

if (isset($_POST['Usuario']) && isset($_POST['Clave'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Usuario = validate($_POST['Usuario']); 
    $Clave = validate($_POST['Clave']);

    if (empty($Usuario)) {
        header("Location: Index.php?error=El Usuario Es Requerido");
        exit();
    } elseif (empty($Clave)) {
        header("Location: Index.php?error=La clave Es Requerida");
        exit();
    } else {
        // Asegúrate de que las columnas coincidan con las de la base de datos
        $Sql = "SELECT MATRICULA, CONTRASENA FROM pacientes WHERE MATRICULA = ? OR CORREO = ?";
        $stmt = mysqli_prepare($conexion, $Sql);
        mysqli_stmt_bind_param($stmt, "ss", $Usuario, $Usuario);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($Clave, $row['CONTRASENA'])) {
                $_SESSION['Usuario'] = $row['MATRICULA'];
                header("Location: Inicio.php");
                exit();
            } else {
                header("Location: Index.php?error=La clave es incorrecta");
                exit();
            }
        } else {
            header("Location: Index.php?error=El usuario no se encuentra");
            exit();
        }
    }
} else {
    header("Location: Index.php");
    exit();
}
?>
