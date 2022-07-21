<?php
include("conectar.php");
$user_id = $_COOKIE['provenex_user_code'];
$busca = mysqli_query($con,"SELECT * FROM usuarios WHERE id='$user_id'");
$cuenta = mysqli_fetch_array($busca);
if($user_id == $cuenta['id'] and $user_id != ''){$sesion = '<a href="./mi_cuenta"><li>'.$cuenta['nombre'].'</li></a>';}
else {$sesion = '<a href="./ingreso"><li>Ingresar</li></a>';}
?> 