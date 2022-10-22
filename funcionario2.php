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
    <title>funcionario</title>
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


    <form id="form1" name="reloj24"    action="" method="POST">

        <center>
            <h1>Funcionario</h1>
            <tr>
                <td><img src="img\gerente.png" alt=""></td>
            </tr>
            <table border="0">
                <br><br><br>

                <h2>Datos: </h2>

                <tr>
                    <td>Rut: </td>
                    <td><input type="text" name="txtrut" value="" id="rut" maxlength="12" onChange="javascript:return Rut(document.reloj24.rut.value)"></td>
                </tr>
                <tr>
                    <td>Nombre: </td>
                    <td><input type="text" name="txtnombre" value="" onkeypress="ValidaSoloLetras()"></td>
                </tr>
                <tr>
                    <td>Apellido: </td>
                    <td><input type="text" name="txtapellido" value="" onkeypress="ValidaSoloLetras()"></td>
                </tr>
                <tr>
                    <td>Correo: </td>
                    <td><input type="text" name="txtcorreo" value=""></td>
                </tr>
                <tr>
                    <td>Fono: </td>
                    <td><input type="text" name="txtfono" value=""></td>
                </tr>
                <tr>
                    <td>Tipo: </td>
                    <td><input type="text" name="txttipo" value="" onkeypress="ValidaSoloLetras()"></td>
                </tr>
                <tr>
                    <td>Usuario: </td>
                    <td><input type="text" name="txtusuario" value=""></td>
                </tr>
                <tr>
                    <td>Pass: </td>
                    <td><input type="text" name="txtpass" value=""></td>
                </tr>

            </table>
        </center>
        <br><br><br>
        <center>

            <br><br><br>
            <input type="submit" name="btnguardar" value="CREAR"   >
            <input type="submit" name="cerrar" value="Cerrar sesion">
            <br><br>
        </center>

        <?php
        error_reporting(0);


        if ($_POST['btnguardar'] == 'CREAR') {

    
                $rut = $_POST['txtrut'];
                $nombre = $_POST['txtnombre'];
                $apellido = $_POST['txtapellido'];
                $correo = $_POST['txtcorreo'];
                $fono = $_POST['txtfono'];
                $tipo = $_POST['txttipo'];
                $usuario = $_POST['txtusuario'];
                $pass = $_POST['txtpass'];


                $sql = "INSERT INTO `funcionario` (`RUT`, `NOMBRE`, `APELLIDO`, `CORREO`, `FONO`, `TIPO`, `USUARIO`, `PASS`) 
                VALUES ('$rut', '$nombre', '$apellido', '$correo', '$fono', '$tipo', '$usuario', '$pass');";
                mysqlI_query($cnn, $sql);
                echo "<script>alert('Se han grabado los datos')</script>";
            
        }

        

        if ($_POST['cerrar'] == 'Cerrar sesion') {
            echo "<script type='text/javascript'>
            window.location = 'agregarusuario.php'
        </script>";
        }



        ?>
    </form>
</body>

</html>