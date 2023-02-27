<?php
include_once "../conexion/conexion.php";
$conexion = mysqli_connect($server, $user, $pass, $db);
$sql = "SELECT * FROM proveedor";
$resultado = mysqli_query($conexion, $sql);
$numregistro = mysqli_num_rows($resultado);

if ($numregistro == 0) {
    echo 'No se ha encontrado ningun registro';
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../vistas/ventas1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../vistas/font-awesome.min.css">
    <link rel="stylesheet" href="../vistas/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Concesionario</title>
</head>

<header>
    <div class="flecha"><a href="../proveedores/proveedores.php"><i class=" fa fa-arrow-left" ></i></a></div>
    <br><h1>PROVEEDORES REGISTRADOS</h1>
</header>

<body>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">PROVEEDOR</th>
                    <th scope="col">TELEFONO</th>
                </tr>

            </thead>
            <tbody>

                <?php
                while ($fila = mysqli_fetch_array($resultado)){

                
                ?>
                <tr>
                    <td><?php echo $fila['idProveedor'];?></td>
                    <td><?php echo $fila['nombre'];?></td>
                    <td><?php echo $fila['telefono'];?></td>

                </tr>
                <?php
                }   
                ?>
            </tbody>

        </table>
    </div>



</body>

</html>