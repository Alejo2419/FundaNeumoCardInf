<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "fundacionneumologicaycardioinf@gmail.com";
    $subject = htmlspecialchars($_POST["subject"]);
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $fullMessage = "Nombre: $name\n";
    $fullMessage .= "Correo: $email\n\n";
    $fullMessage .= "Mensaje:\n$message\n";

    $headers = "From: noreply@" . $_SERVER['SERVER_NAME'] . "\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "success";
    } else {
        http_response_code(500);
        echo "error";
    }
} else {
    http_response_code(405);
    echo "Método no permitido.";
}
?>