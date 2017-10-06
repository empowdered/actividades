<?php //session_start();
//if(isset($_SESSION["logueado"]) && $_SESSION["logueado"]!="" && base64_decode($_SESSION["logueado"]) == "Ok"){
	
error_reporting(1);

if($_GET["anoSiguiente"]!="" && (isset($_GET["anoSiguiente"])) && $_GET["mes"]!=""){//aca cortamos los años con "/"
	
	$fecha = split("/", sumarAno($_GET["anoSiguiente"],$_GET["mes"]));
	header("Location: actividades.php?ano=$fecha[0]&mes=$fecha[1]");
	
}
else if($_GET["anoAnterior"]!="" || (isset($_GET["anoAnterior"]))&& $_GET["mes"]!=""){
	
	$fecha = split("/", restarAno($_GET["anoAnterior"],$_GET["mes"]));
	header("Location: actividades.php?ano=$fecha[0]&mes=$fecha[1]");
	//echo $fecha[0]."<br>".$fecha[1];
}
else if($_GET["mesSiguiente"]!="" || (isset($_GET["mesSiguiente"])) && $_GET["ano"]!=""){ //aca cortamos los meses siguientes con "-"
	
	$fecha = split("-", sumarMes($_GET["mesSiguiente"],$_GET["ano"]));
	header("Location: actividades.php?ano=$fecha[1]&mes=$fecha[0]");

}
else if($_GET["mesAnterior"]!="" || (isset($_GET["mesAnterior"]))&&  $_GET["ano"]!=""){
	
	$fecha = split("-", restarMes($_GET["mesAnterior"],$_GET["ano"]));
	header("Location: actividades.php?ano=$fecha[1]&mes=$fecha[0]");
	
}
//funcion para agregar un año mas al sistema
function sumarAno($ano,$mes)
{
	$ano = $ano + 1;
	return $ano."/".$mes;
}
//funcion para restar un año mas al sistema
function restarAno($ano,$mes)
{
	$ano = $ano - 1 ;
	return $ano."/".$mes;
}
//cuando se trabaja con meses, se debe determinar, si ha pasado de diciembre a enero del año siguiente
function sumarMes($mes,$ano)//siempre, debemos sumar un mes al sistema, pedir el año, cargar al subsiguiente y devolver concatenado
{
	$mes = $mes + 1;
	if($mes>12)
	{
		$mes = 1;
		$ano = $ano + 1;	
	}
	return $fecha = $mes."-".$ano;
}
//cuando se trabaja con meses, se debe determinar si ha pasado de enero a diciembre, del año subsiguiente
function restarMes($mes,$ano) //siempre, debemos restar un mes al sistema, pedir el año y devolver concatenado
{
	$mes = $mes - 1;
	if($mes<1)
	{
		$mes = 12;	
		$ano = $ano - 1;
	}
	return $fecha = $mes."-".$ano; //concatenamos el año
}
/*
}aca debemos conservar a futuro aun no debe retirarse la llave
*/
?>