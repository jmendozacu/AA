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
// principal
$rutx=1;
if($rutx==1) $rutxx="../";
include($rutxx."../../incluidos_modulos/modulos.globales.php");

$titulomodulo="Listado de contactos corporativos";
$letra=$_REQUEST['letra'];
$tabla="tblcontacto_corporativo";
// insercion
// eliminacion
$idx=$_REQUEST['idx'];
if ($idx<>"") {
	$sql=" delete from $tabla WHERE id='$idx' ";
	if ($db->Execute($sql))  {
		$mensajes="<strong>".$men[3]."</strong>";
		$dstitulo="Eliminacion $titulomodulo";
		$dsdesc=" El usuario ".$_SESSION['i_dslogin']." elimino registro de $titulomodulo";
		$dsruta="../crm/contactenos_corporativo/default.php";
		include($rutxx."../../incluidos_modulos/logs.php");

	}
}
?>
<html>
<?include($rutxx."../../incluidos_modulos/head.php");?>
<body >

	<? include($rutxx."../../incluidos_modulos/navegador.principal.php");
	 include($rutxx."../../incluidos_modulos/core.mensajes.php");
// generacion del encabezado de acuerdo a los resultados encontrados
$sql="select a.id,a.dsnombre,a.dsapellidos";
$sql.=",a.dstelefono,a.dsmovil,a.dsciudad,a.dspais,a.dscorreocliente,a.dscom,a.dsfecha,a.dsdireccion,a.dsempresa,a.dscargo,dsreferido,dshoja";
$sql.=" from $tabla a where id>0 ";
//echo $sql;
if ($letra<>"") $sql.=" and a.".$_REQUEST['campoletra']." like '$letra%'";
if ($_REQUEST['param']<>"") $sql.=" and a.".$_REQUEST['campo']." like '".$_REQUEST['param']."%'";
$sql.=" order by a.id desc  ";
	// modulo buscador
		// 1. por cual campo se lista cuando se usa letra
		$campoletra="dsnombre";
		// 2. los tipo de busqueda
		$paramb="dsnombre,dsapellido,dscorreocliente";
		$paramn="Nombre,Apellido,Email";
		include($rutxx."../../incluidos_modulos/modulos.buscador.php");
	// fin modulo buscador
	$rutaPaginacion="param=".$_REQUEST['param']."&campo=".$_REQUEST['campo']."&letra=".$_REQUEST['letra'];
	include($rutxx."../../incluidos_modulos/paginar.variables.php");
	$rutamodulo="<a href='$rutxx../core/default.php' class='textlink' target='_top' title='Principal'>Principal</a>  /  ";
	$rutamodulo.=" <span class='text1'>".$titulomodulo."</span>";
	$exportar=1; // permite exportar la tabla
	include($rutxx."../../incluidos_modulos/modulos.subencabezado.php");
	$result=$db->PageExecute($sql,$maxregistros,$pagina_actual);
	if (!$result->EOF) {

		include("contacto.tabla.php");
		include($rutxx."../../incluidos_modulos/paginar.php");
		echo "<br>";
	} // fin si
$result->Close();
	include($rutxx."../../incluidos_modulos/navegador.principal.cerrar.php");
		include($rutxx."../../incluidos_modulos/modulos.remate.php");
?>

</body>
</html>