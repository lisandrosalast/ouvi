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
    'titulo' => 'OUVI',
    'descr' => '');
$conf['productos'] = array(
		'archivo' => 'productos.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Nuestros Productos',
    'descr' => '');
$conf['producto-editar'] = array(
		'archivo' => 'producto-editar.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Nuestros Productos',
    'descr' => '');
$conf['producto'] = array(
		'archivo' => 'producto.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Nuestros Productos',
    'descr' => '');
$conf['producto-disponibilidad'] = array(
		'archivo' => 'producto-disponibilidad.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Nuestros Productos',
    'descr' => '');
$conf['pedido'] = array(
		'archivo' => 'pedido.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Pedido',
    'descr' => '');

$conf['contacto'] = array(
		'archivo' => 'contacto.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Contacto',
    'descr' => '');
$conf['articulo'] = array(
		'archivo' => 'articulo.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Artículo',
    'descr' => '');
$conf['articulo-editar'] = array(
		'archivo' => 'articulo-editar.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Edición de Contenido',
    'descr' => '');
$conf['error'] = array(
		'archivo' => 'error.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - No se encuentra',
    'descr' => '');

$conf['ingreso'] = array(
		'archivo' => 'ingreso.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Ingrese a su cuenta',
    'descr' => '');
$conf['salida'] = array(
		'archivo' => 'salida.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Salir de su cuenta',
    'descr' => '');
$conf['correo_usuario'] = array(
		'archivo' => 'correo_usuario.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Cambio de correo',
    'descr' => '');
$conf['email_cambionombre'] = array(
		'archivo' => 'email_cambionombre.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Cambio de email',
    'descr' => '');
$conf['email_confirmecorreo'] = array(
		'archivo' => 'email_confirmecorreo.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Confirme correo electrónico',
    'descr' => '');
$conf['email_recordarclave'] = array(
		'archivo' => 'email_recordarclave.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Recordar clave de usuario',
    'descr' => '');
$conf['recordar-clave'] = array(
		'archivo' => 'recordarclave.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Recordar clave de usuario',
    'descr' => '');
$conf['recordar-correo'] = array(
		'archivo' => 'recordar-correo.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Recordar usuario',
    'descr' => '');
$conf['registro'] = array(
		'archivo' => 'registro.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Nuevo usuario',
    'descr' => '');
$conf['registro-'] = array(
		'archivo' => 'registro-.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Nuevo usuario',
    'descr' => '');
$conf['mi_cuenta'] = array(
		'archivo' => 'mi_cuenta.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Mi Cuenta',
    'descr' => '');

$conf['admin_pedidos'] = array(
		'archivo' => 'admin_pedidos.php',
		'layout' => LAYOUT_DEFECTO,
    'titulo' => 'OUVI - Gestión de Pedidos',
    'descr' => '');

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
$titulo = $articulo['titulo']." - OUVI";
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