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
    <title>registrofamiliar</title>
</head>


<body>
    <?php
    include("funciones.php");
    $cnn = Conectar();
    ?>


    <?php
    error_reporting(0);
    if ($_POST['cerrar'] == 'Cerrar sesion') {
        echo "<script type = 'text/javascript'>window.location='funcionario.php'</script>";
    }
    ?>

    <?php


    if ($_POST['btncorreo'] == 'BUSCAR') {
        $correo = $_POST['txtcorreo'];
        $sql = "SELECT apoderado.RUT, apoderado.NOMBRE_APODERADO, apoderado.APELLIDO_APODERADO, alumno.RUT, alumno.NOMBRE_ALUMNO, 
        alumno.APELLIDO_ALUMNO, alumno.CURSO, registro_familiar.DIRECCION, registro_familiar.FONO 
        FROM apoderado, alumno, registro_familiar 
        WHERE (apoderado.RUT = registro_familiar.RUTAPODERADO) AND (alumno.RUT = registro_familiar.RUTALUMNO)AND (registro_familiar.CORREO = '$correo');";
        $rs = mysqli_query($cnn, $sql);
        if (mysqli_num_rows($rs) != 0) {

            if ($row = mysqli_fetch_array($rs)) {

                $rutapoderado = $row[0];
                $nombreapoderado = $row[1];
                $apellidoapoderado = $row[2];
                $rutalumno = $row[3];
                $nombreestudiante = $row[4];
                $apellidoestudiante = $row[5];
                $curso = $row[6];
                $direccion = $row[7];
                $fono = $row[8];
            }
        }
    }
    ?>

    <form action="" method="POST">

        <center>
            <h1>Registro Familiar</h1>

            <table border="0">
                <br>

                <img src="img\familia.png" alt="">
                <br><br><br>


                <tr>
                    <td>Correo familiar: </td>
                    <td><input type="text" name="txtcorreo" value="<?php echo $correo ?>" ></td>
                    <td><input type="submit" name="btncorreo" value="BUSCAR"></td>

                </tr>
                <tr>
                    <td>Rut apoderado: </td>
                    <td><input type="text" name="rutapo" value="<?php echo $rutapoderado ?>" disabled></td>
                </tr>
                <td>Nombre apoderado: </td>
                <td><input type="text" name="nombresapo" value="<?php echo $nombreapoderado  ?>" disabled></td>
                </tr>
                <tr>
                    <td>Apellido apoderado: </td>
                    <td><input type="text" name="apellidosapo" value="<?php echo $apellidoapoderado  ?>" disabled></td>
                </tr>
                <tr>
                    <td>Rut estudiante: </td>
                    <td><input type="text" name="rutalu" value="<?php echo $rutalumno ?>" disabled></td>
                </tr>

                <tr>
                    <td>Nombre estudiante: </td>
                    <td><input type="text" name="nombresalu" value="<?php echo $nombreestudiante ?>" disabled></td>
                </tr>
                <tr>
                    <td>Apellido estudiante: </td>
                    <td><input type="text" name="apellidoalu" value="<?php echo $apellidoestudiante ?>" disabled></td>
                </tr>
                <tr>
                    <td>Curso: </td>
                    <td><input type="text" name="curso" value="<?php echo $curso ?>" disabled></td>
                </tr>
                <tr>
                    <td>Dirección: </td>
                    <td><input type="text" name="direccion" value="<?php echo $direccion ?>" disabled></td>
                </tr>
                <tr>
                    <td>Fono: </td>
                    <td><input type="text" name="fono" value="<?php echo $fono ?>" disabled></td>
                </tr>







            </table>

            <br><br><br><br><br>
            <input type="submit" name="cerrar" value="Cerrar sesion">
        </center>



    </form>

</body>

</html>