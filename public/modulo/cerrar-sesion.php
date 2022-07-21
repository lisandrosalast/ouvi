<?php 
  // Borra todas las variables de sesión 
  $_SESSION = array(); 
  // Borra la cookie que almacena la sesión 
if(isset($_COOKIE['lisandrosalast_user_id'])) {
setcookie('lisandrosalast_user_id', '', time() - 42000); 
} 
  // Finalmente, destruye la sesión 
  session_destroy(); 
?> 