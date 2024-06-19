<?php

$servidor="localhost";
$usuario="root";
$clave="";
$baseDeDatos="contactos";

$enlace = mysqli_connect ($servidor, $usuario, $clave, $baseDeDatos);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="#" name="contactos" method="post">

<input type="text" name="Nombre" placeholder="nombre">
<input type="email" name="Correo" placeholder="correo">
<input type="text" name="Producto" placeholder="producto">

<input type="submit" name="registro">
<input type="reset">

</form>

</body>
</html>
    

<?php

if(isset($_POST['registro'])){

$nombre= $_POST ['nombre'];
$correo= $_POST ['correo'];
$producto= $_POST ['producto'];

$insertarContacto="INSERT INTO contacto VALUES('$Nombre','$Correo','$Producto','')";

$ejecutarInsertar= mysqli_query ($enlace,$insertarContacto);

}


?>