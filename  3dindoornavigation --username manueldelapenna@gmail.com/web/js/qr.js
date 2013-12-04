function read(a)
{
	//acá tenemos q meter lo que queremos hacer
    alert(a);
	cam.stop();
	$('#link_encender_lector').removeClass('ui-disabled');
	$('#link_apagar_lector').addClass('ui-disabled');
}
    
qrcode.callback = read;