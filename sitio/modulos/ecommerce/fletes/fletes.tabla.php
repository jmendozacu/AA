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
$nombrecampos="Id,Pais,Departamento,Ciudad,Valor,Activo?";
include($rutxx."../../incluidos_modulos/tabla.encabezado.php");
$contar=0;
	while (!$result->EOF && ($contar<$maxregistros)) {
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
		  <input type="text" name="dspais_[]" value="<? echo $result->fields[5]?>" size="30" class="textnegro" maxlength="100">
			</td>
			

	  <td align="center">
		  <input type="text" name="dsdep_[]" value="<? echo $result->fields[2]?>" size="30" class="textnegro" maxlength="100">
			</td>


			  <td align="center">
		  <input type="text" name="dsciudad_[]" value="<? echo $result->fields[1]?>" size="30" class="textnegro" maxlength="100">
			</td>

			
				  <td align="center">
		  <input type="text" name="idvalor_[]" value="<? echo $result->fields[3]?>" size="10" class="textnegro" maxlength="100">
			</td>
	
			
	
		  <td align="center">
			  <select name="idactivo_[]" class="textnegro">
				  <option value="1" <? if ($result->fields[4]==1) echo "selected";?>>SI</option>
				  <option value="2" <? if ($result->fields[4]==2) echo "selected";?>>NO</option>	  
			  </select>
		  </td>

			
		  <td align="center">
	
		  <?
		  $rutax=$pagina."?idx=".$result->fields[0];
		  $formax="";
		  include($rutxx."../../incluidos_modulos/enlace.eliminar.php");?>
		  </td>
		
			</tr>
	
		<?
		$contar++;
		$result->MoveNext();
	} // fin while 
?>
<tr><td colspan=<? echo $total?> align="center">
<input type=submit name=enviar value="Modificar datos"  class="botones">
</td></tr>
</form>

</table>
