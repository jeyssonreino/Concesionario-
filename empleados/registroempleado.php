<?php
include_once "../conexion/conexion.php";
$conexion = mysqli_connect($server, $user, $pass, $db);
$sql = "SELECT * FROM persona";
$resultado = mysqli_query($conexion, $sql);

?>

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
    <div class="flecha"><a href="../empleados/empleados.php"><i class=" fa fa-arrow-left" ></i></a></div>
    <br><h1>REGISTRAR EMPLEADO</h1>
</header>
<body>
    <div class="inputs">
        <form action="registroempleado.php" method="POST" class="formulario">

            <div class="seleccion">
                <select name="idEmpleado" id="">
                    <option value="0">Seleccione </option>
                    <?php foreach ($resultado as $opciones) : ?>
                        <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="registro">
                <input type="number" name='id' placeholder="Id Empleado" required>
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
    $idEmpleado = $_POST['idEmpleado'];


    $sql = "INSERT INTO empleado VALUES ('$id','$idEmpleado')";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "<script>alert('registrado correctamente');location.href='registroempleado.php'; </script>";
    } else {
        echo "<script>alert('registrado incorrrecto'); location.href='registroempleado.php';</script>";
    }
}

?>