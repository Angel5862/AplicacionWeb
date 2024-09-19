<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .confirmation-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .checkmark {
            font-size: 60px;
            color: #28a745;
            display: inline-block;
            border: 5px solid #28a745;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            line-height: 80px;
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }
        .checkmark::before {
            content: '✔';
            font-size: 60px;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            text-align: center;
            color: white;
        }
        .message {
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="confirmation-container">
        <div class="checkmark"></div>
        <div class="message">¡Registro Exitoso! Los datos se han guardado correctamente.</div>
    </div>

</body>
</html>
