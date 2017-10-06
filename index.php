<a href="" onclick="javascript:ventana('actividades.php',400,400);">ventana</a>
 window.resizeTo(1000,600)
<style type="text/css">
a{text-decoration:none;}
</style>
<script type="text/javascript">
function ventana(locacion,ancho,alto)
{
var posicion_x; 
var posicion_y; 
var posicion_x = (screen.width / 2)-(ancho/2); 
var posicion_y = (screen.height / 2)-(alto/2); 
window.open(locacion,"ventana sistema", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
}
</script>