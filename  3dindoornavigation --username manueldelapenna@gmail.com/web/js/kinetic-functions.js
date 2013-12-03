//Función que dibuja los poligonos de la facultad (Estructuras) y agrega un link a aquellos que son navegables.
function dibujarPoligono(stage, tipoEstructura, idEstructura, idDestino, pointsToDraw){
  var poly = new Kinetic.Polygon( { points: pointsToDraw, fill: '#75D6B5', stroke: "black", strokeWidth: 2 });
  
  if (tipoEstructura == 1){
    poly.on("touchstart click", function() {
      window.location = _BASEPATH + "/" + 
                        _ENVIROMENT + "/main/detalleEstructura?idEstructura="+idEstructura+"&idDestino="+idDestino;
    });
    
    poly.on("touchstart click", function() {
      var complexText = layer.get("#myText")[0];        
      layer.remove(complexText);    
    })
    
    poly.setFill('#75D6B5');
  }
  else if (tipoEstructura == 2){
    poly.setFill('#FFCC99');
  }
  else{
    poly.setFill('#BCA0A0');    
  }
  
  //add the poly to the layer
  layer.add(poly);
  // add the layer to the stage
  stage.add(layer);  
}  
     
//Función que dibuja los puntos de navegación.
//Dibuja circulos si primero es falso y una imagen si es verdadero.
function dibujarPuntoNavegacion(stage,layer,x,y,id, primero){ 
  // Si primero, se carga una imagen en vez de dibujar un punto
  if(primero){    
    var imageObj = new Image();
    imageObj.onload = function() {
      var imageUser = new Kinetic.Image({ 
        x: x-8, y: 
        y-8, image: imageObj, 
        width: 16, 
        height: 16 });
        layer.add(imageUser);
        stage.add(layer);
    }    
    
    imageObj.src = _BASEPATH + "/images/eye.png";
   }//Si no es el punto inicial dibujamos un punto de navegacion simple
   else{
     var circle = new Kinetic.Circle({ 
       x: x, 
       y: y, 
       radius: 2, 
       fill: "#1C777B", 
       stroke: "black", 
       strokeWidth: 4 });              
     
     layer.add(circle);
     stage.add(layer); 
   }    
}

//Función que dibuja lineas entre los puntos de navegación.
function dibujarLinea(stage, layer, pointsToDraw){
  var lineaCamino = new Kinetic.Line({
          points: pointsToDraw,
          stroke: "green",
          strokeWidth: 2,
          lineJoin: "round",
          dashArray: [5, 2]
        });
  layer.add(lineaCamino);
  stage.add(layer);
}

//Función que dibuja un texto (text) en las posiciones x,y que son pasadas por parámetro.
function textoDelAula(stage, layer, text,x,y){  
  var complexText = new Kinetic.Text({
    x: x,
    y: y,
    stroke: '#555',
    strokeWidth: 5,
    fill: '#ddd',
    text: text,
    fontSize: 11,
    fontFamily: 'Calibri',
    fontStyle: 'normal',
    textFill: '#555',
    width: 200,
    padding: 20,
    align: 'center',
    fontStyle: 'normal',
    shadow: {
      color: 'black',
      blur: 1,
      offset: [10, 10],
      alpha: 0.2
    },
    cornerRadius: 10,
    id: "myText"
  });
  
  layer.add(complexText);
  stage.add(layer);  
}



