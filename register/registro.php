<?php
include_once "../conexion/conexion.php";
$conexion = mysqli_connect($server, $user, $pass, $db);
if (isset($_POST['registrarse'])) {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $apellido2 = $_POST['apellido2'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $sql = "INSERT INTO persona VALUES ('$cedula','$nombre','$apellido','$apellido2','$edad','$telefono','$correo','$contrasena')";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo"<script>alert('registrado correctamente');location.href='../actividades/actividades.html'; </script>";    
    }
    else{
        echo"<script>alert('registrado incorrrecto'); location.href='registro.php';</script>";
    }
}

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../vistas/vistas2.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../vistas/ventas1.css">
    <link rel="stylesheet" href="../vistas/style.css">
    <link rel="stylesheet" href="../vistas/formulario.css">
    <link rel="stylesheet" href="../vistas/header.css">
    <link rel="stylesheet" href="../vistas/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../vistas/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title></title>
</head>
<header>
    <div class="flecha"><a href="../login/login.php"><i class=" fa fa-arrow-left" ></i></a></div>
    <br><h1>Registrarse</h1>
</header>
<body>
    <div class="inputs">
        <div class="informacion">
            <div class="complete">
                <h2>Complete la siguiente informacion</h2>
            </div>
        </div>
        <div class="register">

            <form action="registro.php" method="post" class="formulario">
                <div class="registro">
                    <label for="">Cédula</label>
                    <input type="text" name="cedula" placeholder="cédula" required>
                </div>
                <div class="registro">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" placeholder="nombre" required>
                </div>
                <div class="registro">
                    <label for="">Primer apellido</label>
                    <input type="text" name="apellido" placeholder="Primer apellido" required>
                </div>
                <div class="registro">
                    <label for="">Segundo apellido</label>
                    <input type="text" name="apellido2" placeholder="Segundo apellido" required>
                </div>
                <div class="registro">
                    <label for="">Edad</label>
                    <input type="number" name="edad" placeholder="Edad" required>
                </div>
                <div class="registro">
                    <label for="">Teléfono</label>
                    <input type="number" name="telefono" placeholder="Teléfono" required>
                </div>
                <div class="registro">
                    <label for="">Correo</label>
                    <input type="email" name="correo" placeholder="Correo" required>
                </div>
                <div class="registro">
                    <label for="">Contraseña</label>
                    <input type="password" name="contrasena" placeholder="Contraseña" required>
                </div>


                <div class="parrafo">
                    <p>Digite mínimo 8 caracteres entre números y letras</p>
                </div>

                <div >
                    <input type="submit" class="btn btn-danger" name='registrarse' value="Registrar">
                </div>
            </form>
        </div>
    </div>


</body>

</html>