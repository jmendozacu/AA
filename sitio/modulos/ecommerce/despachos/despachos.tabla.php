<?
/*
| ----------------------------------------------------------------- |
CF-informer
Desarrollado por Comprandofacil
http://www.comprandofacil.com/
Copyright (c) 2000 - 2009
Medellin - Colombia
=====================================================================
  Autores: 
  Juan Fernando Fern�ndez <consultorweb@comprandofacil.com> - Proyectos
  Juan Felipe S�nchez <graficoweb@comprandofacil.com> - Dise�o
  Jos� Fernando Pe�a <soporteweb@comprandofacil.com> - Mercadeo
=====================================================================
| ----------------------------------------------------------------- | 
*/
// Tabla central de datos cuando se hacen los listados
?>
<br>

<table width="100%" border="0" cellpadding="2" cellspacing="1" align="center" class="text1">
<?
// encabezado generico basado 
$nombrecampos="Id,Num Pedido,Cliente,Ciudad Origen,Ciudad Destino,Transporte,Cantidad,Total Guia,Ultimo Estado,Fecha Transaccion,Ultimo Estado,Envio";
if ($idtienda=="") $nombrecampos.=",Tienda";

include($rutxx."../../incluidos_modulos/tabla.encabezado.php");
$contar=0;
	while (!$result->EOF && ($contar<$maxregistros)) {
		if ($contar%2==0) { 
			$fondo=$fondo1;
		} else { 
		
			$fondo=$fondo2;		
		}
		// validar cada una si tiene bodeha origen y destino
		$dsorigen=" Origen ";
		$dsdestino=" Destino ";
		 $idasistido=$result->fields[9];
		 $idtipocomp=$result->fields[10];

		$xmen="";
		if ($idasistido=="99999999999") $xmen="<br>(<font class='textazullink'><strong>Asistida</strong></font>)"; 
		if ($idasistido=="88888888888") $xmen="<br>(<font class='textazullink'><strong>Casillero</strong></font>)"; 
		if ($idasistido=="77777777777") $xmen="<br>(<font class='textazullink'><strong>Exportacion</strong></font>)"; 
		if ($idtipocomp=="66666666666") $xmen="<br>(<font class='textazullink'><strong>Cotizacion</strong></font>)"; 
		
		

		?>
		<form method=post name="x" action="enviar.b2b.php">
		 <tr bgcolor="<? echo $fondo?>" onMouseOut="mOut(this,'<? echo $fondo;?>');" onMouseOver="mOvr(this,'<? echo $fondo3;?>');" >
		<!--td><img width="10px" src="../../img_modulos/<? echo $result->fields[6]?>.png"></td-->
		<td align="center"><? echo $result->fields[0]?></td>
		<td align="center" class='textazullink'><? echo $result->fields[11].$xmen;?></td><!--numero pedido-->
		<? 
			$dsnombrescom=seldato("dsnombres","id","tblclientes",$result->fields[12],1);
			$dsapellidoscom=seldato("dsapellidos","id","tblclientes",$result->fields[12],1);
		?>

		<td align="center"><a title="Click para ver y actualizar los datos de un cliente" class='textazullink' HREF="javascript:irAPaginaDN('../clientesregistrados/default.php?enca=1&idclientepago=<? echo $result->fields[12]; ?>',100,100)"><? echo $dsnombrescom." ".$dsapellidoscom; ?></a></td><!--cliente-->
		<td align="center" ><? echo $result->fields[17]?></td><!--ciudad-->
		<td align="center"><? echo $result->fields[18]?></td><!--subtotal-->
		<td align="center" ><? echo $result->fields[21]?></td><!--flete valor-->
		<td align="center"><? echo $result->fields[23]?></td><!--Iva-->
		<td align="center"><? echo $result->fields[22]?></td><!--descuento-->
	    <td align="center" style="height: 24px"><!--estado-->
	    <strong>
	    <a  class='textazullink' title="Click para actualizar este estado" href="tracking.php?idestado=<? echo $result->fields[6]; ?>&dsestado=<? echo ver_estado($result->fields[6])?>&idpedido=<? echo $result->fields[11]?>&id=<? echo $result->fields[0];?>&idclientepago=<? echo $result->fields[12];?>">
			<?echo ver_estado($result->fields[6]); ?>
		</a>
		</strong>
	  	</td>
		<td align="left" >
			<? echo $result->fields[14];?>
		</td>  		  		

			<?$direccion=seldato("dsdireccion","id","tblclientes",$result->fields[9],1);?>
			<?$dstelefono=seldato("dstelefono","id","tblclientes",$result->fields[9],1);?>
			<?$celular=seldato("dsmovil","id","tblclientes",$result->fields[9],1);?>
			<?$dsidentificacion=seldato("dsidentificacion","id","tblclientes",$result->fields[9],1);?>

			<input Type="hidden" name="id[]" id="id[]" value="<?echo $result->fields[0]?>">
		  <input Type="hidden" name="num[]" id="num[]" value="<? echo $result->fields[11].$xmen;?>">
		  <input Type="hidden" name="nombrecliente[]" id="nombrecliente[]" value="<? echo $dsnombrescom." ".$dsapellidoscom; ?>">
		  <input Type="hidden" name="ciudad_origen[]" id="ciudad_origen[]" value="<? echo $result->fields[17]?>">
		  <input Type="hidden" name="ciudad_destino[]" id="ciudad_destino[]" value="<? echo $result->fields[18]?>">
		  <input Type="hidden" name="Transporte[]" id="Transporte[]" value="<? echo $result->fields[21]?>">
		  <input Type="hidden" name="Cantidad[]" id="Cantidad[]" value="<? echo $result->fields[22]?>">
		  <input Type="hidden" name="direccion[]" id="direccion[]" value="<?echo $direccion?>">
		  <input Type="hidden" name="dstelefono[]" id="dstelefono[]" value="<?echo $dstelefono?>">
		  <input Type="hidden" name="celular[]" id="celular[]" value="<?echo $celular?>">
		  <input Type="hidden" name="dsidentificacion[]" id="dsidentificacion[]" value="<?echo $dsidentificacion?>">
		  <input Type="hidden" name="idcompra[]" id="idcompra[]" value="<?echo $result->fields[23]?>">
		  <input Type="hidden" name="idcliente[]" id="idcliente[]" value="<?echo $nombreautorizado?>">
		 
		<input Type="hidden" name="totalvalorguia[]" id="totalvalorguia[]" value="<?echo $result->fields[19]?>">
		 
<td>
	 
	<?//echo $result->fields[6]?>
<? //combo_estados($result->fields[6],$result->fields[11],$result->fields[0],$result->fields[12])?>	
<select class="text1" name="tracking_<? echo $result->fields[0]?>" onChange="cambiar_pedido('envio_proceso_<? echo $result->fields[0]?>','tracking_<? echo $result->fields[0]?>')" disabled>
<? 	$sqlb="select id,dsm ";
    $sqlb.=" from ecommerce_tblestadoscompra where id>0 and idactivo not in (2,9) order by idpos asc";
	$resultb=$db->Execute($sqlb);
	if (!$resultb->EOF) {
			
		?>	
	<option value="">--Seleccione--</option>
	<?while(!$resultb->EOF){
	$sel="";
	if($result->fields[6]==$resultb->fields[0])$sel="selected";?>
	<option value="tracking.php?idpedido=<?echo $result->fields[11]?>&id=<?echo $result->fields[0]?>&idclientepago=<?echo $result->fields[12]?>&idestado=<?echo $resultb->fields[0]?>&dsestado=<?echo $resultb->fields[1]?>" <?echo $sel?> ><? echo $resultb->fields[1]?></option>
    <?$resultb->MoveNext();
	}//fin while
	}//fin if
	$resultb->Close();
	?>
	</select>
</td>

<? if ($idtienda==""){?>
<td align="center"><? echo seldato("dsnombre","id","tblempresa",$result->fields[16],1)?></td><!--tienda-->
<? } ?>
					
			 <td align="center" style="height: 24px">

	
		  <input Type="checkbox" name="validar[]" id="validar[]" value="<?echo $result->fields[0]?>" <?if ($result->fields[24]==1){?>checked disabled<?}?>><br>Enviar 
		  
		  </td>
			
		  <td align="center" style="height: 24px">
		  <?	

         if ($idasistido=="99999999999" || $idasistido=="88888888888" || $idasistido=="77777777777") {
		  $mrutax="<font color=blue><strong>MODIFICAR</strong></font>";
		  $rutax="../ventasasistidas/default.php?idpedido=".$result->fields[11]."&id=".$result->fields[0]."&idclientepago=".$result->fields[12]."";
		  include($rutxx."../../incluidos_modulos/enlace.generico.php");
		  ?>
		  |
<?
}

		  $mrutax="Detalle";
		  $rutax="javascript:irAPaginaDN('../../../proceso.pago.impresion.php?idtienda=".$result->fields[16]."&mostrarenlace=1&dscampo1=$dscampo1&idpedido=".$result->fields[11]."&idclientepago=".$result->fields[12]."',100,100)";
		  include($rutxx."../../incluidos_modulos/enlace.generico.php");?>
		  |
		  <?
		  $rutax=$pagina."?idx=".$result->fields[0]."&idpedido=".$result->fields[11];
		  $formax="";
		  include($rutxx."../../incluidos_modulos/enlace.eliminar.php");?>


<?
		/*  $mrutax="Historial";
		  $rutax="tracking.historicos.php?r=1&idpedido=".$result->fields[11]."&id=".$result->fields[0]."&idclientepago=".$result->fields[12]."";
		  include($rutxx."../../incluidos_modulos/enlace.generico.php");?>

|

<?
		  $mrutax="Garantias / Devoluciones";
		  $rutax="tracking.gdev.php?r=1&idpedido=".$result->fields[11]."&id=".$result->fields[0]."&idclientepago=".$result->fields[12]."";
		  include($rutxx."../../incluidos_modulos/enlace.generico.php");?>

|
<?
		  $mrutax="Facturar";
		  $rutax="../../facturacion/facturacion/pedidos.primer.paso.php?pedidox=".$result->fields[11]."&r=1&idclientey=".$result->fields[12]."";
		  include($rutxx."../../incluidos_modulos/enlace.generico.php");?>

|

*/
		  ?>
		  

		</td>

		</tr>
		
		<?
		$contar++;
		$result->MoveNext();
	} // fin while 
	?>
	<tr>
		<td align="center" colspan="12">
	<input Type="button" name="enviar" id="enviar" Value="ENVIAR" onclick="validarx();" >
		</td>
	</tr>	
	</form>

<tr><td colspan=<? echo $total?> align="center">

</td></tr>
</table>
