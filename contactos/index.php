<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "contactos";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if (!$enlace) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
        * {
            font-family: 'Courier New', Courier, monospace;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            font-size: 1.85em;
            margin-bottom: 20px;
        }

        input {
            color: black;
            font-size: 1.65em;
            border: 1px solid #ddd;
            text-align: center;
            padding: 10px;
            width: 100%;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            padding: 15px 20px;
            font-size: 1.65em;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #1FFD04;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form method="post">
            <h2>Contactame</h2>
            <input type="text" name="Nombre" placeholder="Introduce tu Nombre" required><br><br>
            <input type="email" name="Email" placeholder="Introduce tu Correo" required><br><br>
            <input type="text" name="Producto" placeholder="Introduce el Producto" required><br><br>
            <button type="submit" name="submit">Da click para enviar</button><br><br>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $nombre = mysqli_real_escape_string($enlace, $_POST['Nombre']);
    $correo = mysqli_real_escape_string($enlace, $_POST['Email']);
    $producto = mysqli_real_escape_string($enlace, $_POST['Producto']);

    $insertarContacto = "INSERT INTO contactos_business (nombre, correo, producto) VALUES ('$nombre', '$correo', '$producto')";

    $ejecutarInsertar = mysqli_query($enlace, $insertarContacto);

}
mysqli_close($enlace);
?>
