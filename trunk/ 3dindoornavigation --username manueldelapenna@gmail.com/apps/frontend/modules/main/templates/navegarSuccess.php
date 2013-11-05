<?php use_helper("JavascriptBase");?>
<script>
  _BASEPATH = "<?php echo $basepath;?>"; 
  _ENVIROMENT = "<?php echo $enviroment;?>";

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
      <?php else:?> 
        <?php echo ('No existen estructuras cargadas para ser dibujadas');?>
      <?php endif;?>
    <?php endforeach;?>}        
</script>

<script>
  function dibujarTodosLosPuntos(stage,layer){
      <?php $arreglo_de_puntos = array()?>
      <?php $aux = 1;?>
      <?php $sf_user->setAttribute('siguiente_id',$puntos_navegacion[count($puntos_navegacion)-2]->getId());?>
      <?php foreach($puntos_navegacion as $punto_navegacion):?>
          <?php
            $id = $punto_navegacion->getId();
            $x = $punto_navegacion->getPuntoOrigenX() /$sf_user->getAttribute('escala') + 10;
            $y = (sfConfig::get('app_maximo_y') - $punto_navegacion->getPuntoOrigenY())
                                   / $sf_user->getAttribute('escala');
            $arreglo_de_puntos[] = $x;
            $arreglo_de_puntos[] = $y;            
          ?>           
          <?php if ($aux == count($puntos_navegacion)):?>
            dibujarPuntoNavegacion(stage,layer,<?php echo $x?>,<?php echo $y?>, <?php echo $id?>, true);
          <?php else:?>  
            dibujarPuntoNavegacion(stage,layer,<?php echo $x?>,<?php echo $y?>, <?php echo $id?>, false);
          <?php endif;?>
          <?php $aux++;?>
      <?php endforeach;?>
      dibujarLinea(stage, layer, new Array(<?php echo implode(',',$arreglo_de_puntos);?>));
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
    deshabilitarBotonRetroceder();
    deshabilitarBotonAvanzar();    
    deshabilitarBotonZoomOut();
    deshabilitarBotonZoomIn();
    //Centra el canvas cada vez que realizamos una petición
    centrar(stage);
  }  

  function rotar(deg){
      stage.rotateDeg(deg);
      stage.draw();
  }

  function centrar(){
      x = "<?php echo PuntoNavegacionTable::getPuntoNavegacionXPara($sf_user->getAttribute('actual_id')) 
                                      / $sf_user->getAttribute('escala') + 10;?>";
      y = "<?php echo (sfConfig::get('app_maximo_y') - 
                 PuntoNavegacionTable::getPuntoNavegacionYPara($sf_user->getAttribute('actual_id'))) / 
                 $sf_user->getAttribute('escala');?>";
                                            
      offset = "<?php echo $sf_user->getAttribute('escala') ;?>";
      
      if(offset < 5){
        stage.setX( (-x/2) - (offset*50) )  ;
        stage.setY((-y/2) - (offset*50) );
      }else{
        stage.setX( (-x/2) + (offset*10)  )
        stage.setY((-y/2) + (offset*10) ); 
      }                       
      stage.draw();
  }    
  
  function deshabilitarBotonRetroceder(){
    <?php if (count($sf_user->getAttribute('borrados')) == 0 ):?> 
      $('#link_retroceder').addClass('ui-disabled');
    <?php endif;?>      
  }
  
  function deshabilitarBotonAvanzar(){
    <?php if (count($puntos_navegacion) == 2):?> 
      $("#popupDialog").popup("open",100,300);        
      $('#link_avanzar').addClass('ui-disabled');      
    <?php endif;?>          
  }
  
  function deshabilitarBotonZoomIn(){
    <?php if ($sf_user->getAttribute('escala') == sfConfig::get('app_minimo_escala')):?> 
      $('#link_zoom_in').addClass('ui-disabled');      
    <?php endif;?>          
  } 
  
  function deshabilitarBotonZoomOut(){
    <?php if ($sf_user->getAttribute('escala') == sfConfig::get('app_maximo_escala')):?> 
      $('#link_zoom_out').addClass('ui-disabled');      
    <?php endif;?>          
  } 
</script>

<div data-role="popup" id="popupDialog" data-overlay-theme="a" data-theme="a" style="max-width:600px;" class="ui-corner-all" aria-disabled="false" data-shadow="true" data-corners="true" data-transition="pop">
  <div data-role="header" data-theme="a" class="ui-corner-top ui-header ui-bar-d" role="banner">
    <h1 class="ui-title" role="heading" aria-level="1">Felicitaciones</h1>
  </div>
  <div data-role="content" data-theme="a" style="padding:15px;" class="ui-corner-bottom ui-content ui-body-d" role="main">
    <p>Usted a llegado a su destino</p>
    <?php echo link_to('Navegar a otro sitio' ,'main/buscar',array("rel" => "external", " data-role" => "button", "data-icon" => "search" , "data-theme"=>"a", "data-corners" => "true"));?>            
    <?php echo link_to_function('Cerrar' ,'"#"',array("data-rel"=>"back" ,"data-role" => "button", "data-icon" => "back" ,  "data-theme"=>"a", "data-corners" => "true"));?>                                   
  </div>
</div>


<!-- 3D -->


<div id="ThreeJS" style="position: relative; border-style: solid; left:0px; top:0px; height: 500px; width: 600px;"></div>
<input type="button" value="ajax" onclick="ejecutarAjax()"/>
<script>
/*
	Three.js "tutorials by example"
	Author: Lee Stemkoski
	Date: July 2013 (three.js v59dev)
*/

// MAIN

// standard global variables
var container, scene, camera, renderer;// controls
var keyboard = new THREEx.KeyboardState();
var clock = new THREE.Clock();
// custom global variables

var collidableMeshList = [];

init();
animate();

// FUNCTIONS 		
function init() 
{
	// SCENE
	scene = new THREE.Scene();
	// CAMERA
	var SCREEN_WIDTH = 600, SCREEN_HEIGHT = 500;
	var VIEW_ANGLE = 45, ASPECT = SCREEN_WIDTH / SCREEN_HEIGHT, NEAR = 0.1, FAR = 20000;
	camera = new THREE.PerspectiveCamera( VIEW_ANGLE, ASPECT, NEAR, FAR);
	scene.add(camera);
	camera.position.set(3500,25,200);
	camera.rotation.set(0,0,0);
	
        // RENDERER
	if ( Detector.webgl )
		renderer = new THREE.WebGLRenderer( {antialias:true} );
	else
		renderer = new THREE.CanvasRenderer(); 
	renderer.setSize(SCREEN_WIDTH, SCREEN_HEIGHT);
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
            
            ?>             
            
            dibujarPared(<?php echo  $distancia ?>,<?php echo $punto_medio_x ?>,<?php echo -$punto_medio_y ?>,<?php echo $angulo_rotacion?>,'<?php echo $orientacion?>');
            <?php 
        endforeach;
        ?>
            
        
        //cubo de referencia inicio
        var cube = new THREE.Mesh(new THREE.CubeGeometry(15, 15, 15), new THREE.MeshNormalMaterial());
        //cube.overdraw = true;
        cube.position.set(3500, 0, 200);
        scene.add(cube);

}

function animate() 
{
    requestAnimationFrame( animate );
    
        update();
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
            	camera.translateZ( -moveDistance );
	if ( keyboard.pressed("S") )
		camera.translateZ(  moveDistance );
	if ( keyboard.pressed("Q") )
		camera.translateX( -moveDistance );
	if ( keyboard.pressed("E") )
		camera.translateX(  moveDistance );	

	// rotate left/right/up/down
	if ( keyboard.pressed("A") )
                camera.rotation.y += rotateAngle;
	if ( keyboard.pressed("D") )
		camera.rotation.y -= rotateAngle;
	if ( keyboard.pressed("R") )
		camera.rotateOnAxis( new THREE.Vector3(1,0,0), rotateAngle);
	if ( keyboard.pressed("F") )
		camera.rotateOnAxis( new THREE.Vector3(1,0,0), -rotateAngle);
	
	if ( keyboard.pressed("Z") )
	{
		camera.position.set(3500,25,200);
                camera.rotation.set(0,0,0);
	}
        
        if ( keyboard.pressed("C") )
	{
           irAPunto(3500,25,200,camera);
               
    }
    
}
function dibujarPared(distancia,puntoMedioX,puntoMedioY,anguloRotacion,orientacion) {
    
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
        materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/walls.jpg') }));
    }else{
        materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/walls.jpg') }));
        materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('') }));
    } 
    var MovingCubeMat = new THREE.MeshFaceMaterial(materialArray);
    var MovingCubeGeom = new THREE.CubeGeometry(distancia, elevation, border, 1, 1, 1, materialArray );

    pared = new THREE.Mesh( MovingCubeGeom, MovingCubeMat );
    pared.position.set(puntoMedioX, 75, puntoMedioY);
    pared.rotation.y = anguloRotacion;
    collidableMeshList.push(pared);
    scene.add( pared );
}

function irAPunto(x,y,z,cam) {
  
    //calcula pendiente y angulo de rotacion
    var pendiente = (cam.position.x - 3500) / (cam.position.z - 200);
    var angulo_rotacion = Math.atan(pendiente);

    // si el punto de destino de z es mayor al actual, da media vuelta mas
    if (200>cam.position.z){
        angulo_rotacion += Math.PI;
    }

    //rotacion
    var animacionRotacion = new TWEEN.Tween(cam.rotation).to({
         x: 0,
         y: angulo_rotacion,
         z: 0,});
     animacionRotacion.easing(TWEEN.Easing.Linear.None).onUpdate(function () {
         //mientras rota no hace nada
     });
     animacionRotacion.onComplete(function () {
         //termina de rotar y avanza
         var animacionAvance = new TWEEN.Tween(cam.position).to({
              x: x,
                y: y,
                z: z
           });
         animacionAvance.easing(TWEEN.Easing.Linear.None).onUpdate(function () {
             //mientras avanza no hace nada
           });
         animacionAvance.onComplete(function () {
             //termina de avanzar y no hace nada
         });
         //comienza a avanzar
         animacionAvance.start(); 

    });
    //comienza a rotar
    animacionRotacion.start();            
}
        

function collision() {

	var originPoint = person.position.clone();
	for (var vertexIndex = 0; vertexIndex < person.geometry.vertices.length; vertexIndex++)	{		
		var localVertex = person.geometry.vertices[vertexIndex].clone();
		var globalVertex = localVertex.applyMatrix4( person.matrix );
		var directionVector = globalVertex.sub( person.position );
		
		var ray = new THREE.Raycaster( originPoint, directionVector.clone().normalize() );
		var collisionResults = ray.intersectObjects( collidableMeshList );
		if ( collisionResults.length > 0 && collisionResults[0].distance < directionVector.length() ) 
			return true;
		
	}
	return false;		
}

function render() 
{
     renderer.render( scene, camera );
}

function ejecutarAjax() 
{
    puntoActual = 7;
    $.ajax({
        url: "<?php echo url_for('main/prueba')?>?id="+puntoActual,
        dataType: "json",
        success: function(data){
            alert(data.mensaje);
            alert(data.id);
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert("No funca");
        }
     });
     
}

function getPuntoSiguiente() 
{
    idActual = <?php echo $sf_user->getAttribute('actual_id')?>;
    //idFin = <?php echo $sf_user->getAttribute('fin_id')?>;
    $.ajax({
        url: "<?php echo url_for('main/siguiente')?>?idActual="+idActual,
        dataType: "json",
        success: function(data){
            irAPunto(data.xSiguiente,25,data.ySiguiente,camera);
            //alert('Siguiente x: '+data.xSiguiente+ 'Siguiente y:' + data.ySiguiente);
            
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert("No funca");
        }
     });
 
}

</script>
    
