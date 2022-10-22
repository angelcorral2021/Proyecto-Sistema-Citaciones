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
    <title>CREAR</title>
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

    if ($_POST['cancelar'] == 'Cancelar') {
        echo "<script type = 'text/javascript'>window.location='bienvenida.php'</script>";
    }
    ?>

    <form action="" method="POST">


        <center>
            <h1>CREAR CITACIÓN</h1>
            <tr>

                <td><img src="img\ventana-web.png" alt=""></td>
            </tr>
            <table border="0">
                <br><br>

                <tr>
                    <td>Fecha creación: </td>
                    <td><input type="text" name="txtfcrea" value="<?php echo $DateAndTime ?>" readonly></td>

                </tr>
                <tr>
                    <td>Fecha citación: </td>
                    <td><input type="text" name="txtfcita" value="<?php echo $DateAndTime ?>"></td>

                </tr>
                <tr>
                    <td>Correo familiar: </td>
                    <td><input type="text" name="txtcorreo" value=""></td>
                </tr>
                <tr>
                    <td>Motivo: </td>
                    <td><textarea name="txtmotivo" value=""></textarea></td>
                </tr>
                <tr>
                    <td>Observaciones: </td>
                    <td><textarea name="txtobservacion" value=""></textarea></td>
                </tr>
                <tr>
                    <td>Acuerdos: </td>
                    <td><textarea name="txtacuerdos" value=""></textarea></td>
                </tr>
                <tr>
                    <td>Estado: </td>
                    <td><input type="text" name="txtestado" value=""></td>
                </tr>

            </table>
        </center>
        <br><br>
        <center>


            <br><br>
            <input type="submit" name="btnguardar" value="Guardar">
            <input type="submit" name="generar" value="Enviar">
            <input type="submit" name="cancelar" value="Cancelar">

            <br>
        </center>
    </form>
    <?php

    error_reporting(0);

    if ($_POST['btnguardar'] == 'Guardar') {

        $rut = $_SESSION['rut'];
        $folio = $_POST['txtfolio'];
        $fcreacion = $_POST['txtfcrea'];
        $fcitacion = $_POST['txtfcita'];
        $correo = $_POST['txtcorreo'];
        $motivo = $_POST['txtmotivo'];
        $oservacion = $_POST['txtobservacion'];
        $acuerdos = $_POST['txtacuerdos'];
        $estado = $_POST['txtestado'];


        if (empty($rut) || empty($fcitacion)  || empty($correo) || empty($motivo) || empty($acuerdos) || empty($estado)) {
            echo "<script> alert('Los campos obligatorios deben contener datos')</script>";
        } else {

            $sql = "INSERT INTO `citacion`(`FECHA_CREACION`, `FECHA_CITACION`, `RUTFUNCIONARIO`, `CORREO_FAMILIAR`, `MOTIVO`, `OBSERVACIONES`, `ACUERDOS`, `ESTADO_CITACION`)
        VALUES ('$fcreacion','$fcitacion','$rut', '$correo'
        ,'$motivo','$oservacion','$acuerdos','$estado')";
            mysqlI_query($cnn, $sql);
            echo "<script> alert('El registro se ha ingresado correctamente')</script>";
        }
    }



    ?>




</body>

</html>