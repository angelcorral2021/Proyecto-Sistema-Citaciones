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
    <title>ELIMINAR</title>
</head>

<body>
    <?php
    include("funciones.php");
    $cnn = Conectar();

    ?>

    <form action="" method="post">
        <center>

            <br><br><br><br>
            <h1>Eliminar Usuario</h1>
            <tr>

<td><img src="img\delete (1).png" alt=""></td>
</tr>
<br>


            <br><br><br>
            <table border="0">

                <br>
                <tr>
                    <td>Rut Usuario: </td>
                    <td><input type="text" name="txtrut" value=""></td>
                    <td><input type="submit" name="btnbuscar" value="BUSCAR"></td>

                </tr>

                <tr>
                    <td>Usuario: </td>
                    <td><input type="text" name="txtusuario" value=""></td>
                </tr>
                <tr>
                    <td>Contraseña: </td>
                    <td><input type="text" name="txtpass" value=""></td>
                </tr>
            </table>
            <br><br><br>
            <table>
                <tr>
                    <td><input type="submit" name="btneliminar" value="ELIMINAR"></td>
                    <td><input type="submit" name="btnsalir" value="SALIR"></td>
                </tr>
            </table>
            <br><br><br>
        </center>



        <?php

        error_reporting(0);
        $rut = $_POST['txtrut'];

        if ($_POST['btnbuscar'] == 'BUSCAR') {

            $sql = "SELECT RUT, NOMBRE_APODERADO, APELLIDO_APODERADO FROM apoderado WHERE (apoderado.RUT = '$rut')";
            $rs = mysqli_query($cnn, $sql);
            $sql3 = "SELECT RUT, NOMBRE, APELLIDO FROM funcionario WHERE (funcionario.RUT = '$rut')";
            $rs1 = mysqli_query($cnn, $sql3);

            if (mysqli_num_rows($rs) != 0) {
                echo "<table align = 'center' border = '5'>";
                echo "<tr align = 'center'>";
                echo "<td><b>RUT</td>";
                echo "<td><b>NOMBRE</td>";
                echo "<td><b>APELLIDO</td>";
                echo "<tr>";
                while ($row = mysqli_fetch_array($rs)) {
                    $_SESSION['delete'] = $row[0];
                    echo "<tr>";
                    echo "<td>$row[RUT] </td>";
                    echo "<td>$row[NOMBRE_APODERADO] </td>";
                    echo "<td>$row[APELLIDO_APODERADO] </td>";
                }
                echo "</table>";
            } elseif (mysqli_num_rows($rs1) != 0) {
                echo "<table align = 'center' border = '5'>";
                echo "<tr align = 'center'>";
                echo "<td><b>RUT</td>";
                echo "<td><b>NOMBRE</td>";
                echo "<td><b>APELLIDO</td>";
                echo "<tr>";
                while ($row = mysqli_fetch_array($rs1)) {
                    $_SESSION['delete1'] = $row[0];
                    echo "<tr>";
                    echo "<td>$row[RUT] </td>";
                    echo "<td>$row[NOMBRE] </td>";
                    echo "<td>$row[APELLIDO] </td>";
                }
                echo "</table>";
            }
        }

        ?>


    </form>

    <?php

    
    
    $delete = $_SESSION['delete'];
    $delete1 = $_SESSION['delete1'];
    $usuario = $_SESSION['usuario'];
    $usuario1 = $_POST['txtusuario'];
    $pass = $_SESSION['pass'];
    $pass1 = $_POST['txtpass'];
    


    if ($_POST['btneliminar'] == 'ELIMINAR') {

        if ($usuario == $usuario1 and $pass == $pass1) {
            $sql1 = "DELETE FROM `apoderado`  WHERE `apoderado`.`RUT` = '$delete'";
            mysqlI_query($cnn, $sql1);
            
        };
        if ($usuario == $usuario1 and $pass == $pass1) {
            $sql2 = "DELETE FROM `funcionario` WHERE `funcionario`.`RUT` = '$delete1'";
            mysqlI_query($cnn, $sql2);
            
        };
        echo "<script>alert('Se han eliminado los datos')</script>";

    }



    if ($_POST['btnsalir'] == 'SALIR') {
        echo "<script type='text/javascript'>
    window.location = 'administrador.php'
</script>";
    };

    ?>




















</body>

</html>