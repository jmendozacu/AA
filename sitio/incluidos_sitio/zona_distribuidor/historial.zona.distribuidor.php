<article id='historial' class="cuerpo_zona_distribuidor">
<h1>Bienvenido <?echo reemplazar($_SESSION['i_dsnombre']);?></h1>
<?
$sql="select dsfechalarga,idpedido,idestado,dstotal,dsformadepago dstotal,dsiva,dsdescuento ";
$sql.=",dsvalorseguro,dsmanejo,id ";
$sql.="from ecommerce_tblpagos where idclientepago=".$_SESSION['i_idcliente'];
$sql.=" and idtienda = 1 ";
$sql.="  and idestado not in (12)";
$sql.=" order by id desc ";
?>
<table width="100%" class="ecommerce_tbl_pedidos">
<?
$resultx=$db->Execute($sql);
if(!$resultx->EOF){
	?>
<thead>
	<tr>
		<td>Pedidos recientes</td>
		<!--td>Referencia</td-->
		<td>Fecha</td>
		<td>Valor</td>
		<td>Estado</td>
		<td></td>
		<td></td>
	</tr>
</thead>
<?
while(!$resultx->EOF){
?>
<tbody>
	<tr>
		<!--td></td-->
		<td><?echo  $resultx->fields[1] ?></td>
		<td><?echo  $resultx->fields[0] ?></td>
		<td>$ <?echo number_format($resultx->fields[3],0)?></td>
		<?if($resultx->fields[2]==4){?>
		<td class="verde">Despachado</td>
		<?}elseif($resultx->fields[2]==2) {?>
		<td class="azul">Por despachar</td>
		<?}else{?>
		<td class="rojo">
		<?echo seldato('dsm','id','ecommerce_tblestadoscompra',$resultx->fields[2],2);?></td>
		<?}?>
		<td><a href="duplicar.php?idpedido=<?echo $resultx->fields[1]?>" class="enlace">Duplicar pedido + </a></td>
		<td><a href="zona.distribuidor.php?idpedido=<?echo $resultx->fields[1]?>#pedidos_detalle">Ver detalle</a></td>
	</tr>
</tbody>


<?
$resultx->MoveNext();
}
 }
$resultx->Close();
?>
</table>

</article>
