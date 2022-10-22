<?php
session_start();



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>


<body>
    <?php
    include("funciones.php");
    $cnn = Conectar();
    ?>

    <form action="" method="POST">

        <?php
        error_reporting(0);


        if ($_POST['ingresar'] == 'Ingresar') {

            $usuario = $_POST['txtusuario'];
            $pass = $_POST['txtpass'];
            $sql = "SELECT * FROM apoderado where USUARIO = '$usuario' and PASS = '$pass'";
            $sql1 = "SELECT * FROM alumno where USUARIO = '$usuario' and PASS = '$pass'";
            $rs = mysqli_query($cnn, $sql);
            $rs1 = mysqli_query($cnn, $sql1);

            if (mysqli_num_rows($rs) != 0) {

                if ($row = mysqli_fetch_array($rs)) {
                    $_SESSION['rut'] = $row[0]; //rut
                    $nombre = $row[1]; //nombre
                    $apellido = $row[2]; //apellido
                    $tipo = 'Apoderado';
                    $_SESSION['pass'] = $row[4];
                    $_SESSION['tipo'] = 'Apoderado';
                }
            } elseif (mysqli_num_rows($rs1) != 0) {

                if ($row = mysqli_fetch_array($rs1)) {
                    $_SESSION['rut'] = $row[0]; //rut
                    $nombre = $row[1]; //nombre
                    $apellido = $row[2]; //apellido
                    $tipo = 'Estudiante';
                    $_SESSION['pass'] = $row[4];
                    $_SESSION['tipo'] = 'Estudiante';
                }
            } else {
                $usuario = $_POST['txtusuario'];
                $pass = $_POST['txtpass'];
                $sql2 = "SELECT * FROM funcionario where USUARIO = '$usuario' and PASS = '$pass'";
                $rs = mysqli_query($cnn, $sql2);

                if (mysqli_num_rows($rs) != 0) {
                    if ($row = mysqli_fetch_array($rs)) {
                        $_SESSION['rut'] = $row[0]; //rut
                        $nombre = $row[1]; //nombre
                        $apellido = $row[2]; //apellido
                        $tipo = $row[5]; //tipo
                        $_SESSION['usuario'] = $row[6]; 
                        $_SESSION['pass'] = $row[7]; 
                        $_SESSION['tipo'] = 'Funcionario'; 
                    }
                }
            }

            switch ($tipo) {

                case "Apoderado":


                    echo "<script>alert('Usted es $nombre $apellido')</script>";
                    echo "<script type = 'text/javascript'>window.location='apoderado.php'</script>";

                    break;

                case "Estudiante":

                    echo "<script>alert('Usted es $nombre $apellido')</script>";
                    echo "<script type = 'text/javascript'>window.location='alumno.php'</script>";

                    break;


                case "Funcionario":

                    echo "<script>alert('Usted es $nombre y su cargo es $tipo')</script>";
                    echo "<script type = 'text/javascript'>window.location='funcionario.php'</script>";

                    break;

                case "Administrador":

                    echo "<script>alert('Usted es $nombre y su cargo es $tipo')</script>";
                    echo "<script type = 'text/javascript'>window.location='administrador.php'</script>";

                    break;
            }
        }


        ?>
        <center>
            <br><br>
            <img src="img\rrss.jpg" width="450" height="250" alt="">
            <br><br>
            <table border="0">
                <br><br>
                <tr>
                    <td>Usuario:</td>
                    <td><input type="text" name="txtusuario" value=""></td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td><input type="password" name="txtpass" value=""></td>
                </tr>

            </table>
            <br>
            <table border="0">
                <tr>
                    <td><input type="submit" name="ingresar" value="Ingresar"></td>
                </tr>
            </table>
            <br>
            <table border="0">
                
            </table>
            <br><br>
            <h2>Integrantes: Angel Corral</h2>
        </center>
    </form>
    <?php

    ?>
</body>

</html>