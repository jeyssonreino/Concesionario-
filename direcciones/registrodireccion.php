<?php
include_once "../conexion/conexion.php";
$conexion = mysqli_connect($server, $user, $pass, $db);
$sql = "SELECT * FROM proveedor";
$resultado = mysqli_query($conexion, $sql);
$sql2 = "SELECT * FROM persona";
$resultado2 = mysqli_query($conexion, $sql2);

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario</title>
</head>

<body>
    <h1>REGISTRAR DIRECCIÓN</h1>
    <div>
        <form action="registrodireccion.php" method="POST">
            <div>
                <input type="number" name='idDireccion' placeholder="Id Dirección" required>
            </div>

            <div>
            <select name="idPersona" id="">
                    <option value="null">Seleccione </option>   
                    <?php foreach ($resultado2 as $opciones2) : ?>
                        <option value="<?php echo $opciones2['id'] ?>"><?php echo $opciones2['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <select name="idProveedor" id="">
                    <option value="null">Seleccione </option>
                    <?php foreach ($resultado as $opciones) : ?>
                        <option value="<?php echo $opciones['idProveedor'] ?>"><?php echo $opciones['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div>
                <input type="text" name='ciudad' placeholder="Ciudad" required>
            </div>
            <div>
                <input type="text" name='barrio' placeholder="Barrio" >
            </div>
            <div>
                <input type="number" name='carrera' placeholder="Carrera" required>
            </div>
            <div>
                <input type="number" name='calle' placeholder="Calle" required>
            </div>

            <div class="botonregistrar">
                <input type="submit" name='registrarse' value="Registrar">
            </div>
        </form>
    </div>

</body>

</html>

<?php
include_once "../conexion/conexion.php";
$conexion = mysqli_connect($server, $user, $pass, $db);
if (isset($_POST['registrarse'])) {
    $idDireccion= $_POST['idDireccion'];
    $idPersona = $_POST['idPersona'];
    $idProveedor = $_POST['idProveedor'];
    $ciudad = $_POST['ciudad'];
    $barrio = $_POST['barrio'];
    $carrera = $_POST['carrera'];
    $calle = $_POST['calle'];


    $sql = "INSERT INTO direccion VALUES ('$idDireccion','$idPersona','$idProveedor','$ciudad','$barrio','$carrera','$calle')";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "<script>alert('registrado correctamente');location.href='registrodireccion.php'; </script>";
    } else {
        echo "<script>alert('registrado incorrrecto'); location.href='registrodireccion.php';</script>";
    }
}

?>