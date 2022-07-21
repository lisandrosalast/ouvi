<?php
error_reporting(E_ALL);

// Aquí van todos los modulos para que sean enlazados
define('MODULO_DEFECTO', 'index');
define('LAYOUT_DEFECTO', 'normal.php');
define('MODULO_PATH', realpath('./modulo/'));
define('LAYOUT_PATH', realpath('./diseno/'));
$conf['index'] = array(
		'archivo' => 'index.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'Lisandro Salas - El Técnico',
    'descr' => 'Asistencia técnica en electricidad, computación, informática, redes y electrónica de la computadora.');
$conf['servicios'] = array(
		'archivo' => 'servicios.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'Lisandro Salas - Servicios',
    'descr' => 'Asistencia técnica en electricidad, computación, informática, redes y electrónica de la computadora.');
$conf['yo'] = array(
		'archivo' => 'yo.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'Lisandro Salas - ¿Quién soy?',
    'descr' => 'Ofrezco asistencia técnica en ...');
$conf['contacto'] = array(
		'archivo' => 'contacto.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'Lisandro Salas - Contacto',
    'descr' => 'Quiero brindarle la mejor atención, comuníquese conmigo y verá.');
$conf['computadoras'] = array(
		'archivo' => 'computadoras.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'Lisandro Salas - Computadoras y Laptops',
    'descr' => 'Asistencia técnica en computación, informática, redes y electrónica de la computadora.');
$conf['redes'] = array(
		'archivo' => 'redes.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'Lisandro Salas - Redes e Interconexión de Equipos',
    'descr' => 'Asistencia técnica, diseño, implementación y mantenimeinto de redes LAN, WiFi, y relacionados.');
$conf['internet'] = array(
		'archivo' => 'internet.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'Lisandro Salas - Internet y Web',
    'descr' => 'Diseño y mantenimiento de sitios web y redes sociales a su medida.');
$conf['electricidad'] = array(
		'archivo' => 'electricidad.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'Lisandro Salas - Electricidad Residencial',
    'descr' => 'Asistencia técnica en electricidad residencial. Electricista profesional.');
$conf['social'] = array(
		'archivo' => 'social.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'Lisandro Salas - Redes Sociales',
    'descr' => 'Mis redes sociales en un solo lugar.');
$conf['error'] = array(
		'archivo' => 'error.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'Lisandro Salas - Error',
    'descr' => 'Algo salió mal y será redirigido a la página de inicio.');
$conf['servicios-admin'] = array(
		'archivo' => 'servicios-admin.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'Administrador de Servicios',
    'descr' => 'Realizar cambios en los servicios que muestra esta página.');
$conf['servicios-editar'] = array(
		'archivo' => 'servicios-editar.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'Editar Servicios',
    'descr' => 'Editar y agregar servicios ofrecidos.');
$conf['servicios-activar'] = array(
		'archivo' => 'servicios-activar.php',
		'layout' => 'vacio.php',
    'titulo' => 'Activar Servicios',
    'descr' => 'Activar o desactivar los servicios ofrecidos.');
$conf['articulo-editar'] = array(
		'archivo' => 'articulo-editar.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'Editar Contenidos',
    'descr' => 'Editar y agregar contenido del sitio.');
$conf['articulo'] = array(
		'archivo' => 'articulo.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'Lisandro Salas',
    'descr' => '');
// Mi Agenda
$conf['agenda'] = array(
		'archivo' => 'agenda.php',
		'layout' => 'agenda.php',
    'titulo' => 'Agenda',
    'descr' => 'Todas mis actividades en un solo lugar.');
$conf['evento'] = array(
		'archivo' => 'evento.php',
		'layout' => 'agenda.php',
    'titulo' => 'Actividad',
    'descr' => 'Editar un evento de la agenda.');
// Fin de Agenda
// Llamadas
$conf['llamadas'] = array(
		'archivo' => 'llamadas.php',
		'layout' => 'agenda.php',
    'titulo' => 'Llamadas',
    'descr' => 'Todas mis actividades en un solo lugar.');
$conf['llamada'] = array(
		'archivo' => 'llamada.php',
		'layout' => 'agenda.php',
    'titulo' => 'Llamada',
    'descr' => 'Editar un evento de la agenda.');
$conf['llamadas_search'] = array(
		'archivo' => 'llamadas_search.php',
		'layout' => 'agenda.php',
    'titulo' => 'Buscar Llamada',
    'descr' => 'Editar un evento de la agenda.');
// Fin de Llamadas

if(!empty($_GET['i'])){$modulo = $_GET['i'];}
else{$modulo = MODULO_DEFECTO;}
if(empty($conf[$modulo])){$modulo = error;}

if(empty($conf[$modulo]['layout'])){$conf[$modulo]['layout'] = LAYOUT_DEFECTO;}

$titulo = $conf[$modulo]['titulo'];
$descripcion = $conf[$modulo]['descr'];

// Creamos metaetiquetas sociales
if($modulo=='index'){$modulo1='';}
else{$modulo1=$modulo;}

if($modulo=='articulo'){
include("./modulo/conectar.php");
$url = $_GET['url'];
$buscar = mysqli_query($con, "SELECT * FROM articulos WHERE url='$url'");
$articulo = mysqli_fetch_array($buscar);
$url_articulo = $articulo['url']."_";
$titulo = $articulo['titulo']." - Lisandro Salas";
$descripcion = $articulo['resumen'];
$modulo1 = $url_articulo;
}

$metatwitter='<meta name="twitter:card" content="summary" /><meta name="twitter:site" content="@lisandrosalast" /><meta name="twitter:title" content="'.$titulo.'" /><meta name="twitter:description" content="'.$descripcion.'" /><meta name="twitter:image" content="http://lisandrosalast.000webhostapp.com/imagen/logotipo.png" /><meta name="twitter:url" content="http://lisandrosalast.000webhostapp.com/'.$modulo1.'" />';
$metafacebook='<meta property="og:url" content="http://lisandrosalast.000webhostapp.com/'.$modulo1.'" /><meta property="og:type" content="website" /><meta property="og:title" content="'.$titulo.'" /><meta property="og:description" content="'.$descripcion.'" /><meta property="og:image" content="http://lisandrosalast.000webhostapp.com/imagen/logotipo.png" />';
$metagoogle='<meta itemprop="name" content="'.$titulo.'" /><meta itemprop="description" content="'.$descripcion.'" /><meta itemprop="image" content="http://lisandrosalast.000webhostapp.com/imagen/logotipo.png" />';

$path_layout = LAYOUT_PATH .'/' . $conf[$modulo]['layout'];
$path_modulo = MODULO_PATH . '/' . $conf[$modulo]['archivo'];
if(file_exists($path_layout)){include($path_layout);}
else{if(file_exists($path_modulo)){include($path_modulo);}
else{die('Error al cargar el módulo <b>' . $modulo . '</b>. No existe el archivo <b>' . $conf[$modulo]['archivo'] . '</b>');}}
?>