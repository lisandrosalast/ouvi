<?php
include "./modulo/conectar.php";
$numero_articulos = $_POST['numero_articulos'];

$x=1;
while($x<=$numero_articulos){
$producto_id = "id".$x;
$producto_id = $_POST[$producto_id];
$cantidad = "cant".$x;
$cantidad = $_POST[$cantidad];

$buscar = mysqli_query($con, "SELECT * FROM productos WHERE id=\"$producto_id\"");
$result = mysqli_fetch_array($buscar);
$inventario = $result['inventario'] - $cantidad;

mysqli_query($con, "UPDATE productos SET inventario='$inventario' WHERE id='$producto_id'");

echo $producto_id;
echo " ".$cantidad;
echo "<br/>";
$x=$x+1;
}

?>