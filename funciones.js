var grDia="", grMes = "",grAno="";
function generar(dia,mes,ano)
{
    grDia= dia;
    grMes = mes;
    grAno= ano;
    var menu = "<table align='center' id='tabla'>"
    menu += "<tr><td><input type='radio' name='opcion' value='cronograma' onclick=preguntar('cronogramar')></td><td>Crear nuevo evento</td></tr>";
    menu += "<tr><td><input type='radio' name='opcion' value='revisa' onclick=preguntar('revisar')></td><td>Actualizar Eventos</td></tr>";
    menu += "</table>"
    document.getElementById("oculto").innerHTML = menu;
  
}
function preguntar(opcion)
{
    var porNombre = document.getElementsByName("opcion");
    var resultado = "";
    for(var i=0;i<porNombre.length;i++)
        {
            if(porNombre[i].checked)
                resultado=porNombre[i].value;
        }
        
    if(confirm("¿Desea cargar esta opcion?"))
    {
        if(resultado=="cronograma")
        {
           confirmar(resultado);
        }
        if(resultado =="revisa")
        {
           confirmar(resultado);
        }
    }
}
function confirmar(opcion)
{
    var dir1 = "evento.php?fecha="+grDia+"/"+grMes+"/"+grAno;
    var dir2 = "editarEventos.php?fecha="+grDia+"/"+grMes+"/"+grAno
	
    alert(dir1);
    alert(dir2);
    if(opcion=="cronograma")
    {
       document.getElementById("oculto").innerHTML = iframex(dir1);
    }
    if(opcion=="revisa")
    {
       document.getElementById("oculto").innerHTML = iframex(dir2);
    }
}
function iframex(direccion)
{
    
    var sandbox = "allow-same-origin allow-scripts allow-popups allow-forms";
    
    var stylex = "border: 0; width:800px; height:450px; scrolling:auto; border:none;";
    
    var frame = "<iframe src='" + direccion + "' align='center' sandbox='" + sandbox +"' style='" + stylex +"'>";
         frame +="</iframe>";
    return frame;

}
