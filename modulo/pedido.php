<div class="a100">
<?php

include("conectar.php");
$fecha= date('Y/m/d H:i');

if(isset($_POST['enviar']) or isset($_POST['eliminar']) or isset($_POST['procesar']) or isset($_POST['anular']) or isset($_POST['cobrar']) or isset($_POST['entregar'])){
$codigo = $_POST['codigo'];
$cant_prod = $_POST['cant_prod'];
$x=1;
while($x<=$cant_prod){
$producto_id = $_POST["id$x"];
$solicitado = $_POST["s$x"];
$entregado = $_POST["e$x"];

//INVENTARIO
mysqli_query($con, "UPDATE pedido_$codigo SET cantidad_pedida='$solicitado' WHERE producto_id='$producto_id'");
$buscar = mysqli_query($con, "SELECT * FROM productos WHERE id='$producto_id'");
$result = mysqli_fetch_array($buscar);
if(isset($_POST['enviar'])){$inventario = $result['inventario'] - $solicitado;}
if(isset($_POST['eliminar'])){$inventario = $result['inventario'] + $solicitado;}
if(isset($_POST['procesar'])){$inventario = $result['inventario'] + ($solicitado - $entregado);}
if(isset($_POST['anular'])){
if($entregado==0){$inventario = $result['inventario'] + $solicitado;}
else{$inventario = $result['inventario'] + $entregado;}
}
mysqli_query($con, "UPDATE pedido_$codigo SET cantidad_entregada='$entregado' WHERE producto_id='$producto_id'");
mysqli_query($con, "UPDATE productos SET inventario='$inventario' WHERE id='$producto_id'");
$x=$x+1;
}

//STATUS PEDIDOS
if(isset($_POST['enviar']) and isset($_COOKIE['provenex_user_code'])){
$user_id = $_COOKIE['provenex_user_code'];
mysqli_query($con, "UPDATE pedidos SET usuario=\"$user_id\", modificado=\"$fecha\", generado=\"$fecha\" WHERE codigo=\"$codigo\"");
}
if(isset($_POST['eliminar'])){
mysqli_query($con, "UPDATE pedidos SET eliminado='$fecha' WHERE codigo='$codigo'");
}
if(isset($_POST['procesar'])){
mysqli_query($con, "UPDATE pedidos SET atendido='$fecha' WHERE codigo='$codigo'");
}
if(isset($_POST['anular'])){
mysqli_query($con, "UPDATE pedidos SET anulado='$fecha' WHERE codigo='$codigo'");
}
if(isset($_POST['cobrar'])){
mysqli_query($con, "UPDATE pedidos SET pagado='$fecha' WHERE codigo='$codigo'");
}
if(isset($_POST['entregar'])){
mysqli_query($con, "UPDATE pedidos SET despachado='$fecha' WHERE codigo='$codigo'");
}

$nota = $_POST['nota'];
mysqli_query($con, "UPDATE pedidos SET nota='$nota' WHERE codigo='$codigo'");

if($_POST['cookie']=='eliminar' and isset($_COOKIE['provenex_codigo_pedido'])) {
setcookie('provenex_codigo_pedido', '', time() - 42000); 
}
echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=./?i=pedido&orden='.$codigo.'">'; 
}

//TABLA DE PEDIDO
else{
if($_GET['orden']!=''){
$codigo = $_GET['orden'];
$cookie = "mantener";
}
if($_GET['orden']==''){
$cookie = "eliminar";
}
if($codigo!=''){
echo '<h1>Pedido '.$codigo.'</h1>';
echo '<form method="POST">';
echo '<input type="text" id="codigo" name="codigo" value="'.$codigo.'" style="display:none;text-align:center;width:10%">';
echo '<input type="text" id="cookie" name="cookie" value="'.$cookie.'" style="display:none;text-align:center;width:10%">';
$x=0;
$busca_pedido = mysqli_query($con, "SELECT * FROM pedido_$codigo ");
echo '<br><table border="0" cellspacing="0" cellpadding="6px">';
echo '<tr bgcolor="#f3991a"><td><b>Producto</b></td><td><b>Solicitado</b></td>';
if($_GET['orden']!='' and substr($cuenta['permisos_uva'],2,1)==1){
echo '<td id="ent"><b>Entregado</b></td>';
}
echo '</tr>';
while($result_pedido = mysqli_fetch_array($busca_pedido)){
$x=$x+1;
echo '<tr bgcolor="';
if($x%2==0){echo '#eeeeee">';}
else{echo '#ffffff">';}
$cantidad = $result_pedido['cantidad_pedida'];
$entregado = $result_pedido['cantidad_entregada'];
$producto_id = $result_pedido['producto_id'];
$busca_producto = mysqli_query($con, "SELECT * FROM productos WHERE id='$producto_id'");
$result_producto = mysqli_fetch_array($busca_producto);
$nombre_producto = $result_producto['producto'];
echo '<td>'.$nombre_producto;
echo '<input type="text" id="id'.$x.'" name="id'.$x.'" readonly="readonly" value="'.$producto_id.'" style="display:none;text-align:center;width:10%">';
echo '</td>';
if($_GET['orden']!=''){$solo_lectura = ' readonly="readonly"';}
if($_GET['orden']==''){$solo_lectura = '';}
echo '<td>';
echo '<input type="text" id="s'.$x.'" name="s'.$x.'"'.$solo_lectura.' value="'.$cantidad.'" style="text-align:center;width:95%">';
echo '</td>';

if($_GET['orden']!='' and substr($cuenta['permisos_uva'],2,1)==1){
if($_GET['orden']==''){$solo_lectura = ' readonly="readonly"';}
if($_GET['orden']!=''){$solo_lectura = '';}
echo '<td>';
echo '<input type="text" id="e'.$x.'" name="e'.$x.'"'.$solo_lectura.' value="'.$entregado.'" style="text-align:center;width:95%">';
echo '</td>';
}
echo '</tr>';
}
echo '</table><br>';

$busca_status = mysqli_query($con, "SELECT * FROM pedidos WHERE codigo='$codigo'");
$result_status = mysqli_fetch_array($busca_status);
echo ' <input type="text" id="cant_prod" name="cant_prod" value="'.$x.'" style="display:none;text-align:center;width:10%">';
echo 'Nota: <input type="text" id="nota" name="nota" value="'.$result_status['nota'].'" style="text-align:center;width:20%"><br><br>';

if($_GET['orden']!='' and $result_status['generado']!='' and $result_status['atendido']=='' and $result_status['eliminado']=='' and $result_status['anulado']==''){
echo ' <input type="submit" id="eliminar" name="eliminar" value="Eliminar" style="text-align:center;width:10%">';
}
if($_GET['orden']==''){
echo ' <input type="submit" id="enviar" name="enviar" value="Enviar" style="text-align:center;width:10%">';
}
if($_GET['orden']!='' and substr($cuenta['permisos_uva'],2,1)==1){
if($result_status['generado']!='' and $result_status['atendido']=='' and $result_status['anulado']=='' and $result_status['eliminado']=='' and $result_status['pagado']=='' and $result_status['despachado']==''){
echo ' <input type="submit" id="procesar" name="procesar" value="Procesar" style="text-align:center;width:10%">';
echo '<script type="text/javascript">document.getElementById("ent").innerHTML="<b>Entregar</b>"</script><body onload="dale()"></body>';
}
if($result_status['generado']!='' and $result_status['atendido']!='' and $result_status['anulado']=='' and $result_status['eliminado']=='' and $result_status['pagado']=='' and $result_status['despachado']==''){
echo ' <input type="submit" id="cobrar" name="cobrar" value="Cobrar" style="text-align:center;width:10%">';
}
if($result_status['generado']!='' and $result_status['atendido']!='' and $result_status['anulado']=='' and $result_status['eliminado']=='' and $result_status['pagado']!='' and $result_status['despachado']==''){
echo ' <input type="submit" id="entregar" name="entregar" value="Entregar" style="text-align:center;width:10%">';
}
if($result_status['generado']!='' and $result_status['anulado']=='' and $result_status['eliminado']=='' and $result_status['pagado']=='' and $result_status['despachado']==''){
echo ' <input type="submit" id="anular" name="anular" value="Anular" style="text-align:center;width:10%">';
}
}
echo '</form>';
}

//if($result_status['generado']!='' and $result_status['atendido']=='' and $result_status['anulado']=='' and $result_status['eliminado']=='' and $result_status['pagado']=='' and $result_status['despachado']==''){
//echo '<script type="text/javascript">document.getElementById("ent").innerHTML="Entregar"</script><body onload="dale()"></body>';
//}

}

//hacer innerHTML para modificar titulo de columna Entregado segun el caso (Entregar si es Procesar el boton, Entregado)

?>
</div>