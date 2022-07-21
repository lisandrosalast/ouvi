<?php
include("conectar.php");

$url = $_GET['url'];
$buscar = mysqli_query($con, "SELECT * FROM articulos WHERE url=\"$url\"");
$result = mysqli_fetch_array($buscar);
if($result['titulo'] != ''){echo '<div class="full"><center><h1 style="padding:20px 10px">'.$result['titulo'].'</h1></center></div>';}
if($result['foto'] != ''){echo '<div class="full"><img src="./contenido/'.$result['foto'].'" width="100%"></div>';}
if($result['contenido'] != ''){echo '<div class="a100">'.$result['contenido'].'</div>';}

?>
