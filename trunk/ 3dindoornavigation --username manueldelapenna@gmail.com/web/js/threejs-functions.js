function dibujarPared(distancia,puntoMedioX,puntoMedioY,anguloRotacion,orientacion,link) {
    
    var border = 0;
    var elevation = 150;
        
    // se crea la pared
    var materialArray = [];
    materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('') }));
    materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('') }));
    materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('') }));
    materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('') }));
    
    if (orientacion == 'Norte/Oeste'){
        materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('') }));
        materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/imagenes-navegador/'+link) }));
    }else{
        materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/imagenes-navegador/'+link) }));
        materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('') }));
    } 
    var MovingCubeMat = new THREE.MeshFaceMaterial(materialArray);
    var MovingCubeGeom = new THREE.CubeGeometry(distancia, elevation, border, 1, 1, 1, materialArray );

    pared = new THREE.Mesh( MovingCubeGeom, MovingCubeMat );
    pared.position.set(puntoMedioX, 75, puntoMedioY);
    pared.rotation.y = anguloRotacion;
    scene.add( pared );
}

function irAPunto(destinoX,destinoY,destinoZ,cam) {
    
    //calcula pendiente y angulo de rotacion
    var pendiente = (cam.position.x - destinoX) / (cam.position.z - destinoZ);
    var angulo_rotacion = Math.atan(pendiente);

    angulo_rotacion = normalizarAnguloRotacion(cam,destinoZ,angulo_rotacion);
    
    var tiempo = tiempoRotacion(cam,angulo_rotacion);
    
    //rotacion
    var animacionRotacion = new TWEEN.Tween(cam.rotation).to({
         x: 0,
         y: angulo_rotacion,
         z: 0,},tiempo);
     animacionRotacion.easing(TWEEN.Easing.Linear.None).onUpdate(function () {
         //mientras rota no hace nada
     });
     animacionRotacion.onComplete(function () {
         //termina de rotar y avanza
         
         
        tiempo = tiempoAvanceRetroceso(cam,destinoX,destinoZ);
        var animacionAvance = new TWEEN.Tween(cam.position).to({
              x: destinoX,
              y: destinoY,
              z: destinoZ
         },tiempo);
        animacionAvance.easing(TWEEN.Easing.Linear.None).onUpdate(function () {
           //mientras avanza no hace nada
         });
        animacionAvance.onComplete(function () {
           //termina de avanzar y habilita la botonera
           habilitarBotonera();
        });
        //comienza a avanzar
        animacionAvance.start(); 
        
        
        
     });
     //comienza a rotar
     animacionRotacion.start();            
}

function getPuntoSiguiente() 
{
    deshabilitarBotonera();
    posActualLogica--;
    irAPunto(puntosNavegacion[posActualLogica].x,alturaCamara,-puntosNavegacion[posActualLogica].y,camara);
    borrarTodosLosPuntos(stage, layer);
    dibujarTodosLosPuntos(stage,layer);   
}

function getPuntoAnterior() 
{
    deshabilitarBotonera();
    posActualLogica++;
    irAPunto(puntosNavegacion[posActualLogica].x,alturaCamara,-puntosNavegacion[posActualLogica].y,camara);
    borrarTodosLosPuntos(stage, layer);
    dibujarTodosLosPuntos(stage,layer);
 }

function rotar360(angulo_rotacion,cam){
     //calcula pendiente y angulo de rotacion
    deshabilitarBotonera();
    //rotacion
    var animacionRotacion = new TWEEN.Tween(cam.rotation).to({
         x: 0,
         y: cam.rotation.y + angulo_rotacion,
         z: 0,},5000);
     animacionRotacion.easing(TWEEN.Easing.Linear.None).onUpdate(function () {
         //mientras rota no hace nada
     });
     animacionRotacion.onComplete(function () {
         //termina de rotar y normaliza el angulo
         cam.rotation.y -= angulo_rotacion;
         habilitarBotonera();
    
    });
        
    //comienza a rotar
    animacionRotacion.start();            
} 

function deshabilitarBotonRetroceder(){
    $('#link_retroceder').addClass('ui-disabled');      
}
  
function deshabilitarBotonAvanzar(){
    $('#link_avanzar').addClass('ui-disabled');      
      
}

function deshabilitarBotones360(){
    $('#link_360_derecha').addClass('ui-disabled');      
    $('#link_360_izquierda').addClass('ui-disabled');      
}

function habilitarBotones360(){
    $('#link_360_derecha').removeClass('ui-disabled');      
    $('#link_360_izquierda').removeClass('ui-disabled');      
      
}

function habilitarBotonRetroceder(){
    $('#link_retroceder').removeClass('ui-disabled');      
}
  
function habilitarBotonAvanzar(){
    $('#link_avanzar').removeClass('ui-disabled');      
}

function deshabilitarBotonPosActual(){
    $('#link_pos_actual').addClass('ui-disabled');      
}

function habilitarBotonPosActual(){
    $('#link_pos_actual').removeClass('ui-disabled');      
      
}

function chequearBotonera(){
    habilitarBotonAvanzar();
    habilitarBotonRetroceder();
    if (posActualLogica == 0){
        deshabilitarBotonAvanzar();
    }else{
        if (posActualLogica == cantPuntos){
            deshabilitarBotonRetroceder();
        }
    }
       
}

function deshabilitarBotonera(){
    deshabilitarBotonAvanzar();
    deshabilitarBotonRetroceder();
    deshabilitarBotones360();
    deshabilitarBotonPosActual();
}
function habilitarBotonera(){
    chequearBotonera();
    habilitarBotones360();
    habilitarBotonPosActual();
}


function cerrarDialogo(){
    $("#popupDialog").popup("close");
}

function normalizarAnguloRotacion(cam,destinoZ,angulo_rotacion){
    
    //calcula el giro mas corto
    if (destinoZ>cam.position.z){
        //el punto de destino de z es mayor al actual, da media vuelta mas
        angulo_rotacion += Math.PI;
        if (Math.abs(cam.rotation.y - angulo_rotacion)>Math.PI){
            angulo_rotacion = angulo_rotacion - 2*Math.PI;
        }
    }
    
    if (destinoZ<=cam.position.z){
        if (Math.abs(cam.rotation.y - angulo_rotacion)>Math.PI){
            angulo_rotacion = angulo_rotacion + 2*Math.PI;
        }
    }
    
    return angulo_rotacion;
}

function tiempoRotacion(cam,angulo_rotacion){

     return Math.abs(cam.rotation.y - angulo_rotacion)*1000;
}

function tiempoAvanceRetroceso(cam,destinoX,destinoZ){
    //distancia = raiz[(y2 - y1)^2 + (x2 - x1)^2]
    
     return Math.sqrt(Math.pow(cam.position.x - destinoX,2) + Math.pow(cam.position.z - destinoZ,2))*3;
     
}

function encenderLector(){
    cam.start();
    $('#link_encender_lector').addClass('ui-disabled');
    $('#link_apagar_lector').removeClass('ui-disabled');
}

function apagarLector(){
    cam.stop();
    $('#link_apagar_lector').addClass('ui-disabled');
    $('#link_encender_lector').removeClass('ui-disabled');
}

function actualizarPosicionFisica(codigoQR){
    
    var arregloQR = codigoQR.split(",");
    puntoNavegacionFisica.id = arregloQR[0];
    puntoNavegacionFisica.x = arregloQR[1];
    puntoNavegacionFisica.y = arregloQR[2];
    borrarTodosLosPuntos(stage, layer);
    dibujarTodosLosPuntos(stage, layer);
}

function chequearNuevaUbicacionFisica(codigoQr){
    
    //chequea si el punto leido está en el camino    
    var arregloQr = codigoQr.split(",");
    var estaEnElCamino = false;
    var esElUltimo = false;
    for (var i=0;i<puntosNavegacion.length;i++){
        if (puntosNavegacion[i].id == arregloQr[0]){
            estaEnElCamino = true;
            if (i == 0){
                esElUltimo = true;
            }
        }
    }
    
    //el punto leído está en el camino
    if (estaEnElCamino){
        deshabilitarBotonRecalcular();
        if (esElUltimo){
          $("#popupDialog").popup("open",100,300);
        }
    //el punto leído no esta en el camino    
    }else{
        habilitarBotonRecalcular();
    }
}

function habilitarBotonRecalcular(){
    $('#link_recalcular_camino').removeClass('ui-disabled');      
}
  
function deshabilitarBotonRecalcular(){
    $('#link_recalcular_camino').addClass('ui-disabled');      
}

function recalcularCamino(){
    
    if (_BASEPATH.split(':').length>0){
        location.href = _BASEPATH +'/index.php/main/buscar?id_punto_navegacion_origen=' + puntoNavegacionFisica.id;
    }else{
        location.href = '/3dindoornavigation/web/index.php/main/buscar?id_punto_navegacion_origen=' + puntoNavegacionFisica.id;
    }
}