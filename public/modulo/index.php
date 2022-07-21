<?php

$_SESSION['id']="lisandrosalast";
setcookie('lisandrosalast_user_id', $_SESSION['id'], time() + 365 * 24 * 60 * 60);
?>
<!--div style="display:none;"><img src="./imagen/banner-disenoweb.jpg"><img src="./imagen/banner-fuentes.jpg"><img src="./imagen/banner-redes.jpg"><img src="./imagen/banner-borrados.jpg"></div-->
<div class="full" style="background: #000000;">
<div id="presentacion" style="position: relative; width: 100%;" onmouseout="ocultarflechas()" onmouseover="mostrarflechas()">
<center><img id="banner" width="100%"></center>
<a id="enlace"><div id="servicio"><h5 id="titulo" style="margin:3px 5px;"></h5><i><h6 id="descripcion" style="margin:0 5px 3px;"></h6></i></div></a>
<div class="solopc"><img id="flecha1" src="./imagen/ant.png" height="10%" alt="Anterior" title="Anterior" style="position: absolute; display: none; top: 45%; left: 5px;" onMousedown="anterior()">
<img id="flecha2" src="./imagen/sig.png" height="10%" alt="Siguiente" title="Siguiente" style="position: absolute; display: none; top: 45%; right: 5px;" onMousedown="siguiente()"></div>
<div class="movil"><img id="flecha1" src="./imagen/ant.png" height="10%" alt="Anterior" title="Anterior" style="position: absolute; top: 5%; left: 5px;" onMousedown="anterior()">
<img id="flecha2" src="./imagen/sig.png" height="10%" alt="Siguiente" title="Siguiente" style="position: absolute; top: 5%; right: 5px;" onMousedown="siguiente()"></div></div>
</div>

<div class="full" style="background:#eed500; color:#000000; padding:40px 0;">
<style>a:link #ele, a:visited #ele {color: #ffffff; text-decoration: none; background: none;} a:hover #ele, a:active #ele {background: #e8d000; text-decoration: none;} </style>
<div class="a100"><center><h2>Soluciones Eléctricas</h2><h4 style="margin:5px 0 30px;"><i>electricidad residencial</i></h4></center></div>
<div class="a33_na"></div>
<a href="./electricidad"><div class="a33_na" id="ele">
<center><img src="./imagen/electricidad-negro.png" width="80%" style="max-width:200px; max-height:200px;" alt="Electricidad Residencial">
</center></div></a>
<div class="a33_na"></div>

</div>

<div class="full" style="background:#004488; color:#ffffff; padding:40px 0;">
<style>a:link #svc, a:visited #svc {color: #ffffff; text-decoration: none; background: none;} a:hover #svc, a:active #svc {background: #004080; text-decoration: none;} </style>
<div class="a100"><center><h2>Soluciones Computrónicas</h2><h4 style="margin:5px 0 30px;"><i>computación, informática, redes y electrónica de la computadora</i></h4></center></div>
<a href="./computadoras"><div class="a33_na" id="svc">
<center><img src="./imagen/pc-blanco.png" width="80%" style="max-width:200px; max-height:200px;" alt="Computadoras y Laptops">
<h3 class="solopc">Computadoras y Laptops</h3><h3 class="movil">PCs</h3></center></div></a>
<a href="./redes"><div class="a33_na" id="svc">
<center><img src="./imagen/net-blanco.png" width="80%" style="max-width:200px; max-height:200px;" alt="Redes y Conexiones">
<h3 class="solopc">Redes y Conexiones</h3><h3 class="movil">Redes</h3></center></div></a>
<a href="./internet"><div class="a33_na" id="svc">
<center><img src="./imagen/web-blanco.png" width="80%" style="max-width:200px; max-height:200px;" alt="Internet y Web">
<h3 class="solopc">Internet y Web</h3><h3 class="movil">Web</h3></center></div></a></div>
<div class="full" style="padding:30px 0; background:#ffffff;"><center><i><b>
<a href="./evite-virus-facilmente_" target="_blank"><div class="a33">Evite Virus Fácilmente</div></a>
<a href="./imagen/mapa.png" target="_blank"><div class="a33">¿Dónde estoy?</div></a>
<a href="./3-requisitos-basicos-que-debe-cumplir-una-buena-pagina-web_" target="_blank"><div class="a33">Requisitos Página Web</div></a></b></i></center></div>
<script type="text/javascript" src="./js/banner-inicio.js"></script>
<div class="solopc">
<script type="text/javascript">
function on_scroll() {if (document.body.scrollTop > 70 || document.documentElement.scrollTop > 70) {document.getElementById('cabeza_alt').style.display="block";} else {document.getElementById('cabeza_alt').style.display="none";}}
</script>
<body OnScroll="on_scroll()">
<div id="cabeza_alt" style="display:none"><a href="./index"><img src="./imagen/logo.png" height="38px" alt="Lisandro Salas"></a>
<div id="nav_alt"><ul><b><a href="./servicios"><li>Servicios</li></a><a href="./yo"><li>Sobre mí</li></a><a href="./contacto"><li>Contacto</li></a></b></ul></div></div></body></div>
<style>h5 {font-size: 40px;} h6 {font-size: 30px;} #cabeza {position: absolute; z-index: 10; background: rgba(0,0,0,.3);} img {border: none;} #titulo, #descripcion {text-align: center;} #presentacion {background: #eed500;}
#servicio {width: 70%; left: 15%; background-color: #000000; background: rgba(0,0,0,.3); color: #ffffff; position: absolute; bottom: 70px; padding: 15px 0;} a:hover #servicio, a:active #servicio {text-decoration: underline;}
@media screen and (max-width: 699px) {#titulo, #descripcion {text-align: left;} #cabeza {position: relative; background: #000000;} #servicio {position: static; width: 100%; padding: 0 0 40px;} #presentacion {background: #000000;} h5 {font-size: 22px;} h6 {font-size: 18px;}}
@media screen and (min-width: 1281px) {#cabeza {position: absolute; width: 1280px}}</style>