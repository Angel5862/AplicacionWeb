<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Inicio de sesión</title>
</head>
<body>
    <form action="IniciarSesion.php" method="POST">
        <h1>INICIAR SESIÓN</h1>
        <hr>
        <?php 
            if (isset($_GET['error'])) {
                ?>
                <p class="error">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </p>
                <?php    
            }
        ?>
        <hr>
        <i class="fa-solid fa-user"></i>
        <label>Usuario</label>
        <input type="text" name="Usuario" placeholder="Nombre de usuario" required>
        <i class="fa-solid fa-unlock"></i>
        <label>Clave</label>
        <input type="password" name="Clave" placeholder="Clave" required>
        <hr>
        <button type="submit">Iniciar Sesión</button>
        <a href="CrearCuenta.php">Crear Cuenta</a>
    </form>
</body>
</html>
