<?php

include("conectar.php");
include("pedido-codigo.php");
$fecha = date('Y/m/d H:i');

$producto_id = $_POST['producto_id'];
//Si no existen las tablas, se crean
mysqli_query($con, "CREATE TABLE IF NOT EXISTS pedidos (numero INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, codigo VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, usuario VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, modificado VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, generado VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, atendido VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, pagado VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, despachado VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, anulado VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, eliminado VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, nota TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL) ENGINE = InnoDB");
mysqli_query($con, "CREATE TABLE IF NOT EXISTS pedido_$codigo (producto_id VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, cantidad_pedida INT(10) NOT NULL, cantidad_entregada INT(10) NOT NULL) ENGINE = InnoDB");
//Se verifica si ya se abrió un pedido con ese codigo, si es así no se vuelve a generar
$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos WHERE codigo='$codigo'");
$result_pedido = mysqli_fetch_array($busca_pedido);
if($result_pedido['codigo']==$codigo){
mysqli_query($con, "UPDATE pedidos SET modificado='$fecha' WHERE codigo='$codigo'");
}
else{
mysqli_query($con, "INSERT INTO pedidos (codigo, modificado) VALUES ('$codigo', '$fecha')");
}

//Se verifica si ya existe el elemento en la tabla del pedido
$busca_producto = mysqli_query($con, "SELECT * FROM pedido_$codigo WHERE producto_id='$producto_id'");
$result_producto = mysqli_fetch_array($busca_producto);
if ($result_producto['cantidad_pedida']!=''){
$cantidad = $result_producto['cantidad_pedida']+1;
mysqli_query($con, "UPDATE pedido_$codigo SET cantidad_pedida='$cantidad' WHERE producto_id='$producto_id'");
}
else{
mysqli_query($con, "INSERT INTO pedido_$codigo (producto_id, cantidad_pedida) VALUES ('$producto_id',1)");
}


echo '<a href="./pedido">Completar Pedido</a>';
?>