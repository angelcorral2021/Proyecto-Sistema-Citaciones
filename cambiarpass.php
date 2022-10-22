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
    <title>cambiopass</title>
</head>

<body>

    <?php
    error_reporting(0);
    include("funciones.php");
    $cnn = Conectar();
    $rut = $_SESSION['rut'];
    $pass = $_SESSION['pass'];
    $tipo = $_SESSION['tipo'];

    ?>
   
    <form action="" method="POST">
        <center>
        <tr>

<td><img src="img\reset-password.png" alt=""></td>
</tr>
<br><br>
            <h1>CAMBIO DE CONTRASEÑA</h1>

            <table border="0">
                <br><br>
                <tr>
                    <td>INGRESE SU CONTRASEÑA ACTUAL: <input type="text" name="txtactual" value=""></td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td>INGRESE SU CONTRASEÑA NUEVA : <input type="text" name="txtnueva" value=""></td>
                </tr>
            </table>



            <br><br>
            <table>
                <tr>
                    <td><input type="submit" name="btnmodificar" value="MODIFICAR CONTRASEÑA"></td>
                    <td><input type="submit" name="txtvolver" value="CERRAR SESION"></td>
                </tr>
            </table>

        </center>


    </form>

    <?php
    error_reporting(0);


    if ($_POST['btnmodificar'] == 'MODIFICAR CONTRASEÑA') {

        $actual = $_POST['txtactual'];
        if ($tipo == 'Apoderado') {
            if ($pass == $actual) {
                $nueva = $_POST['txtnueva'];

                $sql2 = "UPDATE `apoderado` SET `PASS` = '$nueva' WHERE `apoderado`.`RUT` = '$rut'";
                mysqlI_query($cnn, $sql2);
                echo "<script>alert('Se han grabado los datos')</script>";
            }
        };

        if ($tipo == 'Estudiante') {
            if ($pass == $actual) {
                $nueva = $_POST['txtnueva'];

                $sql2 = "UPDATE `alumno` SET `PASS` = '$nueva' WHERE `alumno`.`RUT` = '$rut'";
                mysqlI_query($cnn, $sql2);
                echo "<script>alert('Se han grabado los datos')</script>";
            }
        };

        if ($tipo == 'Funcionario') {
            if ($pass == $actual) {
                $nueva = $_POST['txtnueva'];

                $sql2 = "UPDATE `funcionario` SET `PASS` = '$nueva' WHERE `funcionario`.`RUT` = '$rut'";
                mysqlI_query($cnn, $sql2);
                echo "<script>alert('Se han grabado los datos')</script>";
            }
        }
    }
    if ($_POST['txtvolver'] == 'CERRAR SESION') {
        echo "<script type = 'text/javascript'>window.location='index.php'</script>";
    };

    ?>

</body>

</html>