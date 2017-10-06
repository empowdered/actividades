<link rel="stylesheet" href="../../../bootstrap-3.3.4/js/bootstrap.min.js" />
<link rel="stylesheet" href="../../../bootstrap-3.3.4/css/bootstrap.min.css" />
<link rel="stylesheet" href="../../../bootstrap-3.3.4/css/bootstrap-theme.min.css"/>
<style type="text/css">
.boton{
	font-family:Helvetica Neue,Helvetica,Arial,sans-serif;
	font-size:11px;
	background-color:#06C;
	color:#FFF;
	border-style:none;
	border-radius:5px;
}
table{
	margin-top:50px;
	font-family:Helvetica Neue,Helvetica,Arial,sans-serif;
	border-style:dotted;
	border-width:thin;
	}
td{
font-family:Helvetica Neue,Helvetica,Arial,sans-serif;
font-size:11px;
border:none;
}
</style>
<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$fecha ="";
if(isset($_GET["fecha"]) && $_GET["fecha"]!="")$fecha = $_GET["fecha"];
if($fecha=="")$fecha = "2015/05/05";
?>
<form action="evento.php" method="post" id="formulario">
<table width="500" border="0"  align="center">
  <tr>
    <td  colspan="3">PUBLICADOR DE EVENTOS</td>
    <input type="hidden" value="<? echo $fecha;?>" name="fecha" />
    </tr>
  <tr>
    <td>Titulo:</td>
    <td><input type="text" name="titulo" id="titulo" /></td>
    <td rowspan="6">&nbsp;</td>
  </tr>
  <tr>
    <td>Hora inicio:</td>
    <td>
      <select name="horainicio" id="horainicio" onchange="setHora();">
       <?php
	  	for($i=0;$i<24;$i++){
			if($i<10)$i="0".$i;
			echo "<option value='$i'>$i</option>";
		}
	  ?>
      </select>
      :
      <select name="minutoinicio" id="minutoinicio" onchange="setMinuto();">
      <?php
	  	for($i=0;$i<60;$i++){
			if($i<10)$i="0".$i;
			echo "<option value='$i'>$i</option>";
		}
	  ?>
      </select>
      </td>
    </tr>
  <tr>
    <td>Hora final</td>
    <td><select name="horafin" id="horafin" onchange="setHora();">
      <?php
	  	for($i=0;$i<24;$i++){
			if($i<10)$i="0".$i;
			echo "<option value='$i'>$i</option>";
		}
	  ?>
    </select>
      :
  <select name="minutofin" id="minutofin" onchange="setMinuto();">
    <?php
	  	for($i=0;$i<60;$i++){
			if($i<10)$i="0".$i;
			echo "<option value='$i'>$i</option>";
		}
	  ?>
</select></td>
    </tr>
  <tr>
    <td align="center" valign="top">:Detalles:</td>
    <td><textarea name="detalles" id="detalles" cols="45" rows="10"></textarea></td>
    </tr>
  <tr>
    <td><input type="reset" name="opcion" id="button" value="Limpiar" class="boton"/></td>
    <td><input type="submit" name="opcion" id="button2" value="Publicar" class="boton"/></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>
</form>
<?
//aca nosotros tomamos los valores que enviamos por el formulario
include_once("../Conexion.php");
//seteamos los valores
$link = Coneccion();
$titulo = "";
$detalles=""; 
$horainicio="";
$minutoinicio="";
$horafin="";
$minuto="";
$fecha="";
//tomamos los valores por acceso
if(isset($_POST["fecha"]) && $_POST["fecha"]!="")$fecha = $_POST["fecha"];
if(isset($_POST["titulo"]) && $_POST["titulo"]!="")$titulo = $_POST["titulo"];
if(isset($_POST["horainicio"]) && $_POST["horainicio"]!="")$horainicio = $_POST["horainicio"];
if(isset($_POST["minutoinicio"]) && $_POST["minutoinicio"]!="")$minutoinicio = $_POST["minutoinicio"];
if(isset($_POST["horafin"]) && $_POST["horafin"]!="")$horafin = $_POST["horafin"];
if(isset($_POST["minutofin"]) && $_POST["minutofin"]!="")$minutofin = $_POST["minutofin"];
if(isset($_POST["detalles"]) && $_POST["detalles"]!="")$detalles = $_POST["detalles"];

if($titulo!=""&&$detalles!=""&&$horainicio!="" && $horafin!="" && $minutoinicio!="" && $horafin!="" && $minutofin!="" && $fecha!=""){
	
	$horaStart = $horainicio.":".$minutoinicio;
	$horaEnd = $horafin.":".$minutofin;
	
    $crearEvento = "insert into evento(evt_fcreacion,evt_fevento,evt_titulo,evt_horainicio";
	$crearEvento .=",evt_horafin,evt_duracion,evt_idusuario) values(now(),'$fecha'.'$titulo','$horainicio','$horafin','$duracion'";
    if(mysqli_query($link,$crearEvento))
    {
        
    }
    else
    {
        
    }
	
}
?>
