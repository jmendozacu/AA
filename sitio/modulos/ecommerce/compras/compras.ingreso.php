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
?>
<br>


<table width="100%" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td align="center" valign="top" class="fondo"><br />


<table width="70%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="6" align="left" valign="top"><img src="../../img_modulos/modulos/titulo_r1_c1.jpg" width="6" height="22" /></td>
          <td width="615" align="left" valign="middle" background="../../img_modulos/modulos/franja_grisoscuro_r1_c2.jpg" class="titulo_negro">Ingreso de nuevo registro</td>
        </tr></table> <table align="center"  cellspacing="1" cellpadding="1" border="0" width=70% class="texto_parrafo2" bgcolor="#CCCCCC">
<form action="<? echo $pagina;?>" method=post name=u>
<tr valign=top bgcolor="#FFFFFF">
<td>Nombre</td>
<td>
<? $contadorx="dsm_counter";$valorx="255";$formax="u";$campox="dsm";?>
<input type=text name=dsm size=60 maxlength="255" class=text1 onKeyPress="ocultar('capa_dsm')" value="<? echo $dsm?>" <? include("../../incluidos_modulos/control.evento.php");?>>

<?
$nombre_capa="capa_dsm";
$mensaje_capa="Debe ingresar el titulo ";
include("../../incluidos_modulos/control.capa.php");
include("../../incluidos_modulos/control.letras.php");
?>
</td>
</tr>


<tr valign=top bgcolor="#FFFFFF">
<td>Posici&oacute;n</td>
<td><input type=text name=idpos size=1 maxlength="8" class=text1 onKeyPress="ocultar('capa_idpos')" value="<? echo $idpos?>">
<?
$nombre_capa="capa_idpos";
$mensaje_capa="Debe digitar la posici&oacute;n";
include("../../incluidos_modulos/control.capa.php");
?>
</td>
</tr>

<tr valign=top bgcolor="#FFFFFF">
<td>Activar?</td>
<td>
	<select name=idactivo class=text1>
		  <option value="1" <? if ($idactivo==1) echo "selected";?>>SI</option>
		  <option value="2" <? if ($idactivo==2) echo "selected";?>>NO</option>
	</select>
</td>
</tr>
<tr bgcolor="#FFFFFF" ><td colspan=2>
<?
$forma="u";
$param="dsm,idpos";	
include("../../incluidos_modulos/botones.ingresar.php");?>

</td></tr>
</form>
</table>
<br>

</td>
</tr>
</table>