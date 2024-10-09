<?php
if(isset($_POST['email'])) {
 
    // Edita las dos líneas siguientes con tu dirección de correo y asunto personalizados
 
    $email_to = "info@g-minds.cl";
    

 
    $email_subject = "Formulario de contacto desde www.g-minds.com.ar";   
 
    function died($error) {
 
        // si hay algún error, el formulario puede desplegar su mensaje de aviso
 
        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
 
        echo "Detalle de los errores.<br /><br />";
        
        echo $error."<br /><br />";
 
        echo "Por favor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }
 
    
 //En esta parte el valor "name" nos sirve para crear las variables que recolectaran la información de cada campo
    
    $email_nombre = $_POST['nombre'];
 
    $email_email = $_POST['email']; 

    $email_from = $email_email; 
 
    $email_mensaje = $_POST['consulta'];
 
    
    
 
//A partir de aqui se contruye el cuerpo del mensaje tal y como llegará al correo

    $email_message = "Contenido del Mensaje.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Nombre: ".clean_string($email_nombre)."\n";
 
    $email_message .= "E-mail: ".clean_string($email_email)."\n";
 
    $email_message .= "Mensaje: ".clean_string($email_mensaje)."\n";
  
 
//Se crean los encabezados del correo
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  

	echo  "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=https://www.g-minds.com.ar\">";

}
 
?>