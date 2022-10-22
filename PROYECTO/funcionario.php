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
    <title>funcionario</title>
</head>


<body>
    <?php
    include("funciones.php");
    $cnn = Conectar();
    ?>


    <?php
    error_reporting(0);

    $rut = $_SESSION['rut'];
    $sql = "SELECT * FROM `funcionario` WHERE `RUT` = '$rut'";
    $rs = mysqli_query($cnn, $sql);
    if (mysqli_num_rows($rs) != 0) {
        if ($row = mysqli_fetch_array($rs)) {

            $nom = $row[1]; //nombre
            $apellido = $row[2]; //apellido
            $cargo = $row[5]; //cargo
            $correo = $row[3]; //correo
            $_SESSION['usuario'] = $row[6]; 
            $_SESSION['pass'] = $row[7]; 
            
        }
    }
    ?>



    <form action="" method="POST">

        <center>
            <h1>Menu Funcionario</h1>
            <tr>
                <td><img src="img\gerente.png" alt=""></td>
            </tr>
            <table border="0">
                <br><br><br>

                <h2>Sus datos: </h2>
                <tr>
                    <td>Correo: </td>
                    <td><input type="text" name="correo" value="<?php echo $correo ?>" disabled></td>
                </tr>
                <tr>
                    <td>Rut: </td>
                    <td><input type="text" name="rut" value="<?php echo $rut ?>" disabled></td>
                </tr>
                <tr>
                    <td>Nombre: </td>
                    <td><input type="text" name="nombre" value="<?php echo $nom ?>" disabled></td>
                </tr>
                <tr>
                    <td>Apellido: </td>
                    <td><input type="text" name="apellido" value="<?php echo $apellido ?>" disabled></td>
                </tr>
                <tr>
                    <td>Cargo: </td>
                    <td><input type="text" name="cargo" value="<?php echo $cargo ?>" disabled></td>
                </tr>

            </table>
        </center>
        <br><br><br>
        <center>
            <input type="submit" name="registrofamiliar" value="Acceder a registro familiar">
            <input type="submit" name="cambiarpass" value="Cambiar contraseña">
            <input style="background-color:cyan" type="submit" name="sistema" value="Sistema citacion">
            <br><br><br>
            <input type="submit" name="cerrar" value="Cerrar sesion">
            <br><br>
        </center>

        <?php
        error_reporting(0);
        
        
        if ($_POST['cambiarpass'] == 'Cambiar contraseña') {
            echo "<script type='text/javascript'>
            window.location = 'cambiarpass.php'
        </script>";
        }

        if ($_POST['registrofamiliar'] == 'Acceder a registro familiar') {
            echo "<script type='text/javascript'>
                window.location = 'registrofamiliar.php'
            </script>";
            }

        if ($_POST['cerrar'] == 'Cerrar sesion') {
        echo "<script type='text/javascript'>
            window.location = 'index.php'
        </script>";
        }

        if ($_POST['sistema'] == 'Sistema citacion') {
        echo "<script type='text/javascript'>
            window.location = 'bienvenida.php'
        </script>";
        }

        ?>
    </form>
</body>

</html>