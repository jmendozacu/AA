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
// Tabla de uso para el ingreso de datos
include("../../../incluidos_modulos/encabezado.ingreso.php");

?>
<table align="center"  cellspacing="1" cellpadding="1" border="0" width=70% class="campos_ingreso">
<form action="<? echo $pagina;?>" method=post name=u>
<tr valign=top bgcolor="#FFFFFF">
<td>Nombre</td>
<td>
<? $contadorx="dsm_counter";$valorx="255";$formax="u";$campox="dsm";?>
<input type=text name=dsm size=60 maxlength="255" class=text1 onKeyPress="ocultar('capa_dsm')" value="<? echo $dsm?>" <? include("../../../incluidos_modulos/control.evento.php");?>>

<?
$nombre_capa="capa_dsm";
$mensaje_capa="Debe ingresar el nombre";
include("../../../incluidos_modulos/control.capa.php");
include("../../../incluidos_modulos/control.letras.php");
?>
</td>
</tr>

<tr valign=top bgcolor="#FFFFFF">
<td>Posici&oacute;n</td>
<td><input type=text name=idpos size=1 maxlength="8" class=text1 onKeyPress="ocultar('capa_idpos')" value="<? echo $idpos?>">
<?
$nombre_capa="capa_idpos";
$mensaje_capa="Debe digitar la posici&oacute;n";
include("../../../incluidos_modulos/control.capa.php");
?>
</td>
</tr>
<tr valign=top bgcolor="#FFFFFF">
<td>Ciudad</td>
<td>
  <select name=idciudad class=text1>
<?categorias('tblciudades',$idciudad);?>
  </select>

</td>
</tr>
<tr valign=top bgcolor="#FFFFFF">
<td>Activar?</td>
<td>
  <select name=idactivo class=text1>
    <option value="1" <? if ($idactivo==1) echo "selected";?>>DISTRIBUIDORE3</option>
    <option value="2" <? if ($idactivo==2) echo "selected";?>>NO</option>
    <option value="3" <? if ($idactivo==3) echo "selected";?>>TIENDAS</option>
  </select>

</td>
</tr>
<tr bgcolor="#FFFFFF" ><td colspan=2>
<?
$forma="u";
$param="dsm,idpos";
include("../../../incluidos_modulos/botones.ingresar.php");?>

</td></tr>
</form>
</table>
<br>

</td>
</tr>
</table>