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
    <title>alumno</title>
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


    <form action="" method="POST">

        <center>
            <h1>Menu Alumno</h1>
            <tr>
   
    <td><img src="img\estudiante.png" alt=""></td>
    </tr>
<table border="0">
    <br><br><br>
    

    
<h2>Sus datos: </h2>
    <tr>
    <td>Rut: </td><td><input type="text" name="rut" disabled value="<?php echo $rut  ?>"></td>
    </tr>
    <tr>
    <td>Nombre: </td><td><input type="text" name="nombre" disabled value="<?php echo $nombre  ?>"></td>
    </tr>
    <tr>
    <td>Apellido: </td><td><input type="text" name="apellido" disabled value="<?php echo $apellido  ?>"></td>
    </tr>
    <tr>
    <td>Curso: </td><td><input type="text" name="curso" disabled value="<?php echo $curso  ?>"></td>
    </tr>
    
        





        </table>


        </center>
        <br><br><br>
        <center>
        
        
        <input type="submit" name="cambiarpass" value="Cambiar contraseña">
        <br><br><br><br><br>
        <input type="submit" name="cerrar" value="Cerrar sesion">
        
        </center>
    </form>
    <?php
error_reporting(0);

if ($_POST['cambiarpass'] == 'Cambiar contraseña') {
    echo "<script type='text/javascript'>
    window.location = 'cambiarpass.php'
</script>";
}
if($_POST['cerrar'] == 'Cerrar sesion'){
    echo "<script type = 'text/javascript'>window.location='index.php'</script>";
}
?>
</body>

</html>