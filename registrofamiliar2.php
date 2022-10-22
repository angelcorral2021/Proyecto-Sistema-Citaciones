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
    <script type="text/javascript" src="css-js/jquery.js"></script>
    <script type="text/javascript" src="css-js/jquery.Rut.js"></script>
    <script type="text/javascript" src="css-js/jquery-ui.js"></script>
    <script type="text/javascript" src="css-js/jquery.validate.js"></script>
    <script type="text/javascript" src="css-js/validarut.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#rut").Rut({
                format_on: 'keyup'
            })
        });
    </script>
    <style type="text/css">
        .boton_1 {
            text-decoration: none;
            padding: 3px;
            padding-left: 10px;
            padding-right: 10px;
            font-family: helvetica;
            font-weight: 300;
            font-size: 10px;
            font-style: italic;
            color: #FBFCFD;
            background-color: #427CFA;
            border-radius: 15px;
            border: 3px double #006505;
        }

        .boton_1:hover {
            opacity: 0.6;
            text-decoration: none;
        }
    </style>
</head>


<body>
    <?php
    include("funciones.php");
    $cnn = Conectar();
    ?>








    <form id="form1" name="reloj24" action="" method="POST">

        <center>
            <h1>Registro Familiar</h1>

            <table border="0">
                <br>

                <img src="img\familia.png" alt="">
                <br><br><br>


                <tr>
                    <td>Correo familiar: </td>
                    <td><input type="text" name="txtcorreo" value=""></td>


                </tr>
                <tr>
                    <td>Rut apoderado: </td>
                    <td><input type="text" name="txtrutapo" value="" id="rut1" maxlength="12" onChange="javascript:return Rut(document.reloj24.rut.value)"></td>
                </tr>
                <tr>
                    <td>Rut estudiante: </td>
                    <td><input type="text" name="txtrutalu" value="" id="rut2" maxlength="12" onChange="javascript:return Rut(document.reloj24.rut.value)"></td>
                </tr>
                <tr>
                    <td>Dirección: </td>
                    <td><input type="text" name="txtdireccion" value=""></td>
                </tr>
                <tr>
                    <td>Fono: </td>
                    <td><input type="text" name="txtfono" value=""></td>
                </tr>







            </table>

            <br><br><br><br><br>
            <input type="submit" name="btnguardar" value="CREAR">
            <input type="submit" name="cerrar" value="Cerrar sesion">
        </center>



    </form>

    <?php
    error_reporting(0);

    if ($_POST['btnguardar'] == 'CREAR') {


        $correo = $_POST['txtcorreo'];
        $rutapoderado1 = $_POST['txtrutapo'];
        $rutalumno1 = $_POST['txtrutalu'];
        $direccion1 = $_POST['txtdireccion'];
        $fono1 = $_POST['txtfono'];



        $sql = "INSERT INTO `registro_familiar`(`CORREO`, `RUTAPODERADO`, `RUTALUMNO`, `DIRECCION`, `FONO`)
         VALUES ('$correo','$rutapoderado1','$rutalumno1','$direccion1','$fono1')";
        mysqlI_query($cnn, $sql);
        echo "<script>alert('Se han grabado los datos')</script>";
    }

    if ($_POST['cerrar'] == 'Cerrar sesion') {
        echo "<script type = 'text/javascript'>window.location='agregarusuario.php'</script>";
    }
    ?>
</body>

</html>