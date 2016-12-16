<?
/*****
        Desarrollado por =  info@galusdev.com
		Material de Consulta = https://webdesign.tutsplus.com/es/tutorials/how-to-integrate-no-captcha-recaptcha-in-your-website--cms-23024
		Programador = Gustatitus
		Libreria reCaptcha by Copyright (c) 2014, Google Inc. 
        linea 87 captcha y linea 12 clave secreta de google.   
*****/
require_once "includes/recapchalib.php";

// tu clave secreta
$secret = "";
 
// respuesta vacía
$response = null;
 
// comprueba la clave secreta
$reCaptcha = new ReCaptcha($secret);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>

<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>

<body>
        <form name="contactform" method="post" action="send_form_email.php"> 
        <table width="450px"><!---Este tamaño en px es personalizable -->
        <tr>
            <td valign="top">
                    <label for="name_ape">Nombre y Apellido *</label>
            </td>
            <td valign="top">
            <input  type="text" name="nomape" maxlength="50" size="30" required="required" value="<?php echo $_GET['nomape'];?>">
            </td>
        </tr>

        <tr>
            <td valign="top">
                    <label for="empre">Empresa </label>
            </td>
            <td valign="top">
            <input  type="text" name="empresa" maxlength="50" size="30" value="<?php echo $_GET['empresa'];?>">
            </td>
        </tr>

        <tr>
            <td valign="top">
                   <label for="email">E-mail *</label>
            </td>
        <td valign="top">
                   <input  name="email" type="email" required="required" maxlength="80" size="30" value="<?php echo $_GET['email'];?>">
        </td>
        </tr>

        <tr>
            <td valign="top">
                    <label for="empre">Sitio Web </label>
            </td>
            <td valign="top">
            <input  type="text" name="web" maxlength="50" size="30" value="<?php echo $_GET['web'];?>">
            </td>
        </tr>

        <tr>
            <td valign="top">
                    <label for="telephone">Teléfono *</label>
            </td>
            <td valign="top">
                    <input  type="text" name="tel" maxlength="30" required="required"  size="30" value="<?php echo $_GET['tel'];?>">
            </td>
        </tr>
        <tr>
            <td valign="top">
                    <label for="message">Mensaje *</label>
            </td>
        <td valign="top">
                    <textarea  name="mensaje" maxlength="1000" cols="25" rows="6" required="required"><?php echo $_GET['mensaje'];?></textarea>
        </td>
        </tr>
        <tr>    

        <td colspan="2" style="text-align:center">

        <div class="g-recaptcha" data-sitekey=""></div>

        <spam style="color:red">
        <?
            if ($_GET['alerta'] == 'cincorrecto'){ echo "Por favor complete el Captcha!"; }
        ?>
        </spam>
        <br>

        <input type="submit" value="Enviar">

        </td>
        </tr>
        </table>
                    
        </form>

        <footer>
            <p>Derechos reservados</p>
            <p>info@galusdev.com</p>
        </footer>

</body>
</html>