<?php
include 'includes/validardatosemail.php';
require_once "includes/recapchalib.php";

//Validar datos de cabecera

ValidarDatos($_POST['nomape']);

ValidarDatos($_POST["email"]);

ValidarDatos($_POST["tel"]);

ValidarDatos($_POST["mensaje"]);

ValidarDatos($_POST["empresa"]);

ValidarDatos($_POST["web"]);

    $nomape = $_POST['nomape'];

    $email_from = $_POST['email'];
 
    $tel = $_POST['tel']; 

    $mensaje = $_POST['mensaje'];

    $empresa = $_POST['empresa'];

    $web = $_POST['web'];

// Control del Captcha, si el captcha es incorrecto devuelve junto con un alerta en GET

 if ($_POST["g-recaptcha-response"] == "") { 
         $alerta = 'cincorrecto'; header("Location: contactform.php?alerta=$alerta&nomape=$nomape&email=$email_from&tel=$tel&mensaje=$mensaje&empresa=$empresa&web=$web");           
            }
 else {

if(isset($_POST['email'])) {
 
    // Edita las dos líneas siguientes con tu dirección de correo y asunto personalizados
 
    $email_to = "gus.ace@gmail.com";
 
    $email_subject = "Mensaje de cliente";   
 
    function died($error) {
 
        // si hay algún error, el formulario puede desplegar su mensaje de aviso
 
        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
 
        echo "Detalle de los errores.<br /><br />";
        
        echo $error."<br /><br />";
 
        echo "Porfavor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }
 
    // Se valida que los campos del formulairo estén llenos
 
    if( !isset($_POST['nomape']) || !isset($_POST['email']) || !isset($_POST['tel']) || !isset($_POST['mensaje']) ) 
      { died('Lo sentimos pero parece haber un problema con los datos enviados.'); }

 //En esta parte el valor "nomape" nos sirve para crear las variables que recolectaran la información de cada campo
    
    $nomape = $_POST['nomape']; // requerido

    $email_from = $_POST['email']; // requerido
 
    $tel = $_POST['tel']; // no requerido 

    $mensaje = $_POST['mensaje']; // requerido

    $empresa = $_POST['empresa']; // no requerido 

    $web = $_POST['web']; // no requerido 
 
    $error_message = "Error";

//En esta parte se verifica que la dirección de correo sea válida 
    
   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
 
  }

//En esta parte se validan las cadenas de texto

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$nomape)) {
 
    $error_message .= 'El formato del nombre y apellido no es válido<br />';
 
  }
 
   if(strlen($mensaje) < 2) {
 
    $error_message .= 'El formato del texto no es válido.<br />';
 
   }
 
  if(strlen($error_message) < 0) { //modifique
 
    died($error_message);
 
  }
 

//A partir de aqui se contruye el cuerpo del mensaje tal y como llegará al correo

    $email_message = "Contenido del Mensaje.\n\n";
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
      
 
    $email_message .= "Cliente: ".clean_string($nomape)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Teléfono: ".clean_string($tel)."\n";
 
    $email_message .= "Mensaje: ".clean_string($mensaje)."\n";

    $email_message .= "Empresa: ".clean_string($empresa)."\n";

    $email_message .= "Sitio Web: ".clean_string($web)."\n";
  
 
//Se crean los encabezados del correo
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
<!-- incluye aqui tu propio mensaje de Éxito-->
 
Gracias! Nos pondremos en contacto contigo a la brevedad
 
 
<?php
 
}
} 
?>