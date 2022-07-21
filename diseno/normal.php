<?php
ob_start();
include("./modulo/sesion.php");
include("./modulo/pedido-codigo.php");
//if($modulo=='index'){$nav='<div id="nav"><ul><b><a href="./productos"><li>Nuestros Productos</li></a><a href="./nosotros"><li>¿Quiénes somos?</li></a><a href="./contacto"><li>Contáctanos</li></a>'.$sesion.'</b></ul></div>';}
//elseif($modulo=='productos'){$nav='<div id="nav"><ul><b><a href="./productos"><li style="background:#ffffff; color:#000000;">Nuestros Productos</li></a><a href="./nosotros"><li>¿Quiénes somos?</li></a><a href="./contacto"><li>Contáctanos</li></a>'.$sesion.'</b></ul></div>';}
//elseif($modulo=='nosotros'){$nav='<div id="nav"><ul><b><a href="./productos"><li>Nuestros Productos</li></a><a href="./nosotros"><li style="background:#ffffff; color:#000000;">¿Quiénes somos?</li></a><a href="./contacto"><li>Contáctanos</li></a>'.$sesion.'</b></ul></div>';}
//elseif($modulo=='contacto'){$nav='<div id="nav"><ul><b><a href="./productos"><li>Nuestros Productos</li></a><a href="./nosotros"><li>¿Quiénes somos?</li></a><a href="./contacto"><li style="background:#ffffff; color:#000000;">Contáctanos</li></a>'.$sesion.'</b></ul></div>';}
//else{$nav='<div id="nav"><ul><b>'.$sesion.'</b></ul></div>';}
?>
<!doctype html><html><head><title><?php echo $titulo; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name=viewport content="width=device-width, initial-scale=1">
<?php echo $metatwitter; echo $metafacebook; echo $metagoogle;?>
<!--link rel="stylesheet" href="./css/estilo.css" type="text/css" media="all" /-->
<link rel="shortcut icon" href="./favicon.ico" /><link rel="icon" href="./favicon.ico" /><link rel="apple-touch-icon-precomposed" href="./imagen/favicon.png" />
</head><body onload="siguiente()">
<style><?php include "./css/estilo.css";?></style>
<div class="general">
<div id="cabecita">.</div>
<div id="cabeza"><?php echo $nav;?>
<a href="./index"><img src="./imagen/logo.png" alt="OUVI" height="40px"></a>
<img src="./imagen/3rayas.png" alt="Menú" style="float:right;height:30px;margin-top:5px">
</div>

<!--Artificio para que no quede por debajo el contenido-->
<div class="full" style="height:50px;background:#000"></div>
<?php

if(file_exists($path_modulo)){include($path_modulo);}
else{die('<p>Error al cargar el m&oacute;dulo <b>' . $modulo . '</b>. No existe el archivo <b>' . $conf[$modulo]['archivo'] . '</b></p>');}
?>
<div id="pie">
<div class="a50" style="text-align:center;"><a href="./index"><b>OUVI</b></a> &copy; <?php echo date('Y'); ?><br/>Maracay, Aragua, Venezuela</div>
<div class="a25"><a href="./index">Inicio</a><br/><a href="./productos">Nuestros Productos</a><br/><a href="./nosotros">¿Quiénes somos?</a><br/><a href="./contacto">Contáctanos</a></div>
<div class="a25"><b>REDES SOCIALES</b><br/><a href="https://www.facebook.com/LisandroSalasT" target="_blank"><img src="./imagen/facebook-blanco.png"> Facebook</a><br/><a href="https://instagram.com/lisandrosalast" target="_blank"><img src="./imagen/instagram-blanco.png"> Instagram</a><br/><a href="https://wa.me/584162621945" target="_blank"><img src="./imagen/whatsapp-blanco.png"> WhatsApp</a></div>
</div>
</div></body></html>