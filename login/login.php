<?php
if (isset($_POST['login'])) {
    session_start();
    $email = $_POST['email'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    include_once "../conexion/conexion.php";
    $conexion = mysqli_connect($server, $user, $pass, $db);
    $sql = "SELECT email, contrasena from persona where email='$email' and contrasena='$contrasena'; ";
    $resultSet = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_assoc($resultSet);
    if ($row) {
        $_SESSION['email'] = $row['email'];
        $_SESSION['contrasena'] = $row['contrasena'];
        header("Location: ../actividades/actividades.html");
    } else {
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../vistas/vistas.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7ed11fe8b2.js" crossorigin="anonymous"></script>

    <title>Concesionario</title>
</head>

<body>
    <div class="cuadrologin">
        <center>
            <div>
                <h1 class="titulo">CONCESIONARIO</h1>
            </div>
        </center>
        <center>
            <div class="imagen">
                <i class="fa-solid fa-circle-user" class="imgusuario"></i>
            </div>
        </center>

        <center>
            <div class="iniciarsesion">
                <h1>Iniciar sesión</h1>
            </div>
        </center>


        <center>
        <form method="POST" class="formulario">
            <div class="correo">
                <input type="email" name="email" class="inputcorreo" placeholder="Correo">
            </div>
           
            <div class="contraseña">
                <input type="password" name="contrasena" class="inputcontraseña" placeholder="Contraseña">
            </div>



            <div class="opciones">
                <div class="olvidecontraseña">
                    <a href="">Olvide mi contraseña</a>
                </div>
                <div class="registrarse">
                    <a href="../register/registro.php">Registrarse</a>
                </div>
            </div>
            <div >
                <button type="submit" class="btn btn-danger" style="border-radius: 20px; margin-top:11px; " name="login">ENTRAR</button>
            </div>
        </form>
    </div>
    </center>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>