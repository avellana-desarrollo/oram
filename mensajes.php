<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nombre"];
  $correo = $_POST["correo"];
  $telefono = $_POST["telefono"];
  $mensaje = $_POST["mensaje"];
  
  // Configuración de correo electrónico
  $destinatario = "contacto@oramex.mx"; // Cambia esta línea con tu dirección de correo electrónico
  $asunto = "Nuevo mensaje de formulario de contacto";
  $cuerpoMensaje = "Nombre: " . $nombre . "\n";
  $cuerpoMensaje .= "Correo: " . $correo . "\n";
  $cuerpoMensaje .= "Teléfono: " . $telefono . "\n";
  $cuerpoMensaje .= "Mensaje: " . $mensaje . "\n";
  
  // Envío de correo electrónico
  $headers = "From: " . $correo . "\r\n";
  if (mail($destinatario, $asunto, $cuerpoMensaje, $headers)) {
    echo "<script>alert('Mensaje enviado correctamente.');</script>";
    header('Location: contactanos.php');
    
  } else {
    echo "Error al enviar el mensaje.";
  }
}
?>
