<?php
include("conectar.php");
mysqli_query($con, "CREATE TABLE IF NOT EXISTS favoritos ( producto_id VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , user_id VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ) ENGINE = InnoDB");

$user_id = $_POST['user_id'];
$producto_id = $_POST['producto_id'];

$producto = mysqli_query($con, "SELECT * FROM productos WHERE id=\"$producto_id\"");
$favs_producto = mysqli_fetch_array($producto);
$veces_fav = $favs_producto['favoritos'];
//$veces_fav = $_POST['veces_fav'];

$favoritos = mysqli_query($con, "SELECT * FROM favoritos WHERE producto_id=\"$producto_id\" and user_id=\"$user_id\"");
$result_fav = mysqli_fetch_array($favoritos);

if ($result_fav['user_id']==$user_id){
mysqli_query($con, "DELETE FROM favoritos WHERE producto_id=\"$producto_id\" and user_id=\"$user_id\"");
$fav=0;
$veces_fav = $veces_fav - 1;
}

else{
mysqli_query($con, "INSERT INTO favoritos (producto_id,user_id) VALUES ('$producto_id','$user_id')");
$fav=1;
$veces_fav = $veces_fav + 1;
}

if($user_id!=''){
mysqli_query($con, "UPDATE productos SET favoritos='$veces_fav' WHERE id='$producto_id'");
}

echo $fav;
echo $veces_fav;

?>