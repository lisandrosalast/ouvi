<?php
    $email_from = "Tortolero & Asociados<noresponder@ta.co.ve>";
    $email_to = "asociadostortolero@gmail.com";
    $email_bcc = "";
    $email_subject = "Cambio de Nombre en T&A";
    $email_headers = "From: " . $email_from . "\r\n" .
    "Reply-To: " . $email_from . "\r\n" .
    "Bcc: " . $email_bcc . "\r\n" .
    "Content-type: text/html; charset=utf-8" . "\r\n";
    $email_message = "<html><head></head><body><div style='font-family:sans-serif;font-size:18px;'>El propietario del Inmueble <b>" . 
    $result['apto'] . "</b> de <b>" . $result['edificio'] . "</b> ha solicitado un cambio de nombre.<br/><br/>Nombre anterior: <b>" . $result['nombre'] . 
    "</b><br/>Nombre nuevo: <b>" . $_POST['nombre'] . "</b><br/><br/>¿Aprueba este cambio?<br/>" .
    "<a href='http://ta.co.ve/?i=admin_nombre&id=" . $result['id'] . "&cambio=si' target='_blank'>SI</a> - " .
    "<a href='http://ta.co.ve/?i=admin_nombre&id=" . $result['id'] . "&cambio=no' target='_blank'>NO</a>" . 
    "<br/><br/>Atentamente,<br/><b>Tortolero & Asociados</b><br/><a href='http://ta.co.ve' target='_blank'>http://ta.co.ve</a></div></body></html>";
    @mail($email_to, $email_subject, $email_message, $email_headers);
?>