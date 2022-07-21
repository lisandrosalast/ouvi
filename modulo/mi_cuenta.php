<div class="a25">
<?php
echo '<h2>'.$cuenta['nombre'].'</h2>';

echo '<p>';
echo '<b>Usuario</b><br/>';
echo '<a href="./?i=mi_cuenta&ver=info">Mis datos</a><br/>';
echo '</p>';

echo '<p>';
echo '<b>Pedidos</b><br/>';
echo '<a href="./pedido">Actual</a><br/>';
echo '<a href="./?i=mi_cuenta&ver=pedidos">Histórico</a><br/>';
echo '<a href="./?i=mi_cuenta&ver=pedidos_eliminados">Eliminados</a><br/>';
echo '</p>';


if(substr($cuenta['permisos_uva'],2,1)==1){
echo '<p>';
echo '<b>Administrador</b><br/>';
echo '<a href="./admin_pedidos">Gestionar Pedidos</a><br/>';
echo '<a href="./producto-editar">Actualizar Inventarios</a><br/>';
echo '<a href="./producto-editar">Añadir Producto</a><br/>';
echo '<a href="./articulo-editar">Redactar Contenido</a><br/>';
echo '<a href="./admin_usuarios">Administrar Usuarios</a><br/>';
echo '</p>';
}

echo '<p>';
echo '<a href="./salida">Cerrar sesión</a>';
echo '</p>';

?>
</div>

<div class="a75">
<?php

if ($_GET['ver']=="pedidos"){
echo '<h2>Histórico de Pedidos</h2>';
echo '<br><table border="0" cellspacing="0" cellpadding="6px">';
echo '<tr bgcolor="#f3991a">';
echo '<td><b>Orden</b></td>';
echo '<td><b>Fecha</b></td>';
echo '<td><b>Status</b></td>';
echo '</tr>';
$x=0;
$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos");
while($result_pedido = mysqli_fetch_array($busca_pedido)){
if($result_pedido['usuario']==$user_id and $result_pedido['eliminado']==''){
$x=$x+1;
$codigo = $result_pedido['codigo'];
$orden = $result_pedido['numero'];
$fecha = $result_pedido['generado'];
echo '<tr bgcolor="';
if($x%2==0){echo '#eeeeee">';}
else{echo '#ffffff">';}
echo '<td><a href="./?i=pedido&orden='.$codigo.'">'.$orden.'</a></td>';
echo '<td>'.$fecha.'</td>';
if($result_pedido['despachado']!=''){$status = "Entregado";}
else {
if($result_pedido['anulado']!=''){$status = "Anulado";}
else{
if($result_pedido['generado']!='' and $result_pedido['atendido']==''){$status = "Pendiente";}
elseif($result_pedido['generado']!='' and $result_pedido['atendido']!=''){$status = "Por Entregar";}
}
}
echo '<td>'.$status.'</td>';
echo '</tr>';
}
}
echo '</table></br>';
}



elseif ($_GET['ver']=="pedidos_eliminados"){
echo '<h2>Pedidos Eliminados</h2>';
echo '<br><table border="0" cellspacing="0" cellpadding="6px">';
echo '<tr bgcolor="#f3991a">';
echo '<td><b>Orden</b></td>';
echo '<td><b>Fecha</b></td>';
echo '<td><b>Eliminado</b></td>';
echo '</tr>';
$x=0;
$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos");
while($result_pedido = mysqli_fetch_array($busca_pedido)){
if($result_pedido['usuario']==$user_id and $result_pedido['eliminado']!=''){
$x=$x+1;
$codigo = $result_pedido['codigo'];
$orden = $result_pedido['numero'];
$fecha = $result_pedido['generado'];
$elimin = $result_pedido['eliminado'];
echo '<tr bgcolor="';
if($x%2==0){echo '#eeeeee">';}
else{echo '#ffffff">';}
echo '<td><a href="./?i=pedido&orden='.$codigo.'">'.$orden.'</a></td>';
echo '<td>'.$fecha.'</td>';
echo '<td>'.$elimin.'</td>';
echo '</tr>';
}
}
echo '</table></br>';
}







elseif ($_GET['ver']=="info" or $_GET['ver']==""){
echo '<h2>'.$cuenta['nombre'].'</h2>';
echo $cuenta['cedula'];
echo '<p><b>Dirección</b>: '.$cuenta['direccion'].'</p>';
echo '<p><b>Correo</b>: '.$cuenta['email'].'</p>';
echo '<p><b>Teléfono</b>: '.$cuenta['telefono'].'</p>';

}


else{echo 'No hay nada aquí todavía';}
?>
</div>

