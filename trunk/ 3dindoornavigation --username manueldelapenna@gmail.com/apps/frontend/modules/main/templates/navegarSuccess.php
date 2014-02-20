<?php use_helper("JavascriptBase");?>


    <div id="ThreeJS" style="position: relative; left:0; border-style: solid; left:0px; top:0px; height: 500px; width: window.innerWidth"> 
        <?php include_partial('global/barra_navegacion');?>     
        <div id="camara" class="navegar" style="position:absolute; left: 10px; bottom:70px">
            <video  id="camsource" autoplay width="320" height="240">Put your fallback message here.</video>
            <canvas id="qr-canvas" width="320" height="240" style="display:none"></canvas>
        </div>
        <?php include_partial('global/barra_qr');?>     
        <div id="container" style="position:absolute; right: 10px; bottom:10px"> </div><!--/container - Acá se dibuja el canvas-->    
    </div>
        

<script>
  _BASEPATH = "<?php echo $basepath;?>"; 
  _ENVIROMENT = "<?php echo $enviroment;?>";
  
  app_maximo_y = <?php echo sfConfig::get('app_maximo_y')?>;
  escala =  <?php echo $sf_user->getAttribute('escala')?>;
  
  function dibujarFacu(stage){        
    <?php foreach ($estructuras as $estructura):?>
      <?php $puntos = PuntosTable::getPuntosBy($estructura->getId());?>
      <?php if (count($puntos) > 0):?>            
        <?php $arreglo_de_puntos = array()?>
        <?php for($i = 0; $i < count($puntos)-1; $i++):?>                
          <?php $arreglo_de_puntos[] = $puntos[$i]->getPuntoOrigenX()/($sf_user->getAttribute('escala'))+10;?>
          <?php $arreglo_de_puntos[] = (sfConfig::get('app_maximo_y') - $puntos[$i]->getPuntoOrigenY()) 
                                                    / $sf_user->getAttribute('escala');?>
        <?php endfor;?>                
          <?php $arreglo_de_puntos[] = $puntos[count($puntos)-1]->getPuntoOrigenX()/$sf_user->getAttribute('escala')+10;?>
          <?php $arreglo_de_puntos[] = (sfConfig::get('app_maximo_y') - $puntos[count($puntos)-1]->getPuntoOrigenY()) 
                                                    / $sf_user->getAttribute('escala');?>                
            dibujarPoligono(stage
                , "<?php echo $estructura->getTipo();?>"     
                , "<?php echo $estructura->getId();?>"
                , "<?php echo $destino;?>"                
                , new Array(<?php echo implode(',',$arreglo_de_puntos);?>));
      <?php endif;?>
    <?php endforeach;?>}        
</script>

<script>
  function borrarTodosLosPuntos(stage,layer){
      layer.removeChildren();
      dibujarFacu(stage);
      
  }
  
  function dibujarTodosLosPuntos(stage,layer){
    
    var aux = new Array();
    for (var i=0;i<puntosNavegacion.length;i++)
    {
        if (i<=indiceInicioCamino){
            var id = null;
            var x = puntosNavegacion[indiceInicioCamino-i].x/escala + 10;
            var y = (app_maximo_y - puntosNavegacion[indiceInicioCamino-i].y)/escala;
            aux.push(x);
            aux.push(y);
            if (i == puntosNavegacion.length - posActualLogica - 1){
                dibujarPuntoNavegacion(stage,layer,x,y,id,true,true);
            }else{
                dibujarPuntoNavegacion(stage,layer,x,y,id,false,true);
            }
        }
    }
    dibujarLinea(stage, layer, aux);
    dibujarPuntoNavegacion(stage,layer,puntoNavegacionFisica.x/escala + 10,(app_maximo_y - puntoNavegacionFisica.y)/escala,puntoNavegacionFisica.id, true,false);
  }    
</script>

<script>
  $(document).ready(inicio);
    var stage = new Kinetic.Stage({
          container: "container",
          width: <?php echo sfConfig::get('app_canvas_width');?>,
          height: <?php echo sfConfig::get('app_canvas_height');?>          
    });
    
  var layer = new Kinetic.Layer();  

  function inicio(){    
    dibujarFacu(stage);
    dibujarTodosLosPuntos(stage,layer);
    stage.draw();
  }  

</script>




<!-- 3D -->

<div data-role="popup" id="popupDialog" data-overlay-theme="a" data-theme="a" style="max-width:600px;" class="ui-corner-all" aria-disabled="false" data-shadow="true" data-corners="true" data-transition="pop">
  <div data-role="header" data-theme="a" class="ui-corner-top ui-header ui-bar-d" role="banner">
    <h1 class="ui-title" role="heading" aria-level="1">Felicitaciones</h1>
  </div>
  <div data-role="content" data-theme="a" style="padding:15px;" class="ui-corner-bottom ui-content ui-body-d" role="main">
    <p>Usted a llegado a su destino</p>
    <?php echo link_to('Navegar a otro sitio' ,'main/origen',array("rel" => "external", " data-role" => "button", "data-icon" => "search" , "data-theme"=>"a", "data-corners" => "true"));?>            
    <?php echo link_to('Ver informacón' ,'main/detalleEstructura?idEstructura='.$sf_user->getAttribute('fin_id'),array("rel" => "external", " data-role" => "button", "data-icon" => "search" , "data-theme"=>"a", "data-corners" => "true"));?>                
    <?php echo link_to_function('Cerrar' ,'cerrarDialogo()',array("data-rel"=>"back" ,"data-role" => "button", "data-icon" => "back" ,  "data-theme"=>"a", "data-corners" => "true"));?>                                   
  </div>
</div>
        
        <?php include_partial('global/mensajes_usuario');?>
        
<script>

// MAIN

// standard global variables
var container, scene, camara, renderer;// controls
var keyboard = new THREEx.KeyboardState();
var clock = new THREE.Clock();
//hay q obtener de alguna forma el array de puntos
posActualLogica = <?php echo count($puntos_navegacion)-1?>;
indiceInicioCamino = <?php echo count($puntos_navegacion)-1?>;


cantPuntos = <?php echo count($puntos_navegacion)-1?>;
puntosNavegacion = [];

 <?php foreach($puntos_navegacion as $punto_navegacion):?>
    var punto = new Object();
    punto.id = <?php echo $punto_navegacion->getId();?>;
    punto.x = <?php echo $punto_navegacion->getPuntoOrigenX();?>;
    punto.y = <?php echo $punto_navegacion->getPuntoOrigenY();?>;
    puntosNavegacion.push(punto);
<?php endforeach;?>

puntoNavegacionFisica = new Object();
puntoNavegacionFisica.id = puntosNavegacion[indiceInicioCamino].id;
puntoNavegacionFisica.x = puntosNavegacion[indiceInicioCamino].x;
puntoNavegacionFisica.y = puntosNavegacion[indiceInicioCamino].y;

// custom global variables

init();
animate();

// FUNCTIONS 		
function init() 
{
        
	// SCENE
	scene = new THREE.Scene();
        alturaCamara = 60;
	// CAMERA
	var SCREEN_WIDTH = window.innerWidth-36, SCREEN_HEIGHT = 500;
	var VIEW_ANGLE = 35, ASPECT = SCREEN_WIDTH / SCREEN_HEIGHT, NEAR = 0.1, FAR = 20000;
	camara = new THREE.PerspectiveCamera( VIEW_ANGLE, ASPECT, NEAR, FAR);
	camara.position.set(puntosNavegacion[posActualLogica].x,alturaCamara,-puntosNavegacion[posActualLogica].y);
                
        //calcula pendiente y angulo de rotacion para mirar al siguiente punto
        var pendiente = (puntosNavegacion[posActualLogica-1].x - camara.position.x) / (-puntosNavegacion[posActualLogica-1].y - camara.position.z);
        var angulo_rotacion = Math.atan(pendiente);

        // si el punto de destino de z es mayor al actual, da media vuelta mas
        if (-puntosNavegacion[posActualLogica-1].y>camara.position.z){
            angulo_rotacion += Math.PI;
        }
        
	camara.rotation.y = angulo_rotacion;
        scene.add(camara);
	
	
        // RENDERER
	if ( ThreeJsDetector.webgl )
		renderer = new THREE.WebGLRenderer( {antialias:true} );
	else
		renderer = new THREE.CanvasRenderer(); 
	renderer.setSize(SCREEN_WIDTH, SCREEN_HEIGHT);
        renderer.setClearColorHex(0xfefcff, 1);
	container = document.getElementById( 'ThreeJS' );
	container.appendChild( renderer.domElement );
		
	// FLOOR
	var floorTexture = new THREE.ImageUtils.loadTexture('../../../../images/cemento_alisado.jpg');
	floorTexture.wrapS = floorTexture.wrapT = THREE.RepeatWrapping; 
	floorTexture.repeat.set( 10, 10 );
	var floorMaterial = new THREE.MeshBasicMaterial( { map: floorTexture, side: THREE.DoubleSide } );
	var floorGeometry = new THREE.PlaneGeometry(10000, 10000, 10, 10);
	var floor = new THREE.Mesh(floorGeometry, floorMaterial);
	floor.position.y = -0.5;
	floor.rotation.x = Math.PI / 2;
	scene.add(floor);

        habilitarBotonera();
        //construccion de paredes
        <?php
                
        foreach ($paredes_dibujables as $pared):
            $punto1 = $pared->getPunto1();
            $punto2 = $pared->getPunto2();
                     
            //distancia = raiz[(y2 - y1)^2 + (x2 - x1)^2]
            $distancia = sqrt(pow($punto2->getPuntoOrigenY() - $punto1->getPuntoOrigenY(),2) + pow($punto2->getPuntoOrigenX() - $punto1->getPuntoOrigenX(),2));

            //punto medio = (x1 + x2) / 2 ; (y1 + y2) / 2
            $punto_medio_x = ($punto2->getPuntoOrigenX() + $punto1->getPuntoOrigenX())/2;
            $punto_medio_y = ($punto2->getPuntoOrigenY() + $punto1->getPuntoOrigenY())/2;

            //pendiente  = m = (y1-y2) / (x1-x2)
            //m = TAN(α)
            //α= ATAN(m) , ATAN=arcotangente 
                    
            if (($punto1->getPuntoOrigenX() - $punto2->getPuntoOrigenX()) != 0){
                $pendiente = ($punto1->getPuntoOrigenY() - $punto2->getPuntoOrigenY()) / ($punto1->getPuntoOrigenX() - $punto2->getPuntoOrigenX());
                $angulo_rotacion = atan($pendiente);
            }else{
                $angulo_rotacion = deg2rad(90);
            }
            $orientacion = $pared->getOrientacionPared()->getNombre();
            $link = $pared->getLinkImagen();
            
            ?>             
            
            dibujarPared(<?php echo  $distancia ?>,<?php echo $punto_medio_x ?>,<?php echo -$punto_medio_y ?>,<?php echo $angulo_rotacion?>,'<?php echo $orientacion?>','<?php echo $link?>');
            <?php 
        endforeach;
        ?>
            
        
        //cubo de referencia inicio
        var cube = new THREE.Mesh(new THREE.CubeGeometry(15, 15, 15), new THREE.MeshNormalMaterial());
        //cube.overdraw = true;
        cube.position.set(3500, 0, 200);
        scene.add(cube);
        
        activarCamara(false);
        deshabilitarBotonRecalcular();

}

function animate() 
{
    requestAnimationFrame( animate );
    //update();
    render();		
    TWEEN.update();
    
}

function update()
{
	var delta = clock.getDelta(); // seconds.
	var moveDistance = 200 * delta; // 200 pixels per second
	var rotateAngle = Math.PI / 2 * delta;   // pi/2 radians (90 degrees) per second
	
	// move forwards/backwards/left/right
	if ( keyboard.pressed("W") )
            	camara.translateZ( -moveDistance );
	if ( keyboard.pressed("S") )
		camara.translateZ(  moveDistance );
	if ( keyboard.pressed("Q") )
		camara.translateX( -moveDistance );
	if ( keyboard.pressed("E") )
		camara.translateX(  moveDistance );	

	// rotate left/right/up/down
	if ( keyboard.pressed("A") )
                camara.rotation.y += rotateAngle;
	if ( keyboard.pressed("D") )
		camara.rotation.y -= rotateAngle;
	if ( keyboard.pressed("R") )
		camara.rotateOnAxis( new THREE.Vector3(1,0,0), rotateAngle);
	if ( keyboard.pressed("F") )
		camara.rotateOnAxis( new THREE.Vector3(1,0,0), -rotateAngle);
	
	if ( keyboard.pressed("Z") )
	{
		camara.position.set(3500,25,200);
                camara.rotation.set(0,0,0);
	}
        
        if ( keyboard.pressed("C") )
	{
           irAPunto(3615,alturaCamara,-525,camara);
               
        }   
        if ( keyboard.pressed("P") )
	{
           console.log(camara.position);
        }
        
        if ( keyboard.pressed("L") )
                camara.rotation.y += Math.PI/2;
    
}
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

function render() 
{
     renderer.render( scene, camara );
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
    //dibujarPuntoNavegacion(stage,layer,arregloQR[1]/escala + 10,(app_maximo_y - arregloQR[2])/escala,arregloQR[0], true,false);
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

</script>
    
          
    

    
          
