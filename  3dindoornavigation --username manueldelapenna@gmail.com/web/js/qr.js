function read(a)
{	
	//var arregloPath = window.location.pathname.split("/");
	//if (arregloPath[arregloPath.length -1] != 'index.php'){
	
	if ($("#camara").hasClass('navegar')){
		apagarLector();
		actualizarPosicionFisica(a);
		chequearNuevaUbicacionFisica(a);
	}else{
		var arregloQr = a.split(",");
		var id_punto_navegacion_origen = arregloQr[0];
		location.href = '/3dindoornavigation/web/index.php/main/buscar?id_punto_navegacion_origen=' + id_punto_navegacion_origen;
	}
}
    
qrcode.callback = read;