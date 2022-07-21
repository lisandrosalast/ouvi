<?php
    $email_from = "Tortolero & Asociados<noresponder@ta.co.ve>";
    $email_to = $email;
    $email_bcc = "";
    $email_subject = "Confirme su correo electrónico";
    $email_headers = "From: " . $email_from . "\r\n" .
    "Reply-To: " . $email_from . "\r\n" .
    "Bcc: " . $email_bcc . "\r\n" .
    "Content-type: text/html; charset=utf-8" . "\r\n";
    $email_message = "<html><head></head><body><div style='font-family:sans-serif;font-size:18px;'>" .
    "Para que nuestro sistema acepte como válido su correo electrónico, debe hacer click en el siguiente enlace:<br/><br/>" .
    "<a href='http://ta.co.ve/?i=correo_usuario&id=" . $codigo . "&validar=" . $email . "' target='_blank'><b>>> CONFIRMAR CORREO ELECTRÓNICO <<</b></a>" .
    "<br/><br/><br/><b>¿Por qué necesitamos que confirme su correo?</b><br/>Esto nos permite estar seguros de que ha escrito correctamente y usa su correo electrónico <i><b>" . $email . "</b></i>, necesario para ingresar en nuestro sistema." .
    "<br/><br/><br/>Atentamente,<br/><b>Tortolero & Asociados</b><br/><a href='http://ta.co.ve' target='_blank'>http://ta.co.ve</a></div></body></html>";
    @mail($email_to, $email_subject, $email_message, $email_headers);
?>