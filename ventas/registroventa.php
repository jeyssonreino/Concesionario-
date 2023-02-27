<?php
include_once "../conexion/conexion.php";
$conexion = mysqli_connect($server, $user, $pass, $db);
$sql = "SELECT * FROM autos";
$resultado = mysqli_query($conexion, $sql);
$sql2 = "SELECT * FROM cliente";
$resultado2 = mysqli_query($conexion, $sql2);
$sql3 = "SELECT * FROM empleado";
$resultado3 = mysqli_query($conexion, $sql3);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vistas/ventas1.css">
    <link rel="stylesheet" href="../vistas/style.css">
    <link rel="stylesheet" href="../vistas/font-awesome.min.css">
    <link rel="stylesheet" href="../vistas/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Concesionario</title>
</head>
<header>
    <div class="flecha"><a href="../ventas/ventas.php"><i class=" fa fa-arrow-left" ></i></a></div>
    <br><h1>REGISTRAR VENTA </h1>
</header>
<body>
    <div class="inputs">
        
        <form action="registroventa.php" method="POST" class="formulario">

            <div class="registro">
                <select name="idA" id="" >
                    <option value="0">Seleccione el nombre del auto </option>
                    <?php foreach ($resultado as $opciones) : ?>
                        <option value="<?php echo $opciones['idAutos'] ?>"><?php echo $opciones['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="registro">
            <select name="idC" id="">
                    <option value="0" >Seleccione la cedula del cliente </option>
                    <?php foreach ($resultado2 as $opciones2) : ?>
                        <option value="<?php echo $opciones2['idCliente'] ?>"><?php echo $opciones2['id'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="registro">
            <select name="idE" id="">
                    <option value="0">Seleccione la cedula del empleado  </option>
                    <?php foreach ($resultado3 as $opciones3) : ?>
                        <option value="<?php echo $opciones3['idEmpleado'] ?>"><?php echo $opciones3['id'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="registro">
                <input type="date"  name='fecha' placeholder="Fecha" >
            </div>
            <div class="registro">
                <input type="number"  name='monto' placeholder="Monto" required>
            </div>
            <div class="registro">
                <input type="text" name='formapago' placeholder="Forma de pago" required>
            </div>

            <div class="botonregistrar">
                <input type="submit" class="btn btn-danger"  name='registrarse' value="Registrar">
            </div>
        </form>
    </div>

</body>

</html>

<?php
include_once "../conexion/conexion.php";
$conexion = mysqli_connect($server, $user, $pass, $db);
if (isset($_POST['registrarse'])) {
    $idV = 'null';
    $idA = $_POST['idA'];
    $idC = $_POST['idC'];
    $idE = $_POST['idE'];
    $fecha = $_POST['fecha'];
    $monto = $_POST['monto'];
    $formapago = $_POST['formapago'];


    $sqlinsert = "INSERT INTO venta VALUES ('$idV','$idA','$idC','$idE','$fecha','$monto','$formapago')";
    $resultadoinsert = mysqli_query($conexion, $sqlinsert);

    if ($resultadoinsert) {
        echo "<script>alert('registrado correctamente');location.href='registroventa.php'; </script>";
    } else {
        echo "<script>alert('registrado incorrrecto'); location.href='registroventa.php';</script>";
    }
}

?>