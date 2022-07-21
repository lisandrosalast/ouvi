<?php

if(substr($cuenta['permisos_uva'],2,1)==1){

echo '<div class="a25">';
echo '<p>';
echo '<b>Pedidos</b><br/>';
echo '<a href="./?i=admin_pedidos&ver=todos">Todos</a><br/>';
echo '<a href="./?i=admin_pedidos&ver=pendientes">Pendientes</a><br/>';
echo '<a href="./?i=admin_pedidos&ver=procesados">Procesados</a><br/>';
echo '<a href="./?i=admin_pedidos&ver=pagados">Pagados</a><br/>';
echo '<a href="./?i=admin_pedidos&ver=entregados">Entregados</a><br/>';
echo '<a href="./?i=admin_pedidos&ver=anulados">Anulados</a><br/>';
echo '<a href="./?i=admin_pedidos&ver=eliminados">Eliminados</a><br/>';
echo '<a href="./?i=admin_pedidos&ver=no_generados">No Generados</a><br/>';
echo '</p>';
echo '</div>';

if($_GET['usuario']!=""){
$usuario = $_GET['usuario'];
$busca_usuario = mysqli_query($con, "SELECT * FROM usuarios where usuario='$usuario'");
$result_usuario = mysqli_fetch_array($busca_usuario);
$usuario = $result_usuario['id'];
}

echo '<div class="a75">';
echo '<h2>';
if($_GET['ver']=="todos" or $_GET['ver']==""){echo 'Todos los Pedidos';}
elseif($_GET['ver']=="pendientes"){echo 'Pedidos Pendientes';}
elseif($_GET['ver']=="procesados"){echo 'Pedidos Procesados';}
elseif($_GET['ver']=="pagados"){echo 'Pedidos Pagados';}
elseif($_GET['ver']=="entregados"){echo 'Pedidos Entregados';}
elseif($_GET['ver']=="anulados"){echo 'Pedidos Anulados';}
elseif($_GET['ver']=="eliminados"){echo 'Pedidos Eliminados';}
elseif($_GET['ver']=="no_generados"){echo 'Pedidos No Generados';}
if($usuario!=""){echo ' de '.$_GET['usuario'];}
echo '</h2>';
if($usuario!=""){echo 'De este usuario: <a href="./?i=admin_pedidos&usuario='.$_GET['usuario'].'">Todos</a>, 
<a href="./?i=admin_pedidos&usuario='.$_GET['usuario'].'&ver=pendientes">Pendientes</a>, 
<a href="./?i=admin_pedidos&usuario='.$_GET['usuario'].'&ver=procesados">Procesados</a>, 
<a href="./?i=admin_pedidos&usuario='.$_GET['usuario'].'&ver=pagados">Pagados</a>, 
<a href="./?i=admin_pedidos&usuario='.$_GET['usuario'].'&ver=entregados">Entregados</a>, 
<a href="./?i=admin_pedidos&usuario='.$_GET['usuario'].'&ver=anulados">Anulados, 
<a href="./?i=admin_pedidos&usuario='.$_GET['usuario'].'&ver=eliminados">Eliminados</a>';
echo '<br/>';}
echo '<br/><table border="0" cellspacing="0" cellpadding="6px">';
echo '<tr bgcolor="#f3991a">';
echo '<td><b>Orden</b></td>';
echo '<td><b>Usuario</b></td>';
echo '<td><b>Status</b></td>';
echo '<td><b>Fecha</b></td>';
echo '</tr>';
$x=0;
if(($_GET['ver']=="todos" or $_GET['ver']=="") and $usuario==""){$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos");}
elseif($_GET['ver']=="pendientes" and $usuario==""){$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos WHERE eliminado='' and anulado='' and generado!='' and atendido=''");}
elseif($_GET['ver']=="procesados" and $usuario==""){$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos WHERE anulado='' and generado!='' and atendido!='' and pagado=''");}
elseif($_GET['ver']=="pagados" and $usuario==""){$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos WHERE anulado='' and pagado!='' and despachado=''");}
elseif($_GET['ver']=="entregados" and $usuario==""){$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos WHERE anulado='' and despachado!=''");}
elseif($_GET['ver']=="anulados" and $usuario==""){$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos WHERE anulado!=''");}
elseif($_GET['ver']=="eliminados" and $usuario==""){$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos WHERE eliminado!=''");}
elseif($_GET['ver']=="no_generados" and $usuario==""){$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos WHERE eliminado='' and generado=''");}
elseif(($_GET['ver']=="todos" or $_GET['ver']=="") and $usuario!=""){$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos WHERE usuario='$usuario'");}
elseif($_GET['ver']=="pendientes" and $usuario!=""){$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos WHERE eliminado='' and anulado='' and generado!='' and atendido='' and usuario='$usuario'");}
elseif($_GET['ver']=="procesados" and $usuario!=""){$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos WHERE anulado='' and generado!='' and atendido!='' and pagado='' and usuario='$usuario'");}
elseif($_GET['ver']=="pagados" and $usuario!=""){$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos WHERE anulado='' and pagado!='' and despachado='' and usuario='$usuario'");}
elseif($_GET['ver']=="entregados" and $usuario!=""){$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos WHERE anulado='' and despachado!='' and usuario='$usuario'");}
elseif($_GET['ver']=="anulados" and $usuario!=""){$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos WHERE anulado!='' and usuario='$usuario'");}
elseif($_GET['ver']=="eliminados" and $usuario!=""){$busca_pedido = mysqli_query($con, "SELECT * FROM pedidos WHERE eliminado!='' and usuario='$usuario'");}

while($result_pedido = mysqli_fetch_array($busca_pedido)){
$x=$x+1;
$codigo = $result_pedido['codigo'];
$orden = $result_pedido['numero'];
$fecha = $result_pedido['modificado'];
$usuario = $result_pedido['usuario'];
$busca_usuario = mysqli_query($con, "SELECT * FROM usuarios where id='$usuario'");
$result_usuario = mysqli_fetch_array($busca_usuario);
$usuario = $result_usuario['usuario'];

echo '<tr bgcolor="';
if($x%2==0){echo '#eeeeee">';}
else{echo '#ffffff">';}
echo '<td><a href="./?i=pedido&orden='.$codigo.'">'.$orden.'</a></td>';
echo '<td><a href="./?i=admin_pedidos&usuario='.$usuario.'">'.$usuario.'</td>';
if($result_pedido['despachado']!=''){$status = "Entregado";}
elseif($result_pedido['anulado']!=''){$status = "Anulado";}
elseif($result_pedido['eliminado']!=''){$status = "Eliminado";}
elseif($result_pedido['generado']==''){$status = "Incompleto";}
elseif($result_pedido['generado']!='' and $result_pedido['atendido']==''){$status = "Pendiente";}
elseif($result_pedido['generado']!='' and $result_pedido['atendido']!='' and $result_pedido['pagado']==''){$status = "Por Cobrar";}
elseif($result_pedido['generado']!='' and $result_pedido['atendido']!='' and $result_pedido['pagado']!=''){$status = "Por Entregar";}
echo '<td>'.$status.'</td>';
echo '<td>'.$fecha.'</td>';
echo '</tr>';
}
echo '</table></br>';

echo '</div>';}

else { echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=./mi_cuenta">';}
?>