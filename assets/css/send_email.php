
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validar los datos del formulario
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        // Email donde se enviará el formulario
        $to = "planexia.sa@gmail.com";
        // Encabezados del correo
        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Contenido del correo
        $email_content = "<html><body>";
        $email_content .= "<h2>Nuevo mensaje del formulario de contacto</h2>";
        $email_content .= "<p><strong>Nombre:</strong> {$name}</p>";
        $email_content .= "<p><strong>Email:</strong> {$email}</p>";
        $email_content .= "<p><strong>Asunto:</strong> {$subject}</p>";
        $email_content .= "<p><strong>Mensaje:</strong></p><p>{$message}</p>";
        $email_content .= "</body></html>";

        // Enviar el correo
        if (mail($to, $subject, $email_content, $headers)) {
            echo "<div class='sent-message' style='display:block;'>Su mensaje se envió con éxito. ¡Muchas gracias!</div>";
        } else {
            echo "<div class='error-message' style='display:block;'>Hubo un error al enviar su mensaje. Por favor, inténtelo de nuevo más tarde.</div>";
        }
    } else {
        echo "<div class='error-message' style='display:block;'>Por favor, complete todos los campos.</div>";
    }
} else {
    echo "<div class='error-message' style='display:block;'>Método de solicitud no válido.</div>";
}
?>
