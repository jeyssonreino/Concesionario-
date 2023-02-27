<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vistas/ventas1.css">
    <link rel="stylesheet" href="../vistas/style.css">
    <link rel="stylesheet" href="../vistas/formulario.css">
    <link rel="stylesheet" href="../vistas/font-awesome.min.css">
    <link rel="stylesheet" href="../vistas/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Concesionario</title>
</head>
<header>
    <div class="flecha"><a href="../proveedores/proveedores.php"><i class=" fa fa-arrow-left" ></i></a></div>
    <br><h1>REGISTRAR PROVEEDOR</h1>
</header>
<body>
    
    <div class="inputs">
        <form action="registroproveedor.php" method="POST" class="formulario">

            <div class="registro">
                <input type="number" name='idProveedor' placeholder="Id Proveedor" required>
            </div>
            <div class="registro">
                <input type="text" name='nombre' placeholder="Nombre" required>
            </div>
            <div class="registro">
                <input type="number" name='telefono' placeholder="Teléfono" required>
            </div>
            
            <div class="botonregistrar">
                    <input type="submit" class="btn btn-danger" name='registrarse' value="Registrar">
                </div>


        </form>
    </div>

</body>

</html>

<?php
include_once "../conexion/conexion.php";
$conexion = mysqli_connect($server, $user, $pass, $db);
if (isset($_POST['registrarse'])) {
    $idProveedor = $_POST['idProveedor'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];


    $sql = "INSERT INTO proveedor VALUES ('$idProveedor','$nombre','$telefono')";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo"<script>alert('registrado correctamente');location.href='registroproveedor.php'; </script>";    
    }
    else{
        echo"<script>alert('registrado incorrrecto'); location.href='registroproveedor.php';</script>";
    }
}

?>