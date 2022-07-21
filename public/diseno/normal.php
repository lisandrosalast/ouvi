<?php
if($modulo=='index'){$nav='<div id="nav"><ul><b><a href="./servicios"><li>Servicios</li></a><a href="./yo"><li>Sobre mí</li></a><a href="./contacto"><li>Contacto</li></a></b></ul></div>';}
elseif($modulo=='servicios' or $modulo=='computadoras' or $modulo=='redes' or $modulo=='internet' or $modulo=='electricidad'){
$nav='<div id="nav"><ul><b><a href="./servicios"><li style="background:#ffffff; color:#000000;">Servicios</li></a><a href="./yo"><li>Sobre mí</li></a><a href="./contacto"><li>Contacto</li></a></b></ul></div>';}
elseif($modulo=='yo'){$nav='<div id="nav"><ul><b><a href="./servicios"><li>Servicios</li></a><a href="./yo"><li style="background:#ffffff; color:#000000;">Sobre mí</li></a><a href="./contacto"><li>Contacto</li></a></b></ul></div>';}
elseif($modulo=='contacto'){$nav='<div id="nav"><ul><b><a href="./servicios"><li>Servicios</li></a><a href="./yo"><li>Sobre mí</li></a><a href="./contacto"><li style="background:#ffffff; color:#000000;">Contacto</li></a></b></ul></div>';}
else{$nav='';}
?>
<!doctype html><html><head><title><?php echo $titulo; ?></title>
<meta name="google-site-verification" content="U7yeZW38l1OLl6-3No1dewKKQgMwkxFnFH-7YFPeVWI" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name=viewport content="width=device-width, initial-scale=1">
<?php echo $metatwitter; echo $metafacebook; echo $metagoogle;?>
<link rel="stylesheet" href="./css/estilo.css" type="text/css" media="all" />
<link rel="shortcut icon" href="./favicon.ico" /><link rel="icon" href="./favicon.ico" /><link rel="apple-touch-icon-precomposed" href="./imagen/favicon.png" />
</head><body onload="siguiente()">
<div class="general">
<div id="cabeza"><a href="./index"><img src="./imagen/logo.png" alt="LisandroSalasT"></a>
<?php echo $nav; ?>
</div>
<?php
if(file_exists($path_modulo)){include($path_modulo);}
else{die('<p>Error al cargar el m&oacute;dulo <b>' . $modulo . '</b>. No existe el archivo <b>' . $conf[$modulo]['archivo'] . '</b></p>');}
?>
<div id="pie">
<div class="a40" style="text-align:center;"><a href="./index"><b>Lisandro Salas T.</b></a> &copy; <?php echo date('Y'); ?><br/>Turmero, Aragua, Venezuela<br/>+58 416 262 1945</div>
<div class="a20"><a href="./index">Inicio</a><br/><a href="./yo">Sobre mí</a><br/><a href="./contacto">Contacto</a></div>
<div class="a20"><b><a href="./servicios">SERVICIOS</a></b><br/><a href="./computadoras">Computadoras</a><br/><a href="./redes">Redes</a><br/><a href="./internet">Internet</a><br/><a href="./electricidad">Electricidad</a></div>
<div class="a20"><b>REDES SOCIALES</b><br/><a href="https://www.facebook.com/LisandroSalasT" target="_blank"><img src="./imagen/facebook.png"> Facebook</a><br/><a href="https://instagram.com/lisandrosalast" target="_blank"><img src="./imagen/instagram.png"> Instagram</a><br/><a href="https://twitter.com/LisandroSalasT" target="_blank"><img src="./imagen/twitter.png"> Twitter</a><br/><a href="https://wa.me/584162621945" target="_blank"><img src="./imagen/whatsapp.png"> WhatsApp</a></div>
</div>
</div></body></html>