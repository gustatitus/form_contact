<?
/* Sistema de Captcha
$DesdeLetra = "A";
$HastaLetra = "Z";
$DesdeNumero = 0000000000;
$HastaNumero = 9999999999;
 
$letraAleatoriaA = chr(rand(ord($DesdeLetra), ord($HastaLetra)));
$letraAleatoriaB = chr(rand(ord($DesdeLetra), ord($HastaLetra)));
$letraAleatoriaC = chr(rand(ord($DesdeLetra), ord($HastaLetra)));
$numeroAleatorio = rand($DesdeNumero, $HastaNumero);

$codigoverificacion = $letraAleatoriaA.$letraAleatoriaB.$letraAleatoriaC.$numeroAleatorio;

echo $codigoverificacion;
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>

<body>
        
        <form name="contactform" method="post" action="send_form_email.php"> 
        <table width="450px"><!---Este tamaño en px es personalizable -->
        <tr>
            <td valign="top">
                    <label for="name_ape">Nombre y Apellido *</label>
            </td>
            <td valign="top">
            <input  type="text" name="nomape" maxlength="50" size="30" required="required">
            </td>
        </tr>

        <tr>
            <td valign="top">
                   <label for="email">E-mail *</label>
            </td>
        <td valign="top">
                   <input  name="email" type="email" required="required" maxlength="80" size="30">
        </td>
        </tr>
        <tr>
            <td valign="top">
                    <label for="telephone">Teléfono *</label>
            </td>
            <td valign="top">
                    <input  type="text" name="tel" maxlength="30" required="required"  size="30">
            </td>
        </tr>
        <tr>
            <td valign="top">
                    <label for="message">Mensaje *</label>
            </td>
        <td valign="top">
                    <textarea  name="mensaje" maxlength="1000" cols="25" rows="6" required="required"></textarea>
        </td>
        </tr>
        <tr>
        <td colspan="2" style="text-align:center">
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