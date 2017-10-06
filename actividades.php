<link rel="stylesheet" href="libs/bootstrap-3.3.7/css/bootstrap.min.css" />
<script type="text/javascript" src="funciones.js"></script>
<?php
/***********************************************/
//ZONA DE LOS CONTROLES
date_default_timezone_set("America/Santiago");
$administrador = false;
$visualizador = false;
/**********************************************/

include_once("calcularDia.php");
//seteamos los dias actuales
$anoActual = 0;
$mesActual = 0;
$Bisis = null;
/*
//seteamos los años siguientes y anterior
$anoSiguiente = 0;
$anoAnterior = 0;
//seteamos los meses siguientes y anterior
$mesSiguiente = 0;
$mesAnterior =0;
//variable de bisiesto
*/
$bisiesto = NULL;
//preguntamos la validez de los $GET
if(isset($_GET["ano"]) && $_GET["ano"]!=""){
	$anoActual = $_GET["ano"];
}
if(isset($_GET["mes"]) && $_GET["mes"]!=""){
	$mesActual = $_GET["mes"];
}else{
/*
*/
	$mesActual = date("m");
	$anoActual = date("Y");
}
//tomamos el dia Actual, pero para enviar una consulta
$diaActual = date("d");
//armamos la fecha como un string, concatenando
$fecha =  $anoActual."/".$mesActual."/".$diaActual;
//solicitamos si es bisiesto
$bisiesto = calcularBisiesto($anoActual);
//seteamos los meses por sus nombres
$nbmeses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$nroMeses = array("",1,2,3,4,5,6,7,8,9,10,11,12);
//seteamos los dias para sus nombres
$nbDias = array("Lu","Ma","Mi","Ju","Vi","Sa","Do");
//seteamos el primer dia

$nroDia = 0;
$primerdia = 1;

$ultimoDia = cantDias($fecha);
$diaSemana = primerDia($mesActual,$anoActual);



/*
Global $anoActual,$mesActual,$Bisis,$diaActual,$fecha,$bisiesto,$nbmeses,$nroMeses,$nbDias,$nroDia,$primerdia,$ultimoDia,$diaSemana ;
*/
echo "
<br><br>
<table align='center' width='' border='1' id='tablaCalendario'>";
//buscamos el nombre correcto del mes
echo "<tr>";
echo "<td colspan='3' >
	<a href='devolverFecha.php?anoAnterior=$anoActual&mes=$mesActual'>";
echo "<div class='' style=''>";
echo "<span class='glyphicon glyphicon-arrow-left'aria-hidden='true'></span>";
echo "</div>
	</a>
	</td>
	<td colspan='1' style=''>
	$anoActual
	</td>
	<td colspan='3' style=''>
	<a href='devolverFecha.php?anoSiguiente=$anoActual&mes=$mesActual'>
	<div  class='' style=''>
  	<span class='glyphicon glyphicon-arrow-right' aria-hidden='true' ></span>
	</div>
	</a>
	</td>";
echo "<tr><td colspan='3' style=''><a href='devolverFecha.php?mesAnterior=$mesActual&ano=$anoActual'>&nbsp;
  	<span class='glyphicon glyphicon-circle-arrow-left text-left' aria-hidden='true'></span>&nbsp;
	</td>";

for($mesx=1;$mesx<13;$mesx++){
	if($nroMeses[$mesx] == $mesActual)echo "<td colspan='1' style='font-size:12px;'>".$nbmeses[$mesx]."</td>";
}

echo "<td colspan='3' style=''><a href='devolverFecha.php?mesSiguiente=$mesActual&ano=$anoActual'>&nbsp;
  	<span class='glyphicon glyphicon-circle-arrow-right text-right' aria-hidden='true'></span>&nbsp;
	</a>
	</td>";
echo "</tr><tr>";
for($i=0;$i<7;$i++)echo "<td style=''>&nbsp;$nbDias[$i]&nbsp;</td>";
echo "</tr>"; 
//aca nosotros construimos las semanas 
for($semana=1;$semana<7;$semana++){
	echo "<tr>";
	for($dia=1;$dia<=7;$dia++)
	{	
		if($diaSemana==$dia)
		{	$nroDia++;
			$diaSemana = 0;
			echo "<td style=''>&nbsp;<a href='#' onclick=generar('$nroDia','$mesActual','$anoActual');>$nroDia</a>&nbsp;</td>";
		}
		/*
		javascript:generar('$nroDia','$mesActual','$anoActual');
		javascript:generar();
		*/
		if($nroDia==0)
		{
			echo "<td></td>";	
		}
		if($nroDia>1 && $nroDia<=$ultimoDia)
		{
			echo "<td style=''>";
			echo "<a href='#' onclick=generar('$nroDia','$mesActual','$anoActual')>$nroDia</a>";
			echo "</td>";
			$nroDia++;	
		}
		if($nroDia==1)
		{
			$nroDia++;
		}
}
	
	echo "<tr>";
}
if($bisiesto!=NULL){
    $Bisis = true;
}
?>
<div id="oculto">
</div>
<style type="text/css">
.table{
    width:200px; 
}
td{
    text-align:center;
}
a:hover{
   text-decoration:none; 
}
</style>