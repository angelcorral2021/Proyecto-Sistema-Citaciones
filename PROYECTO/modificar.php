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

    $folio = $_POST['txtfolio'];
    $rut = $_SESSION['rut'];

    if ($_POST['btnfolio'] == 'BUSCAR') {
        $sql = "SELECT * FROM `citacion` WHERE FOLIO = $folio";
        $rs = mysqli_query($cnn, $sql);
        if (mysqli_num_rows($rs) != 0) {
            if ($row = mysqli_fetch_array($rs)) {
                $_SESSION['folioactual'] = $row[0];
                $fechacitacion = $row[2];
                $correo = $row[4];
                $motivo = $row[5];
                $observacion = $row[6];
                $acuerdo = $row[7];
                $estado = $row[8];
            }
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
                    <td>Folio: </td>
                    <td><input type="number" name="txtfolio" value=""></td>
                    <td><input type="submit" name="btnfolio" value="BUSCAR"></td>

                </tr>
                <tr>
                    <td>Folio Actual: </td>
                    <td><input type="text" name="txtfolioactual" value="<?php echo $folio  ?>" disabled></td>
                </tr>
                <tr>
                    <td>Fecha modificación: </td>
                    <td><input type="text" name="txtfcrea" value="<?php echo $DateAndTime ?>" readonly></td>

                </tr>
                <tr>
                    <td>Fecha citación: </td>
                    <td><input type="text" name="txtfcitacionantigua" value="<?php echo $fechacitacion  ?>" disabled></td>

                </tr>
                <tr>
                    <td>Fecha citación nueva: </td>
                    <td><input type="text" name="txtfcita" value="<?php echo $DateAndTime ?>"></td>

                </tr>
                <tr>
                    <td>Correo familiar: </td>
                    <td><input type="text" name="txtcorreo" value="<?php echo $correo ?>" disabled></td>
                </tr>
                <tr>
                    <td>Motivo: </td>
                    <td><input type="text" name="txtmotivo" value="<?php echo $motivo  ?>"></textarea></td>
                </tr>
                <tr>
                    <td>Observaciones: </td>
                    <td><input type="text" name="txtobservacion" value="<?php echo $observacion  ?>"></textarea></td>
                </tr>
                <tr>
                    <td>Acuerdos: </td>
                    <td><input type="text" name="txtacuerdos" value="<?php echo $acuerdo  ?>"></textarea></td>
                </tr>
                <tr>
                    <td>Estado: </td>
                    <td><input type="text" name="txtestado" value="<?php echo $estado  ?>"></td>
                </tr>

            </table>

            <br><br><br><br>
            <table>
                <tr>
                    <td>Usuario: </td>
                    <td><input type="text" name="txtusuario" value=""></td>
                </tr>
                <tr>
                    <td>Contraseña: </td>
                    <td><input type="text" name="txtpass" value=""></td>
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
    $usuario1 = $_POST['txtusuario'];
    $pass = $_SESSION['pass'];
    $pass1 = $_POST['txtpass'];

    if ($_POST['btnmodificar'] == 'MODIFICAR') {
        
        if($usuario == $usuario1 AND $pass == $pass1){
            
        
        $folioactual = $_SESSION['folioactual'];
        $usuario = $_SESSION['usuario'];
        
        $fcrea1 = $_POST['txtfcrea'];
        $fcita1 = $_POST['txtfcita'];
        $correo11 = $_POST['txtcorreo'];
        $motivo1 = $_POST['txtmotivo'];
        $observacion1 = $_POST['txtobservacion'];
        $acuerdos1 = $_POST['txtacuerdos'];
        $estado1 = $_POST['txtestado'];



        $sql = "UPDATE `citacion` SET `FECHA_CREACION` = '$fcrea1', `FECHA_CITACION` = '$fcita1', `MOTIVO` = '$motivo1',
        `OBSERVACIONES` = '$observacion1', `ACUERDOS` = '$acuerdos1', `ESTADO_CITACION` = '$estado1' 
        WHERE (`citacion`.`FOLIO` = '$folioactual') ";
        mysqlI_query($cnn, $sql);
        echo "<script>alert('Se han grabado los datos')</script>";
    }

}

    if ($_POST['btnsalir'] == 'SALIR') {
        echo "<script type='text/javascript'>
            window.location = 'bienvenida.php'
        </script>";
    };


    ?>

</body>

</html>