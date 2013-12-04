function read(a)
{
	//acá tenemos q meter lo que queremos hacer
    alert(a);
	cam.stop();
	apagarLector();
}
    
qrcode.callback = read;