<?php
include_once "../conexion/conexion.php";
$conexion = mysqli_connect($server, $user, $pass, $db);
if (isset($_POST['ejecutar'])) {
    $valor = $_POST['valor'];

    /* PROCEDIMIENTO ALMACENADO PARA VER LA INFORMACIÓN DE UNA VENTA SEGUN SU ID 
    EJEMPLO: 1
    */
    $sql = "CALL informacion_de_venta($valor);";
    $resultado = mysqli_query($conexion, $sql);
    $numregistro = mysqli_num_rows($resultado);
    if ($numregistro == 0) {
        echo 'No se ha encontrado ningun registro';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../vistas/vistas2.css" rel="stylesheet" type="text/css">
    <link href="../vistas/ventas1.css" rel="stylesheet" type="text/css">
    <link href="../vistas/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../vistas/font-awesome.min.css">
    <link rel="stylesheet" href="../vistas/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Concesionario</title>
</head>

<header>
    <div class="flecha"><a href="../ventas/ventas.php"><i class=" fa fa-arrow-left" ></i></a></div>
    <br><h1>INFORMACION DE VENTAS </h1>
</header>

<body>
    <div>
        <div>
            <form action="procedures.php" method="POST" class="formulario">
                <div>
                    <label for="Digite el ID de la venta para ver su informacion"></label>
                </div>
                <div class="buscar">
                    <input type="number" name='valor' placeholder="Escriba el ID">
                </div>
                <div class="btnbuscar">
                    <input type="submit" class="btn btn-danger" name='ejecutar' value="Enviar">
                </div>
            </form>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div>
            
            <table class="table" >
                <thead>
                    <?php
                    if (isset($_POST['ejecutar'])) {
                        while ($fila = mysqli_fetch_array($resultado)) {
                    ?>
                            <tr>
                                <th scope="col" >VENTA</th>
                                <th scope="col" >AUTOS</th>
                                <th scope="col" >CLIENTE</th>
                                <th scope="col" >EMPLEADO</th>
                                <th scope="col" >FECHA</th>
                                <th scope="col" >MONTO</th>
                                <th scope="col" >FORMA PAGO</th>

                            </tr>

                </thead>
                <tbody>


                    <tr>
                        <td><?php echo $fila['idVenta']; ?></td>
                        <td><?php echo $fila['idAutos']; ?></td>
                        <td><?php echo $fila['idCliente']; ?></td>
                        <td><?php echo $fila['idEmpleado']; ?></td>
                        <td><?php echo $fila['fecha']; ?></td>
                        <td><?php echo $fila['monto']; ?></td>
                        <td><?php echo $fila['formapago']; ?></td>

                    </tr>
            <?php
                        }
                    }
            ?>
                </tbody>

            </table>
            <?php

            ?>
        </div>
    </div>





</body>

</html>