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
    <script>
        function ValidaSoloNumeros() {
            if ((event.keyCode < 48) || (event.keyCode > 57))
                event.returnValue = false;
        }

        function ValidaSoloLetras() {
            if ((event.keyCode != 32) && (event.keyCode < 65) ||
                (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
                event.returnValue = false;
        }
    </script>
    <title>alumno</title>
    <script type="text/javascript" src="css-js/jquery.js"></script>
<script type="text/javascript" src="css-js/jquery.Rut.js"></script>
<script type="text/javascript" src="css-js/jquery-ui.js"></script>
<script type="text/javascript" src="css-js/jquery.validate.js"></script>
<script type="text/javascript" src="css-js/validarut.js"></script>
<script type="text/javascript">
$(document).ready(function(){	
	$("#rut").Rut({
    format_on: 'keyup'
	})
});
</script>
<style type="text/css">
  .boton_1{
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
  .boton_1:hover{
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

    <?php
    error_reporting(0);

    $rut = $_SESSION['rut'];
    $sql = "SELECT * FROM `ALUMNO` WHERE `RUT` = '$rut'";
    $rs = mysqli_query($cnn, $sql);
    if (mysqli_num_rows($rs) != 0) {
        if ($row = mysqli_fetch_array($rs)) {

            $nombre = $row[2]; //nombre
            $apellido = $row[3]; //apellido
            $curso = $row[5]; //curso
        }
    }
    ?>


    <form action="" method="POST" id="form1" name="reloj24">

        <center>
            <h1>Alumno</h1>
            <tr>

                <td><img src="img\estudiante.png" alt=""></td>
            </tr>
            <table border="0">
                <br><br><br>



                <h2>Datos: </h2>
                <tr>
                    <td>Rut: </td>
                    <td><input type="text" name="txtrut" value="" id="rut" maxlength="12" onChange="javascript:return Rut(document.reloj24.rut.value)" ></td>
                </tr>
                <tr>
                    <td>Nombre: </td>
                    <td><input type="text" name="txtnombre" value=""onkeypress="ValidaSoloLetras()"></td>
                </tr>
                <tr>
                    <td>Apellido: </td>
                    <td><input type="text" name="txtapellido" value=""onkeypress="ValidaSoloLetras()"></td>
                </tr>
                <tr>
                    <td>Usuario: </td>
                    <td><input type="text" name="txtusuario" value=""></td>
                </tr>
                <tr>
                    <td>Pass: </td>
                    <td><input type="text" name="txtpass" value=""></td>
                </tr>
                <tr>
                    <td>Curso: </td>
                    <td><input type="text" name="txtcurso" value=""></td>
                </tr>







            </table>


        </center>
        <br><br><br>
        <center>


        <input type="submit" name="btnguardar" value="CREAR">
            <input type="submit" name="cerrar" value="Cerrar sesion">

        </center>
    </form>
    <?php
    error_reporting(0);

    if ($_POST['btnguardar'] == 'CREAR') {

    
        $rut = $_POST['txtrut'];
        $nombre = $_POST['txtnombre'];
        $apellido = $_POST['txtapellido'];
        $usuario = $_POST['txtusuario'];
        $pass = $_POST['txtpass'];
        $curso = $_POST['txtcurso'];
    
    
        $sql = "INSERT INTO `alumno` (`RUT`, `NOMBRE_ALUMNO`, `APELLIDO_ALUMNO`, `USUARIO`, `PASS`, `CURSO`) 
        VALUES ('$rut', '$nombre', '$apellido', '$usuario', '$pass', '$curso');";
        mysqlI_query($cnn, $sql);
        echo "<script>alert('Se han grabado los datos')</script>";
    
    }
    
    if ($_POST['cerrar'] == 'Cerrar sesion') {
        echo "<script type = 'text/javascript'>window.location='agregarusuario.php'</script>";
    }
    ?>
</body>

</html>