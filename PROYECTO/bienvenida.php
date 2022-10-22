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
    <title>BIENVENIDA</title>
</head>

<body>
    <?php
    include("funciones.php");
    $cnn = Conectar();
    ?>


    <form action="" method="post">
        <center>
            <br><br>
            <h1>Bienvenido al Sistema de Citación</h1>

            
            <br><br>
            <tr>

                <td><img src="img\sitio-web.png" alt=""></td>
            </tr>
            <h2>Elija la opcion que desea:</h2>
            <br><br>
            <table border="0">
<br><br>
                <tr>
                    <td><input type="submit" name="btncrear" value="CREAR"></td>
                    <td><input type="submit" name="btnbuscar" value="BUSCAR"></td>
                    <td><input type="submit" name="btneliminar" value="ELIMINAR"></td>
                    <td><input type="submit" name="btnmodificar" value="MODIFICAR"></td>
                </tr>
            </table>
            <br><br><br>
            <table>
                <tr>
                    
                    <td><input type="submit" name="btnsalir" value="SALIR"></td>
                </tr>
            </table>

        </center>
    </form>
<?php
error_reporting(0);

if($_POST['btncrear'] == 'CREAR'){
    echo "<script type='text/javascript'>
            window.location = 'crear.php'
        </script>";
};

if($_POST['btnbuscar'] == 'BUSCAR'){
    echo "<script type='text/javascript'>
            window.location = 'busqueda.php'
        </script>";
};

if($_POST['btneliminar'] == 'ELIMINAR'){
    echo "<script type='text/javascript'>
            window.location = 'eliminar.php'
        </script>";
};


if($_POST['btnmodificar'] == 'MODIFICAR'){
    echo "<script type='text/javascript'>
            window.location = 'modificar.php'
        </script>";
};



if($_POST['btnsalir'] == 'SALIR'){
    echo "<script type='text/javascript'>
            window.location = 'funcionario.php'
        </script>";
};














?>
</body>

</html>