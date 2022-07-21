<?php 
  // Borra todas las variables de sesión 
  $_SESSION = array(); 
  // Borra la cookie que almacena la sesión 
if(isset($_COOKIE['provenex_user_code'])) {
setcookie('provenex_user_code', '', time() - 42000); 
}
  // Finalmente, destruye la sesión 
  session_destroy(); 
if(isset($_COOKIE['provenex_codigo_pedido'])) {
setcookie('provenex_codigo_pedido', '', time() - 42000); 
} 
?> 