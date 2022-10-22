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
            <h1>Eliminar citación</h1>
            <tr>

<td><img src="img\delete.png" alt=""></td>
</tr>
<?php
error_reporting(0);
 $folio = $_POST['txtfolio'];
?>


            <br><br><br>
            <table border="0">

            <br>
                <tr>
                    <td>Folio: </td>
                    <td><input type="number" name="txtfolio" value="<?php echo $folio ?>" onkeypress="ValidaSoloNumeros()"></td>
                    <td><input type="submit" name="btnfolio" value="BUSCAR"></td>

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
            $_SESSION['folio'] = $row[0]; //rut
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
?>

<?php
    error_reporting(0);
    $folio1 = $_SESSION['folio'];
    $usuario = $_SESSION['usuario'];
    $usuario1 = $_POST['txtusuario'];
    $pass = $_SESSION['pass'];
    $pass1 = $_POST['txtpass'];

    if ($_POST['btneliminar'] == 'ELIMINAR') {
        
        if($usuario == $usuario1 AND $pass == $pass1){
            

        $sql = "DELETE FROM `citacion` WHERE `citacion`.`FOLIO` = $folio1 ";
        mysqlI_query($cnn, $sql);
        echo "<script>alert('Se han eliminado los datos')</script>";
    }else{
        echo "<script>alert('Usuario/Contraseña Incorrecta')</script>";
    
    }

}
?>
    </form>


    <?php
error_reporting(0);

if($_POST['btnsalir'] == 'SALIR'){
    echo "<script type='text/javascript'>
            window.location = 'bienvenida.php'
        </script>";
};


?>















</body>

</html>