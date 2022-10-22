<?php
session_start();

if (!isset($_SESSION['rut'])) {
    session_destroy();
    header("Location:index.php");
} else {
    $_SESSION['rut'] =  $_SESSION['rut'];
}

?>





<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>administrador</title>
</head>


<body>

    <?php
    include("funciones.php");
    $cnn = Conectar();
    ?>

    <?php
    error_reporting(0);

    $rut = $_SESSION['rut'];
    $sql = "SELECT * FROM `funcionario` WHERE `RUT` = '$rut'";
    $rs = mysqli_query($cnn, $sql);
    if (mysqli_num_rows($rs) != 0) {
        if ($row = mysqli_fetch_array($rs)) {

            $nombre = $row[1]; //nombre
            $cargo = $row[5]; //cargo
            $apellido = $row[2]; //apellido
            $correo = $row[3]; //correo
        }
    }
    ?>


    <form action="" method="POST">

        <center>
            <h1>Menu Administrador</h1>
            <tr>
                <td><img src="img\gestion-de-datos.png" alt=""></td>
            </tr>
            <table border="0">
                <br><br>

                <h2>Sus datos: </h2>
                <tr>
                    <td>Correo: </td>
                    <td><input type="text" name="correo" value="<?php echo $correo  ?>" disabled></td>
                </tr>
                <tr>
                    <td>Rut: </td>
                    <td><input type="text" name="rut" value="<?php echo $rut  ?>" disabled></td>
                </tr>
                <tr>
                    <td>Nombre: </td>
                    <td><input type="text" name="nombre" value="<?php echo $nombre  ?>" disabled></td>
                </tr>
                <tr>
                    <td>Apellido: </td>
                    <td><input type="text" name="apellido" value="<?php echo $apellido  ?>" disabled></td>
                </tr>
                <tr>
                    <td>Cargo: </td>
                    <td><input type="text" name="cargo" value="<?php echo $cargo  ?>" disabled></td>
                </tr>
            </table>
            <br>
            <tr>

                <td><input type="submit" name="cambiarpass" value="Cambiar contraseña"></td>
            </tr>

        </center>
        <br><br>
        <center>

            <input type="submit" name="a/efuncio" value="Agregar Usuario">
            <input type="submit" name="a/eapo" value="Eliminar Usuario">
            <br>


            <br><br>
            <input type="submit" name="btnhistorial" value="Historial citaciones">
            <input type="submit" name="btnmodificar" value="Modificar datos Usuario">
            <br><br>


            <br>
            <input type="submit" name="cerrar" value="Cerrar sesion">
        </center>
    </form>
    <?php

    if ($_POST['cambiarpass'] == 'Cambiar contraseña') {
        echo "<script type='text/javascript'>
    window.location = 'cambiarpass.php'
</script>";
    }


    if ($_POST['a/efuncio'] == 'Agregar Usuario') {
        echo "<script type='text/javascript'>
    window.location = 'agregarusuario.php'
</script>";
    }

    if ($_POST['a/eapo'] == 'Eliminar Usuario') {
        echo "<script type='text/javascript'>
    window.location = 'eliminarusuario.php'
</script>";
    }


    if ($_POST['btnhistorial'] == 'Historial citaciones') {
        echo "<script type='text/javascript'>
    window.location = 'busqueda2.php'
</script>";
    }

    if ($_POST['btnmodificar'] == 'Modificar datos Usuario') {
        echo "<script type='text/javascript'>
    window.location = 'modificar2.php'
</script>";
    }

    if ($_POST['cerrar'] == 'Cerrar sesion') {
        echo "<script type = 'text/javascript'>window.location='index.php'</script>";
    }

    ?>
</body>

</html>