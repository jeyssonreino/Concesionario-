<?php
include_once "../conexion/conexion.php";
$conexion = mysqli_connect($server, $user, $pass, $db);
$sql = "SELECT * FROM proveedor";
$resultado = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">

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
    <div class="flecha"><a href="../autos/autos.php"><i class=" fa fa-arrow-left" ></i></a></div>
    <br><h1>REGISTRAR AUTOMOVIL </h1>
</header>
<body>
    <div class="inputs">
        <form action="registroautos.php" method="POST" class="formulario">
            <div class="registro">
                <input type="number" name='idAutos' placeholder="Id Auto" required>
            </div>


            <div class="seleccion">
                <select name="idProveedor" id="">
                    <option value="0">Seleccione </option>
                    <?php foreach ($resultado as $opciones) : ?>
                        <option value="<?php echo $opciones['idProveedor'] ?>"><?php echo $opciones['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="registro">
                <input type="text" name='nombre' placeholder="Nombre" required>
            </div>
            <div class="registro">
                <input type="number" name='modelo' placeholder="Modelo" required>
            </div>
            <div class="registro">
                <input type="number" name='cantidad' placeholder="Cantidad" >
            </div>
            <div class="registro">
                <input type="number" name='precio' placeholder="Precio" required>
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
    $idAutos= $_POST['idAutos'];
    $idProveedor = $_POST['idProveedor'];
    $nombre = $_POST['nombre'];
    $modelo = $_POST['modelo'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];


    $sql = "INSERT INTO autos VALUES ('$idAutos','$idProveedor','$nombre','$modelo','$cantidad','$precio')";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "<script>alert('registrado correctamente');location.href='registroautos.php'; </script>";
    } else {
        echo "<script>alert('registrado incorrrecto'); location.href='registroautos.php';</script>";
    }
}

?>