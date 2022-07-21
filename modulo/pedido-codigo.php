<?php
$codigo = $_COOKIE['provenex_codigo_pedido'];
if($codigo==''){
$caracteres = '0123456789abcdefghijklmnopqrstuvwxyz';
 $codigo = substr(str_shuffle($caracteres),0,20);
 setcookie('provenex_codigo_pedido', $codigo, time() + 3 * 24 * 60 * 60);
}
?> 