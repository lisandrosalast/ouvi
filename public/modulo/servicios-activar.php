<?php
include("conectar.php");

$disponible = $_POST['disponible'];
$id = $_POST['id'];

//if(isset($_POST['corazon'])){
if ($disponible==1){$disponible=0;}
elseif($disponible==0){$disponible=1;}
mysqli_query($con, "UPDATE servicios SET disponible=\"$disponible\" WHERE id=\"$id\"");
//}

//$buscar = mysqli_query($con, "SELECT * FROM servicios WHERE id=\"$id\"");
//$result = mysqli_fetch_array($buscar);

echo $disponible;

?>