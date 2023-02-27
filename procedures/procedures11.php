<?php
include_once "../conexion/conexion.php";
$conexion = mysqli_connect($server, $user, $pass, $db);
if (isset($_POST['ejecutar'])) {
    $valor = $_POST['valor'];

    /* PROCEDIMIENTO ALMACENADO PARA VER EL PRECIO MAS ALTO SEGUN EL PROVEEDOR
    EJEMPLO: 1
    */
    $sql = "SELECT calcular_precio_maximo_por_proveedor('$valor');";
    $resultado = mysqli_query($conexion, $sql);
    $numregistro = mysqli_num_rows($resultado);
    if ($numregistro == 0) {
        echo 'No se ha encontrado ningun registro';
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
    <link href="../vistas/ventas1.css" rel="stylesheet" type="text/css">
    <link href="../vistas/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../vistas/font-awesome.min.css">
    <link rel="stylesheet" href="../vistas/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Concesionario</title>
</head>
<header>
    <div class="flecha"><a href="../proveedores/proveedores.php"><i class=" fa fa-arrow-left" ></i></a></div>
    <br><h1>PRECIO MAS ALTO DE AUTO SEGUN PROVEEDOR</h1>
</header>
<body>
    <div>
        <div>
            <form action="procedures11.php" method="POST" class="formulario">
                <div>
                    <label for="Digite el nombre del proveedor para ver el precio mas alto"></label>
                </div>
                <div class="buscar">
                    <input type="text" name='valor' placeholder="Proveedor">
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
            <table class="table">
                <thead>
                    <?php
                    if (isset($_POST['ejecutar'])) {
                        while ($fila = mysqli_fetch_array($resultado)) {
                    ?>
                            <tr>
                                <th scope="col">PRECIO</th>
                            </tr>

                </thead>
                <tbody>


                    <tr>
                        <td><?php echo $fila[0]; ?></td>
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