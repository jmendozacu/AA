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
<form action="<? echo $pagina;?>" method=post name=p>
<?
// encabezado generico basado
$nombrecampos="Id,Nombre,Activar,Categor&iacute;a";
include($rutxx."../../incluidos_modulos/tabla.encabezado.php");
$contar=0;
while (!$result->EOF) {

	if ($contar%2==0) {
		$fondo=$fondo1;
	} else {
		$fondo=$fondo2;
	}
	?>
     <tr bgcolor="<? echo $fondo?>" onMouseOut="mOut(this,'<? echo $fondo;?>');" onMouseOver="mOvr(this,'<? echo $fondo3;?>');" >
	  <td align="center" width="15%">
	  <input type="text" name="id_[]" value="<? echo $result->fields[0]?>" size="2" readonly class="textnegro">
		</td>
		  <td align="center">
	  <input type="text" name="dsnombre_[]" value="<? echo $result->fields[1]?>" size="30" class="textnegro" maxlength="100">
		</td>

		 <td align="center">
			  <select name="idactivo_[]" class="textnegro">
				  <option value="1" <? if ($result->fields[2]==1) echo "selected";?>>SI</option>
				  <option value="2" <? if ($result->fields[2]==2) echo "selected";?>>NO</option>
			  </select>
		  </td>

		<td align="center">
			<?
				$sqlx="SELECT id,dsm FROM crmtblactividadesxcategoria WHERE idactivo=1";
				$resultx = $db->Execute($sqlx);
				if (!$resultx->EOF) {
			?>
			  <select name="idcat_[]" class="textnegro">
			  		<option value="0"> -- Seleccionar --</option>
			  	<?
			  	while(!$resultx->EOF) {
			  		$idx=$resultx->fields[0];
			  		$dsmx=$resultx->fields[1];
			  	?>
				  <option value="<? echo $idx;?>" <? if ($result->fields[4]==$idx) echo "selected";?>> <? echo $dsmx;?> </option>
				 <?
				 $resultx->MoveNext();
				}
				 ?>
			  </select>
			<?
			}
			$resultx->Close();
			?>
		  </td>

	  <td align="center">

	  <?
	  $rutax="actividades.editar.php?idx=".$result->fields[0];
//	  include($rutxx."../../incluidos_modulos/enlace.detalles.php");
	  ?>

	  <?
	  $rutax=$pagina."?idx=".$result->fields[0];
	  $formax="";
	  include($rutxx."../../incluidos_modulos/enlace.eliminar.php");
	  ?>
	  </td>

		</tr>

	<?
	$result->MoveNext();
	$contar++;
} // fin while
?>
<tr><td colspan=<? echo $total?> align="center">
<input type=submit name=enviar value="Modificar datos"  class="botones">
</td></tr>
</form>

</table>
