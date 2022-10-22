<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Bienvenido al Ejercicio Rut</title>
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
<form id="form1" name="reloj24" method="post" action="">
<?php error_reporting(0);?>
    <center>
    <table width="509" border="0">
            <tr>
                <td><b>Rut:</b></td>
                <td><input type="text" name="rut" id="rut" maxlength="12" onChange="javascript:return Rut(document.reloj24.rut.value)"></td>    
            </tr>
            <tr>
                <td><b>Correo:</b></td>
                <td><input type="text" name="txtMail" size="40" placeholder="ejemplo@ejemplo.com"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btnIngresar" value="Ingresar" class="boton_1"></td>
            </tr>
        </table>
            <?php
            if ($_POST['btnIngresar']=="Ingresar")
                echo "<script>alert('Ingresarás al Sistema')</script>";

            ?>

  </form>
</body>
</html>
