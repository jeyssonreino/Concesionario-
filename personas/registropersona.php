<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../vistas/ventas1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../vistas/formulario.css">
    <link rel="stylesheet" href="../vistas/font-awesome.min.css">
    <link rel="stylesheet" href="../vistas/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Concesionario</title>
</head>
<header>
    <div class="flecha"><a href="../personas/personas.php"><i class=" fa fa-arrow-left" ></i></a></div>
    <br><h1>REGISTRAR PERSONA </h1>
</header>
<body>
    <div class="inputs">
        <form action="registropersona.php" class="formulario" method="POST">

            <div class="registro">
                <input type="number" name='id' placeholder="Cedula" required>
            </div>
            <div class="registro">
                <input type="text" name='nombre' placeholder="Nombre" required>
            </div >
            <div class="registro">
                <input type="text" name='apellido1' placeholder="Primer Apellido" required>
            </div>
            <div class="registro">
                <input type="text" name='apellido2'placeholder="Segundo Apellido" required>
            </div>
            <div class="registro">
                <input type="number" name='edad'placeholder="Edad" required>
            </div>
            <div class="registro">
                <input type="number"  name='telefono' placeholder="Teléfono" required>
            </div>
            <div class="registro">
                <input type="email"  name='email' placeholder="Correo">
            </div>
            <div class="registro">
                <input type="password"  name='contrasena' placeholder="Contraseña" required>
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
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $sql = "INSERT INTO persona VALUES ('$id','$nombre','$apellido1','$apellido2','$edad','$telefono','$email','$contrasena')";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo"<script>alert('registrado correctamente');location.href='registropersona.php'; </script>";    
    }
    else{
        echo"<script>alert('registrado incorrrecto'); location.href='registropersona.php';</script>";
    }
}

?>