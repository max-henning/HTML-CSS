<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formulardaten sammeln
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // E-Mail-Adresse des Empfängers
    $to = 'dein.email@beispiel.de';
    $subject = 'Kontaktformular Nachricht von ' . $name;
    $body = "Name: $name\nE-Mail: $email\n\nNachricht:\n$message";
    $headers = 'From: ' . $email . "\r\n" .
               'Reply-To: ' . $email . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // E-Mail senden
    if (mail($to, $subject, $body, $headers)) {
        echo 'Danke für deine Nachricht. Wir werden uns bald bei dir melden.';
    } else {
        echo 'Es gab ein Problem beim Senden deiner Nachricht. Bitte versuche es später erneut.';
    }
} else {
    echo 'Ungültige Anforderung';
}
?>
