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
    
    <title>agregar usuario</title>
</head>

<body>
    <?php
    include("funciones.php");
    $cnn = Conectar();
    ?>

    <form action="" method="POST">
        <center>
            <br><br><br>
            <h1>SISTEMA AGREGAR USUARIO</h1>
            <tr>

<td><img src="img\add-group.png" alt=""></td>
</tr>
<br>
            <h2>Escoja el tipo de usuario a agregar</h2>
            <table border="0">
                <br><br>
                <tr>
                <td>
                    <input type="submit" name="btnregistro" value="REGISTRO FAMILIAR"></td>

                    <td><input type="submit" name="btnfuncionario" value="FUNCIONARIO"></td>

                    <td><input type="submit" name="btnapoderado" value="APODERADO"></td>

                    <td><input type="submit" name="btnalumno" value="ALUMNO"></td>
                </tr>
            </table>



            <br><br>
            <table>
                <tr>
                    <td><input type="submit" name="btncerrar" value="Cerrar sesion"></td>
                </tr>
            </table>

        </center>

        <?php
        error_reporting(0);

        if ($_POST['btnregistro'] == 'REGISTRO FAMILIAR') {
            echo "<script type = 'text/javascript'>window.location='registrofamiliar2.php'</script>";
        }
        if ($_POST['btnfuncionario'] == 'FUNCIONARIO') {
            echo "<script type = 'text/javascript'>window.location='funcionario2.php'</script>";
        }

        if ($_POST['btnapoderado'] == 'APODERADO') {
            echo "<script type = 'text/javascript'>window.location='apoderado2.php'</script>";
        }

        if ($_POST['btnalumno'] == 'ALUMNO') {
            echo "<script type = 'text/javascript'>window.location='alumno2.php'</script>";
        }

        if ($_POST['btncerrar'] == 'Cerrar sesion') {
            echo "<script type = 'text/javascript'>window.location='administrador.php'</script>";
        }

        ?>
    </form>







</body>

</html>