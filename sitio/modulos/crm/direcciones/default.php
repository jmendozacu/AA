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

$titulomodulo="Configuraci&oacute;n de Direcciones";
$dsm=$_REQUEST['dsm'];
$idpos=$_REQUEST['idpos'];
$idactivo=$_REQUEST['idactivo'];

$letra=$_REQUEST['letra'];
$dsabreviatura=$_REQUEST['dsabreviatura'];
$tabla="tbldirecciones";
$orderby=$_REQUEST['orderby'];
$carpeta="cercanos";

// insercion
if ($dsm<>"") {
		$sql="select id ";
	 	$sql.=" from $tabla WHERE dsm='$dsm' ";
		 $result = $db->Execute($sql);
		 if (!$result->EOF) {
		 	// no insertar
			$mensajes=$men[0];
			$error=1;

		 } else {
		 	// insertar
			$sql="insert into $tabla (dsm,dsabreviatura,idactivo)";
			$sql.=" values ('$dsm','$dsabreviatura',$idactivo) ";
			if ($db->Execute($sql))  {
				$mensajes="<strong>".$men[1]."</strong>";
				// cargar auditoria
				$dstitulo="Insercion $titulomodulo";
				$dsdesc=" El usuario ".$_SESSION['i_dslogin']." Ingreso un nuevo registro";
				$dsruta="../crm/cercanos/default.php";
				include($rutxx."../../incluidos_modulos/logs.php");


			$sqld="select id,dsm from $tabla where dsm='".$dsm."'";
			$resultd = $db->Execute($sqld);
			if (!$resultd->EOF) {
			$idr=$resultd->fields[0];
			$dsmr=$resultd->fields[1];
			}

			$dsarchivo=limpieza(strtolower($dsmr))."";
			$cuerpo='Cercanos';
			$ruta=$cuerpo."/".$dsarchivo;
			$idreg=$idr;
			$rutax=1;
//			$include="include('".$rutacomunes."/noticias_detalle.php')";
//			include($rutxx."../../incluidos_modulos/modulos.constructor.php") ;
			$sqlu="update $tabla set dsruta='".$dsarchivo."' where id=$idreg";
			$resultu = $db->Execute($sqlu);
				$error=0;

			} else {
				$mensajes=$men[2].".<br><br>$sql<br>Error:".mysql_error();
				$error=1;

			}
		 }
		 $result->close();
}
// eliminacion
include($rutxx."../../incluidos_modulos/modulos.papelera.php");
// modificacion rapida
		$contarx=count($_REQUEST['id_']);
		$h=0;
			for ($j=0;$j<$contarx;$j++){
				if ($_REQUEST['id_'][$j]<>""){
					$sql=" update $tabla set ";
					$sql.= "idactivo=".$_REQUEST['idactivo_'][$j];
					$sql.= ",dsm='".$_REQUEST['dsm_'][$j]."'";
					$sql.= ",dsabreviatura='".$_REQUEST['dsabreviatura_'][$j]."'";
					$sql.= " where id=".$_REQUEST['id_'][$j];
					$db->Execute($sql);
					//echo $sql;
					$h++;

				} // fin si
			} // fin for
		if ($h>0) $mensajes=$men[4];

?>
<html>
		<?include($rutxx."../../incluidos_modulos/head.php");?>
<body>

	<? include($rutxx."../../incluidos_modulos/navegador.principal.php");
	 include($rutxx."../../incluidos_modulos/core.mensajes.php");

// generacion del encabezado de acuerdo a los resultados encontrados
$sql="select a.id,a.dsm,a.dsabreviatura,a.dsimg,a.dsruta,a.idactivo from $tabla a where id>0 and idactivo<>9";
if ($letra<>"") $sql.=" and a.".$_REQUEST['campoletra']." like '$letra%'";
if ($_REQUEST['param']<>"") $sql.=" and a.".$_REQUEST['campo']." like '".$_REQUEST['param']."%'";

	$sql.=" order by a.dsm desc ";

//echo $sql;
	// modulo buscador
		// 1. por cual campo se lista cuando se usa letra
		$campoletra="dsm";
		// 2. los tipo de busqueda
		$paramb="dsm";
		$paramn="Nombre";
		include($rutxx."../../incluidos_modulos/modulos.buscador.php");
	// fin modulo buscador
	$rutaPaginacion="param=".$_REQUEST['param']."&campo=".$_REQUEST['campo']."&letra=".$_REQUEST['letra'];
	$rutaPaginacion.="&idcliente=$idcliente&dscliente=$dscliente&idprograma=$idprograma&dsprograma=$dsprograma";
	include($rutxx."../../incluidos_modulos/paginar.variables.php");
	$rutamodulo="<a href='$rutxx../core/default.php' class='textlink' target='_top' title='Principal'>Principal</a>  /  ";
		$rutamodulo.=" <span class='text1'>".$titulomodulo."</span>";
		$papelera=1;
		$dsrutaPapelera="papelera.php";//ruta de la papelera


		include($rutxx."../../incluidos_modulos/modulos.subencabezado.php");
$result=$db->PageExecute($sql,$maxregistros,$pagina_actual);
	if (!$result->EOF) {

		include("direcciones.tabla.php");
		include($rutxx."../../incluidos_modulos/paginar.php");
	} // fin si
$result->Close();
	include("direcciones.ingreso.php");

	include($rutxx."../../incluidos_modulos/navegador.principal.cerrar.php");
	include($rutxx."../../incluidos_modulos/modulos.remate.php");
?>

</body>
</html>