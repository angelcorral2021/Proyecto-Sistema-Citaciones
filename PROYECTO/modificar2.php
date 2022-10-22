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
    <title>MODIFICAR</title>
</head>

<body>
    <?php
    include("funciones.php");
    $cnn = Conectar();
    ?>

    <?php
    error_reporting(0);
    date_default_timezone_set('America/Santiago'); //configurar zona horaria chile

    $DateAndTime = date('Y-m-d h:i:s a', time()); //crear variable feha y hora


    ?>

    <?php

    $rut1 = $_POST['txtrut'];
    $rut = $_SESSION['rut'];

    if ($_POST['btnfolio'] == 'BUSCAR') {
        $sql = "SELECT * FROM `funcionario` WHERE RUT = '$rut1'";
        $rs = mysqli_query($cnn, $sql);
        if (mysqli_num_rows($rs) != 0) {
            if ($row = mysqli_fetch_array($rs)) {
                $rut2 = $row[0];
                $nombre = $row[1];
                $apellido = $row[2];
                $correo = $row[3];
                $fono = $row[4];
                $tipo = $row[5];
                $usuario = $row[6];
                $pass = $row[7];
            }
        }
    }

    $sql1 = "SELECT * FROM `apoderado` WHERE RUT = '$rut1'";
    $rs = mysqli_query($cnn, $sql1);
    if (mysqli_num_rows($rs) != 0) {
        if ($row = mysqli_fetch_array($rs)) {
            $rut2 = $row[0];
            $nombre = $row[1];
            $apellido = $row[2];
            $usuario = $row[3];
            $pass = $row[4];
            $tipo = 'Apoderado';
        }
    }

    $sql5 = "SELECT * FROM `alumno` WHERE RUT = '$rut1'";
    $rs = mysqli_query($cnn, $sql5);
    if (mysqli_num_rows($rs) != 0) {
        if ($row = mysqli_fetch_array($rs)) {
            $rut2 = $row[0];
            $nombre = $row[1];
            $apellido = $row[2];
            $usuario = $row[3];
            $pass = $row[4];
            $curso = $row[5];
            $tipo = 'Estudiante';
        }
    }



    ?>

    <form action="" method="post">
        <center>
            <br><br><br><br>
            <h1>Modificar</h1>
            <tr>

<td><img src="img\update.png" alt=""></td>
</tr>
<br>
            <table border="0">
                <br>
                <tr>
                    <td>Rut Usuario: </td>
                    <td><input type="text" name="txtrut" value="<?php echo $rut2  ?>"></td>
                    <td><input type="submit" name="btnfolio" value="BUSCAR"></td>

                </tr>
                <tr>
                    <td>Nombre: </td>
                    <td><input type="text" name="txtnombre" value="<?php echo $nombre  ?>"></td>
                </tr>
                <tr>
                    <td>Apellido: </td>
                    <td><input type="text" name="txtapellido" value="<?php echo $apellido ?>"></td>

                </tr>
                <tr>
                    <td>Correo: </td>
                    <td><input type="text" name="txtcorreo" value="<?php echo $correo  ?>"></td>

                </tr>
                <tr>
                    <td>Fono: </td>
                    <td><input type="text" name="txtfono" value="<?php echo $fono ?>"></td>

                </tr>
                <tr>
                    <td>Tipo: </td>
                    <td><input type="text" name="txttipo" value="<?php echo $tipo ?>"></td>
                </tr>
                <tr>
                    <td>Usuario: </td>
                    <td><input type="text" name="txtusuario" value="<?php echo $usuario  ?>"></td>
                </tr>
                <tr>
                    <td>Pass: </td>
                    <td><input type="text" name="txtpass" value="<?php echo $pass  ?>"></td>
                </tr>
                <tr>
                    <td>Curso: </td>
                    <td><input type="text" name="txtcurso" value="<?php echo $curso  ?>"></td>
                </tr>


            </table>

            <br><br><br><br>
            <table>
                <tr>
                    <td>Usuario: </td>
                    <td><input type="text" name="txtusuarioadmin" value=""></td>
                </tr>
                <tr>
                    <td>Contraseña: </td>
                    <td><input type="text" name="txtpassadmin" value=""></td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td><input type="submit" name="btnmodificar" value="MODIFICAR"></td>
                    <td><input type="submit" name="btnsalir" value="SALIR"></td>
                </tr>
            </table>

        </center>
    </form>

    <?php
    error_reporting(0);
    $usuario = $_SESSION['usuario'];
    $usuario1 = $_POST['txtusuarioadmin'];
    $pass = $_SESSION['pass'];
    $pass1 = $_POST['txtpassadmin'];


    if ($_POST['btnmodificar'] == 'MODIFICAR') {

        if ($usuario == $usuario1 and $pass == $pass1) {

            $rut5 = $_POST['txtrut'];
            $nombre1 = $_POST['txtnombre'];
            $apellido1 = $_POST['txtapellido'];
            $correo1 = $_POST['txtcorreo'];
            $fono1 = $_POST['txtfono'];
            $tipo1 = $_POST['txttipo'];
            $usuario5 = $_POST['txtusuario'];
            $pass5 = $_POST['txtpass'];
            $curso1 = $_POST['txtcurso'];





            $sql2 = "UPDATE `funcionario` SET `NOMBRE` = '$nombre1', `APELLIDO` = '$apellido1', `CORREO` = '$correo1', 
            `FONO` = '$fono1', `USUARIO` = '$usuario5', `PASS` = '$pass5' 
            WHERE `funcionario`.`RUT` = '$rut5'";

            mysqlI_query($cnn, $sql2);

            $sql3 = "UPDATE `apoderado` SET `NOMBRE_APODERADO` = '$nombre1', `APELLIDO_APODERADO` = '$apellido1', `USUARIO` = '$usuario5', `PASS` = '$pass5' 
            WHERE `apoderado`.`RUT` = '$rut5'";

            mysqlI_query($cnn, $sql3);

            $sql6 = "UPDATE `alumno` SET `NOMBRE_ALUMNO` = '$nombre1', `APELLIDO_ALUMNO` = '$apellido1', 
            `USUARIO` = '$usuario5', `PASS` = '$pass5', `CURSO` = '$curso1' 
            WHERE `alumno`.`RUT` = '$rut5';";


            mysqlI_query($cnn, $sql6);


            echo "<script>alert('Se han grabado los datos')</script>";
        }
    }

    if ($_POST['btnsalir'] == 'SALIR') {
        echo "<script type='text/javascript'>
            window.location = 'administrador.php'
        </script>";
    };


    ?>

</body>

</html>