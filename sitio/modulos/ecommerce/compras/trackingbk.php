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
// Proceso generico de tracking
$rutx=1;
include("../../../incluidos_modulos/modulos.globales.php");
$idpedido=$_REQUEST['idpedido'];

$idclientepago=$_REQUEST['idclientepago'];
$id=$_REQUEST['id'];
$idestado=$_REQUEST['idestado'];
$dsestado=$_REQUEST['dsestado'];

if ($idestado=="4"){

    $sqlc=" update tblpagos set ";
    $sqlc.=" idestado=$idestado";
    $sqlc.=" ,dsfecha_b='$fechanotificacion'";
    //
    $sqlc.=" where id=".$_REQUEST['id'];
  // echo $sqlc;
   // exit();
    $db->Execute($sqlc);
}

$titulomodulo="Tracking para pedido $idpedido y el estado <strong>$dsestado</strong> ";
$rr="default.php";
$tabla="tblpagos_tracking";			
include("tracking.mensajes.php");
if ($_REQUEST['idenviaralcliente']=="1") include("tracking.envio.correo.php"); // proceso de envio de correo
// proceso de ingreso de novedades
if ($_REQUEST['paso']=="1") include("tracking.novedades.proceso.php"); // proceso de envio de correo


$idx=$_REQUEST['idx'];
  if ($idx<>"") { 
    $sql=" delete from tblpagos_novedades WHERE id='$idx' ";
    if ($db->Execute($sql))  { 
      $mensajes="<strong>".$men[3]."</strong>";
      $dstitulo="Eliminacion $titulomodulo2";
      $dsdesc=" El usuario ".$_SESSION['i_dslogin']." elimino un registro";
      include($rutxx."../../incluidos_modulos/logs.php");
    } 
  }



//$db->debug=true;

$sql="select idpedido,dsfechalarga,dscausa_b,dsfecha_b,dstitulo_b";
$sql.=",dsaprobo,dsorigen,dsdestino";
$sql.=",dsdiasorigen,dsdiasdestino";

$sql.=" from $tabla  where ";//and idestado<>0";
$sql.=" idpedido=".$idpedido." and idclientepago=".$idclientepago." and idestado=".$idestado;

  $result=$db->Execute($sql);
  if(!$result->EOF){

  $idpedido=reemplazar($result->fields[0]);
  $dsfechalarga=reemplazar($result->fields[1]);
  $dscausa_b=($result->fields[2]);
  $dscausa_b=preg_replace("/<br>/","\n",$dscausa_b);

  $dsfecha_b=($result->fields[3]); //
  $dstitulo_b=($result->fields[4]); //
  $dsaprobo=($result->fields[5]); //
  $dsorigen=($result->fields[6]); //
  $dsdestino=($result->fields[7]); //

  $dsdiasorigen=($result->fields[8]); //
  $dsdiasdestino=($result->fields[9]); //

  
  
   
}
$result->Close();       

  if ($dscausa_b=="") $dscausa_b=$txtbase;
  if ($dsfecha_b=="") $dsfecha_b=date("Y/m/d");
  if ($dstitulo_b=="") $dstitulo_b=$titulo;
 // traer la bodega origen
$sql="select ";
$sql.="dsorigen";
$sql.=" from $tabla  where ";//and idestado<>0";
$sql.=" idpedido=".$idpedido." and idclientepago=".$idclientepago." and dsorigen<>'' order by id desc limit 0,1";  $result=$db->Execute($sql);
  $result=$db->Execute($sql);

  if(!$result->EOF){
  $dsorigenx=($result->fields[0]); //
  }
$result->Close();       
if ($dsorigen=="") $dsorigen=$dsorigenx;
 // traer la bodega destino 
$sql="select ";
$sql.="dsdestino";
$sql.=" from $tabla  where ";//and idestado<>0";
$sql.=" idpedido=".$idpedido." and idclientepago=".$idclientepago." and dsdestino<>'' order by id desc limit 0,1";  $result=$db->Execute($sql);
  $result=$db->Execute($sql);

  if(!$result->EOF){
  $dsdestinox=($result->fields[0]); //
  }
$result->Close();       
if ($dsdestino=="") $dsdestino=$dsdestinox;

?>
<html>
<?include($rutxx."../../incluidos_modulos/head.php");?>
<body >
<? include($rutxx."../../incluidos_modulos/navegador.principal.php");
// generacion del encabezado de acuerdo a los resultados encontrados

$rutamodulo="<a href='../../core/default.php' class='textlink' title='Principal'>Principal</a>  /  ";
$rutamodulo.="  <a href='default.php' class='textlink'>$titulomodulo</a>  /  <span class='text1'>Editar</span>";
include($rutxx."../../incluidos_modulos/modulos.subencabezado.php");
?>

<table width="100%" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td align="center" valign="top" class="fondo"><br />
<?
// novedades
$novedades=0;
$sql="select count(*) as total from tblpagos_novedades where idpedido=$idpedido";
$sql.=" and idclientepago=$idclientepago and idestado=$idestado ";
$sql.=" order by id desc ";
$result= $db->Execute($sql);
if (!$result->EOF) {
    $novedades=$result->fields[0];
    if ($novedades=="") $novedades=0;
}
if ($novedades>0) $novedades="( ".$novedades." )";
$result->Close();   

?>
  <input type=button name=enviar value="NOTIFICAR AL CLIENTE"  class="botones" onClick="document.getElementById('tabla_envio_correo').style.display='';document.getElementById('tabla_envio_novedades').style.display='none';">
  <input type=button name=enviar value="NOVEDADES ESTADO <? echo $novedades;?>"  class="botones" onClick="document.getElementById('tabla_envio_correo').style.display='none';document.getElementById('tabla_envio_novedades').style.display='';">
  <input type=button name=enviar value="DETALLE DEL PEDIDO"  class="botones" onClick="irAPaginaDN('../../../proceso.pago.impresion.php?mostrarenlace=1&dscampo1=$dscampo1&idpedido=<? echo $idpedido; ?>&idclientepago=<? echo $idclientepago?>');">

  <input type=button name=enviar value="HISTORICOS"  class="botones" onClick="irAPaginaD('tracking.historicos.php?idpedido=<? echo $idpedido?>&idclientepago=<? echo $idclientepago?>&id=<? echo $id;?>&idestado=<? echo $idestado;?>&dsestado=<? echo $dsestado;?>')">
  <input type=button name=enviar value="GARANTIAS / DEVOLUCIONES"  class="botones" onClick="irAPaginaD('tracking.gdev.php?idpedido=<? echo $idpedido?>&idclientepago=<? echo $idclientepago?>&id=<? echo $id;?>&idestado=<? echo $idestado;?>&dsestado=<? echo $dsestado;?>')">

    </td>
   </tr> 
</table>

<div id="tabla_envio_correo" style="display:none" ><? include("tracking.tabla.envio.php");?></div>
<div id="tabla_envio_novedades" style="display:none" ><? include("tracking.novedades.php");?></div>


<br>
<?
// datos del cliente
//$db->debug=true;
$sql="select a.id,a.dscodigousa,a.dscodigouk,a.dsnombres,a.dsapellidos";
$sql.=",a.dstelefono,a.dstelefono2,a.dsdireccion,a.dsmovil,a.dsciudad,a.dsdepartamento,a.dspais,a.dscorreocliente";
$sql.=",dstipoidentificacion,a.dsidentificacion,a.dsfechanacimiento,a.dsfecha,a.dsclave ";
$sql.=" from tblclientes a where id=$idclientepago ";

$resultx=$db->Execute($sql);
if(!$resultx->EOF){
$dscodigousa=reemplazar($resultx->fields[1]);
$dscodigouk=reemplazar($resultx->fields[2]);


$dsnombres=reemplazar($resultx->fields[3]);
$dsapellidos=reemplazar($resultx->fields[4]);
$dstelefono=reemplazar($resultx->fields[5]);
$dstelefono2=reemplazar($resultx->fields[6]);
$dsdireccion=reemplazar($resultx->fields[7]);
$dsmovil=reemplazar($resultx->fields[8]);

$dsciudad=reemplazar($resultx->fields[9]);
$dsdepartamento=reemplazar($resultx->fields[10]);

$dspais=reemplazar($resultx->fields[11]);

$dscorreocliente=reemplazar($resultx->fields[12]);
$dsidentificacion=reemplazar($resultx->fields[13]);
?>

<table width="100%" cellpadding="0" cellspacing="0" align="center"  class="cont_general">
  <tr>
    <td align="center" valign="top" style=" padding: 30px 0 0 0;">


<table width="70%" border="0" cellpadding="0" cellspacing="0" class="texto_centro" >
        <tr>
          <td width="615" align="left" valign="middle">
            <img src="../../../img_modulos/modulos/edicion.png">
            <h1>Datos del Cliente</h1>
          </td>
        </tr>
</table>
<table align="center"  cellspacing="1" cellpadding="5" border="0" width=70% class="campos_ingreso">
<tr valign=top bgcolor="#FFFFFF">
<td>Codigo USA:</td>
<td><? echo $dscodigousa?></td>
</tr>
<tr valign=top bgcolor="#FFFFFF">
<td>Codigo UK:</td>
<td><? echo $dscodigouk?></td>
</tr>

<tr valign=top bgcolor="#FFFFFF">
<td>Identificacion:</td>
<td><? echo $dsidentificacion?></td>
</tr>
<tr valign=top bgcolor="#FFFFFF">
<td>Nombres:</td>
<td><? echo $dsnombres?></td>
</tr>

<tr valign=top bgcolor="#FFFFFF">
<td>Apellidos:</td>
<td><? echo $dsapellidos?></td>
</tr>

<tr valign=top bgcolor="#FFFFFF">
<td>Telefono 1:</td>
<td><? echo $dstelefono?></td>
</tr>

<tr valign=top bgcolor="#FFFFFF">
<td>Telefono 2:</td>
<td><? echo $dstelefono2?></td>
</tr>

<tr valign=top bgcolor="#FFFFFF">
<td>Email:</td>
<td><? echo $dscorreocliente?></td>
</tr>


<tr valign=top bgcolor="#FFFFFF">
<td>Celular:</td>
<td><? echo $dsmovil?></td>
</tr>

<tr valign=top bgcolor="#FFFFFF">
<td>Direccion:</td>
<td><? echo $dsdireccion?></td>
</tr>

<tr valign=top bgcolor="#FFFFFF">
<td>Pais:</td>
<td><? echo $dspais?></td>
</tr>


<tr valign=top bgcolor="#FFFFFF">
<td>Departamento:</td>
<td><? echo $dsdepartamento?></td>
</tr>

<tr valign=top bgcolor="#FFFFFF">
<td>ciudad:</td>
<td><? echo $dsciudad?></td>
</tr>

<tr valign=top bgcolor="#FFFFFF">
<td colspan=2 align=center>
<A HREF="javascript:irAPaginaDN('../../crm/clientesregistrados/default.php?enca=1&idclientepago=<? echo $idclientepago;?>',100,100)">Editar este cliente</A>
<br>
<strong>
  (DESPUES DE EDITAR, CIERRE LA VENTANA EMERGENTE Y PRESIONE F5 O ACTUALIZAR EN ESTA PANTALLA)
</strong>
</td>
</tr>









</table>
<br>

</td>
</tr>
</table>
<br>
<?
}
$resultx->Close();


?>

<br>
<?  include("../../../incluidos_modulos/navegador.principal.cerrar.php"); 
include($rutxx."../../incluidos_modulos/modulos.remate.php");?>

</body>
</html>