<?php
//funcion para averiguar la cantidad de dias del mes
function cantDias($fecha){
		
	$dia = date("t",strtotime($fecha));

	return $dia;
}
//funcion para el primer dia segun dia de la semana
function primerDia($mes,$ano){
	return $dia_semana = date('N',mktime(0,0,0,$mes,1,$ano));//1=lunes, 2, 3, 4, 5, 6 ,7=domingo
}
//funcion para calcular el año bisiesto
function calcularBisiesto($ano)
{
	if(($ano%4==0) && ($ano%100!=0) || ($ano%400==0))return true;	
	else return false;
}
?>