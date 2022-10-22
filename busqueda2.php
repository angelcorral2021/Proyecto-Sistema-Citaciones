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
    <title>BUSQUEDA</title>
</head>

<body>
    <?php
    include("funciones.php");
    $cnn = Conectar();
    ?>


    <form action="" method="post">
        <center>
            <br><br>
            <h1>Busqueda</h1>
            <br><br>     <tr>

<td><img src="img\investigar.png" alt=""></td>
</tr><br>
            <table border="0">

                <tr>
                    <td>Folio: </td>
                    <td><input type="number" name="txtfolio" value="" onkeypress="ValidaSoloNumeros()"></td>
                    <td><input type="submit" name="btnfolio" value="BUSCAR"></td>
                    <td><a href="miPDF2.php">GENERAR PDF</a></td>
                </tr>
                <tr>
                    <td>Correo familiar: </td>
                    <td><input type="text" name="txtcorreo" value=""></td>
                    <td><input type="submit" name="btncorreo" value="BUSCAR"></td>
                    <td><a href="miPDF3.php">GENERAR PDF</a></td>
                </tr>
                <tr>
                    <td>Rut de Funcionario: </td>
                    <td><input type="text" name="txtrut" value=""></td>
                    <td><input type="submit" name="btnrut" value="BUSCAR"></td>
                    <td><a href="miPDF4.php">GENERAR PDF</a></td>
                </tr>
            </table>
            <table>
                <br><br>
                <h3>POR FECHAS DE CITACIÓN: </h3>

                <tr>
                    <td>Fecha inicial: <input type="date" name="txtfecha1" value=""> ---</td>
                    <td>Fecha final: <input type="date" name="txtfecha2" value=""></td>
                    <td><input type="submit" name="btnfechas" value="BUSCAR"></td>
                    <td><a href="miPDF5.php">GENERAR PDF</a></td>
                </tr>
            </table>



            <br><br><br><br>
            <table>
                <tr>
                    <td>

                    
                    <td><input type="submit" name="btnsalir" value="SALIR"></td>
                </tr>
            </table>

        </center>
    </form>
    <br><br><br>
    <?php
    error_reporting(0);
    $folio = $_POST['txtfolio'];
    $_SESSION['foliobusqueda'] = $_POST['txtfolio'];
    if ($_POST['btnfolio'] == 'BUSCAR') {
        $sql = "SELECT * FROM `citacion` WHERE FOLIO = $folio";

        $rs = mysqli_query($cnn, $sql);
        echo "<table align = 'center' border = '5'>";
        echo "<tr align = 'center'>";
        echo "<td><b>FOLIO</td>";
        echo "<td><b>F. CREACION</td>";
        echo "<td><b>F. CITACION</td>";
        echo "<td><b>RUT FUNCIONARIO</td>";
        echo "<td><b>CORREO FAMILIAR</td>";
        echo "<td><b>MOTIVO</td>";
        echo "<td><b>OBSERVACIONES</td>";
        echo "<td><b>ACUERDOS</td>";
        echo "<td><b>ESTADO</td>";
        echo "<tr>";
        while ($row = mysqli_fetch_array($rs)) {
            echo "<tr>";
            echo "<td>$row[FOLIO] </td>";
            echo "<td>$row[FECHA_CREACION] </td>";
            echo "<td>$row[FECHA_CITACION] </td>";
            echo "<td>$row[RUTFUNCIONARIO] </td>";
            echo "<td>$row[CORREO_FAMILIAR] </td>";
            echo "<td>$row[MOTIVO] </td>";
            echo "<td>$row[OBSERVACIONES] </td>";
            echo "<td>$row[ACUERDOS] </td>";
            echo "<td>$row[ESTADO_CITACION] </td>";
        }
        echo "</table>";
    }

    $correo = $_POST['txtcorreo'];
    $_SESSION['correo'] = $_POST['txtcorreo'];
    if ($_POST['btncorreo'] == 'BUSCAR') {
        $sql1 = "SELECT * FROM `citacion` WHERE CORREO_FAMILIAR = '$correo'";
        $rs = mysqli_query($cnn, $sql1);
        echo "<table align = 'center' border = '5'>";
        echo "<tr align = 'center'>";
        echo "<td><b>FOLIO</td>";
        echo "<td><b>F. CREACION</td>";
        echo "<td><b>F. CITACION</td>";
        echo "<td><b>RUT FUNCIONARIO</td>";
        echo "<td><b>CORREO FAMILIAR</td>";
        echo "<td><b>MOTIVO</td>";
        echo "<td><b>OBSERVACIONES</td>";
        echo "<td><b>ACUERDOS</td>";
        echo "<td><b>ESTADO</td>";
        echo "<tr>";
        while ($row = mysqli_fetch_array($rs)) {
            echo "<tr>";
            echo "<td>$row[FOLIO] </td>";
            echo "<td>$row[FECHA_CREACION] </td>";
            echo "<td>$row[FECHA_CITACION] </td>";
            echo "<td>$row[RUTFUNCIONARIO] </td>";
            echo "<td>$row[CORREO_FAMILIAR] </td>";
            echo "<td>$row[MOTIVO] </td>";
            echo "<td>$row[OBSERVACIONES] </td>";
            echo "<td>$row[ACUERDOS] </td>";
            echo "<td>$row[ESTADO_CITACION] </td>";
        }
        echo "</table>";
    }

    $rut = $_POST['txtrut'];
    $_SESSION['rutpdf'] = $_POST['txtrut'];
    if ($_POST['btnrut'] == 'BUSCAR') {
        $sql1 = "SELECT * FROM `citacion` WHERE  RUTFUNCIONARIO = '$rut'";
        $rs = mysqli_query($cnn, $sql1);
        echo "<table align = 'center' border = '5'>";
        echo "<tr align = 'center'>";
        echo "<td><b>FOLIO</td>";
        echo "<td><b>F. CREACION</td>";
        echo "<td><b>F. CITACION</td>";
        echo "<td><b>RUT FUNCIONARIO</td>";
        echo "<td><b>CORREO FAMILIAR</td>";
        echo "<td><b>MOTIVO</td>";
        echo "<td><b>OBSERVACIONES</td>";
        echo "<td><b>ACUERDOS</td>";
        echo "<td><b>ESTADO</td>";
        echo "<tr>";
        while ($row = mysqli_fetch_array($rs)) {
            echo "<tr>";
            echo "<td>$row[FOLIO] </td>";
            echo "<td>$row[FECHA_CREACION] </td>";
            echo "<td>$row[FECHA_CITACION] </td>";
            echo "<td>$row[RUTFUNCIONARIO] </td>";
            echo "<td>$row[CORREO_FAMILIAR] </td>";
            echo "<td>$row[MOTIVO] </td>";
            echo "<td>$row[OBSERVACIONES] </td>";
            echo "<td>$row[ACUERDOS] </td>";
            echo "<td>$row[ESTADO_CITACION] </td>";
        }
        echo "</table>";
    }

    $fecha1 = $_POST['txtfecha1'];
    $fecha2 = $_POST['txtfecha2'];
    $_SESSION['fecha1'] = $_POST['txtfecha1'];
    $_SESSION['fecha2'] = $_POST['txtfecha2'];
    if ($_POST['btnfechas'] == 'BUSCAR') {
        $sql2 = "SELECT * FROM `citacion` WHERE FECHA_Citacion BETWEEN '$fecha1' AND '$fecha2'";
        $rs = mysqli_query($cnn, $sql2);
        echo "<table align = 'center' border = '5'>";
        echo "<tr align = 'center'>";
        echo "<td><b>FOLIO</td>";
        echo "<td><b>F. CREACION</td>";
        echo "<td><b>F. CITACION</td>";
        echo "<td><b>RUT FUNCIONARIO</td>";
        echo "<td><b>CORREO FAMILIAR</td>";
        echo "<td><b>MOTIVO</td>";
        echo "<td><b>OBSERVACIONES</td>";
        echo "<td><b>ACUERDOS</td>";
        echo "<td><b>ESTADO</td>";
        echo "<tr>";
        while ($row = mysqli_fetch_array($rs)) {
            echo "<tr>";
            echo "<td>$row[FOLIO] </td>";
            echo "<td>$row[FECHA_CREACION] </td>";
            echo "<td>$row[FECHA_CITACION] </td>";
            echo "<td>$row[RUTFUNCIONARIO] </td>";
            echo "<td>$row[CORREO_FAMILIAR] </td>";
            echo "<td>$row[MOTIVO] </td>";
            echo "<td>$row[OBSERVACIONES] </td>";
            echo "<td>$row[ACUERDOS] </td>";
            echo "<td>$row[ESTADO_CITACION] </td>";
        }
        echo "</table>";
    }

    if ($_POST['btnpdf'] == 'GENERAR PDF') {
        echo "<script type='text/javascript'>
            window.location = 'miPDF2.php'
        </script>";
    };

   


    if ($_POST['btnsalir'] == 'SALIR') {
        echo "<script type='text/javascript'>
            window.location = 'administrador.php'
        </script>";
    };


    ?>







</body>

</html>