<?php
echo "<!doctype html><html><head><title>" . $titulo . "</title>";
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'><meta name=viewport content='width=device-width, initial-scale=1'>";
echo "<link rel='stylesheet' href='./css/estilo.css' type='text/css' media='all' />";
echo "<link rel='shortcut icon' href='./favicon.ico' /><link rel='icon' href='./favicon.ico' /><link rel='apple-touch-icon-precomposed' href='./imagen/favicon.png' />";
echo "</head><body><div class='general'>";
echo "<div id='cabeza'><h1>AGENDA</h1></div>";
if (file_exists( $path_modulo )) include( $path_modulo );
else die('Error al cargar el módulo <b>'.$modulo.'</b>. No existe el archivo <b>'.$conf[$modulo]['archivo'].'</b>');
echo "<div id='pie'>";
echo "<div class='a100' style='text-align:center;'>Háganlo todo de forma digna y ordenada (1 Cor. 14:40)</div></div>";
echo "<style>#cabeza{padding:20px 0; text-align:center;}</style>";
echo "</div></body></html>";?>