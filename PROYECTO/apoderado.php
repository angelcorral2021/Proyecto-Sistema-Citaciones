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
    <title>apoderado</title>
</head>


<body>
    <?php
    include("funciones.php");
    $cnn = Conectar();
    ?>

    <?php
    error_reporting(0);

    $rut = $_SESSION['rut'];
    $sql = "SELECT * FROM `apoderado` WHERE `RUT` = '$rut'";
    $rs = mysqli_query($cnn, $sql);
    if (mysqli_num_rows($rs) != 0) {
        if ($row = mysqli_fetch_array($rs)) {

            $nombre = $row[1]; //nombre
            $apellido = $row[2]; //apellido

        }
    }

    $sql1 = "SELECT apoderado.RUT, alumno.RUT, registro_familiar.CORREO
     FROM apoderado, alumno, registro_familiar WHERE (apoderado.RUT = registro_familiar.RUTAPODERADO) 
     AND (alumno.RUT = registro_familiar.RUTALUMNO)AND (apoderado.RUT = '$rut')";
    $rs1 = mysqli_query($cnn, $sql1);
    if (mysqli_num_rows($rs1) != 0) {
        if ($row = mysqli_fetch_array($rs1)) {

            $_SESSION['correo'] = $row[2];
        }
    }

    $correo = $_SESSION['correo'];
    
    ?>

    <form action="" method="POST">

        <center>
            <h1>Menu Apoderados</h1>
            <tr>

                <td><img src="img\personas (1).png" alt=""></td>
            </tr>
            <table border="0">
                <br><br><br>



                <h2>Sus datos: </h2>

                <tr>
                    <td>Rut: </td>
                    <td><input type="text" name="rut" value=" <?php echo $rut ?>" disabled></td>
                </tr>
                <tr>
                    <td>Nombre: </td>
                    <td><input type="text" name="nombre" value="<?php echo $nombre ?>" disabled></td>
                </tr>
                <tr>
                    <td>Apellido: </td>
                    <td><input type="text" name="apellido" value="<?php echo $apellido ?>" disabled></td>
                </tr>

            </table>


        </center>
        <br><br>
        <center>

            <input type="submit" name="txthistorial" value="Historial citaciones">
            <input type="submit" name="cambiarpass" value="Cambiar contraseña">
            <br><br>
            
            <br><br>
            <input type="submit" name="cerrar" value="Cerrar sesion">
        </center>

    </form>
    <?php
   
    if ($_POST['txthistorial'] == 'Historial citaciones') {


        $sql2 = "SELECT * FROM citacion WHERE citacion.CORREO_FAMILIAR = '$correo'";

        $rs2 = mysqli_query($cnn, $sql2);
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
        while ($row = mysqli_fetch_array($rs2)) {
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


    if ($_POST['cambiarpass'] == 'Cambiar contraseña') {
        echo "<script type='text/javascript'>
    window.location = 'cambiarpass.php'
</script>";
    }

    error_reporting(0);
    if ($_POST['cerrar'] == 'Cerrar sesion') {
        echo "<script type = 'text/javascript'>window.location='index.php'</script>";
    }
    ?>
</body>

</html>