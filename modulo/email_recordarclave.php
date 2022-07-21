<?php
    $email_from = "Tortolero & Asociados<noresponder@ta.co.ve>";
    $email_to = $email;
    $email_bcc = "";
    $email_subject = "Recordatorio de Contraseña";
    $email_headers = "From: " . $email_from . "\r\n" .
    "Reply-To: " . $email_from . "\r\n" .
    "Bcc: " . $email_bcc . "\r\n" .
    "Content-type: text/html; charset=utf-8" . "\r\n";
    $email_message = "<html><head></head><body><div style='font-family:sans-serif;font-size:18px;'>" .
    "Su contraseña en nuestro sistema es: <b>".$result['contrasena']."</b>" .
    "<br/><br/><br/>Atentamente,<br/><b>Tortolero & Asociados</b><br/><a href='http://ta.co.ve' target='_blank'>http://ta.co.ve</a></div></body></html>";
    @mail($email_to, $email_subject, $email_message, $email_headers);
?>