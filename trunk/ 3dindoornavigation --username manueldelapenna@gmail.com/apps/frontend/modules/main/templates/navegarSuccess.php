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
	// EVENTS
	//THREEx.WindowResize(renderer, camera);
	THREEx.FullScreen.bindKey({ charCode : 'm'.charCodeAt(0) });
        
        var border = 20;
        var elevation = 150;

	// LIGHT
	var light = new THREE.PointLight(0xffffff);
	light.position.set(0,250,0);
	scene.add(light);
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
	// SKYBOX/FOG
	var skyBoxGeometry = new THREE.CubeGeometry( 10000, 10000, 10000 );
	var skyBoxMaterial = new THREE.MeshBasicMaterial( { color: 0x9999ff, side: THREE.BackSide } );
	var skyBox = new THREE.Mesh( skyBoxGeometry, skyBoxMaterial );
	// scene.add(skyBox);
	scene.fog = new THREE.FogExp2( 0x9999ff, 0.00025 );
	
	////////////
	// CUSTOM //
	////////////
	
        //paredes de afuera
        
        <?php
        
        $punto_anterior = null;
                
        foreach ($puntos_todas_paredes as $punto_pared):
             
             if ($punto_anterior != null){
                 
                 //if ($punto_pared->getEstructuraId()==2){
                 if ($punto_anterior->getEstructuraId() == $punto_pared->getEstructuraId()){
                     
                     //distancia = raiz[(y2 - y1)^2 + (x2 - x1)^2]
                     $distancia = sqrt(pow($punto_pared->getPuntoOrigenY() - $punto_anterior->getPuntoOrigenY(),2) + pow($punto_pared->getPuntoOrigenX() - $punto_anterior->getPuntoOrigenX(),2));
                                         
                     //punto medio = (x1 + x2) / 2 ; (y1 + y2) / 2
                    $punto_medio_x = ($punto_pared->getPuntoOrigenX() + $punto_anterior->getPuntoOrigenX())/2;
                    $punto_medio_y = ($punto_pared->getPuntoOrigenY() + $punto_anterior->getPuntoOrigenY())/2;
                    

                    //pendiente  = m = (y1-y2) / (x1-x2)
                    //m = TAN(α)
                    //α= ATAN(m) , ATAN=arcotangente 
                    
                    if (($punto_anterior->getPuntoOrigenX() - $punto_pared->getPuntoOrigenX()) != 0){
                        $pendiente = ($punto_anterior->getPuntoOrigenY() - $punto_pared->getPuntoOrigenY()) / ($punto_anterior->getPuntoOrigenX() - $punto_pared->getPuntoOrigenX());
                        $angulo_rotacion = atan($pendiente);
                    }else{
                        $angulo_rotacion = deg2rad(90);
                    }
                                       
                    
                     ?>             
                                 
                     
                    
    // create an array with six textures for a cool cube
                
                    var materialArray = [];
                    materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/crate.png') }));
                    materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/crate.png') }));
                    materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/crate.png') }));
                    materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/crate.png') }));
                    materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/walls.jpg') }));
                    materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/walls.jpg') }));
                    var MovingCubeMat = new THREE.MeshFaceMaterial(materialArray);
                    var MovingCubeGeom = new THREE.CubeGeometry( <?php echo  $distancia ?>, elevation, border, 1, 1, 1, materialArray );

                    pared = new THREE.Mesh( MovingCubeGeom, MovingCubeMat );
                    pared.position.set(<?php echo $punto_medio_x ?>, 75, <?php echo -$punto_medio_y ?>);
                    pared.rotation.y = <?php echo $angulo_rotacion?>;
                    collidableMeshList.push(pared);
                    scene.add( pared );
                    
           <?php }else{
                    //dibuja el ultimo con el primero del mismo id y guarda el primero del otro id de estructura
                    //distancia = raiz[(y2 - y1)^2 + (x2 - x1)^2]
                    $distancia = sqrt(pow($primer_punto->getPuntoOrigenY() - $punto_anterior->getPuntoOrigenY(),2) + pow($primer_punto->getPuntoOrigenX() - $punto_anterior->getPuntoOrigenX(),2));
                                         
                     //punto medio = (x1 + x2) / 2 ; (y1 + y2) / 2
                    $punto_medio_x = ($primer_punto->getPuntoOrigenX() + $punto_anterior->getPuntoOrigenX())/2;
                    $punto_medio_y = ($primer_punto->getPuntoOrigenY() + $punto_anterior->getPuntoOrigenY())/2;
                    

                    //pendiente  = m = (y1-y2) / (x1-x2)
                    //m = TAN(α)
                    //α= ATAN(m) , ATAN=arcotangente 
                    
                    if (($punto_anterior->getPuntoOrigenX() - $primer_punto->getPuntoOrigenX()) != 0){
                        $pendiente = ($punto_anterior->getPuntoOrigenY() - $primer_punto->getPuntoOrigenY()) / ($punto_anterior->getPuntoOrigenX() - $primer_punto->getPuntoOrigenX());
                        $angulo_rotacion = atan($pendiente);
                    }else{
                        $angulo_rotacion = deg2rad(90);
                    }
                                       
                    
                     ?>             
                                 
                     
                    
    // create an array with six textures for a cool cube
                
                    var materialArray = [];
                    materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/crate.png') }));
                    materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/crate.png') }));
                    materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/crate.png') }));
                    materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/crate.png') }));
                    materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/walls.jpg') }));
                    materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/walls.jpg') }));
                    var MovingCubeMat = new THREE.MeshFaceMaterial(materialArray);
                    var MovingCubeGeom = new THREE.CubeGeometry( <?php echo  $distancia ?>, elevation, border, 1, 1, 1, materialArray );

                    pared = new THREE.Mesh( MovingCubeGeom, MovingCubeMat );
                    pared.position.set(<?php echo $punto_medio_x ?>, 75, <?php echo -$punto_medio_y ?>);
                    pared.rotation.y = <?php echo $angulo_rotacion?>;
                    collidableMeshList.push(pared);
                    scene.add( pared );
                    
           <?php
               
               
                    $primer_punto = $punto_pared;
                 }                 
                 //}
             }else{
                 $primer_punto = $punto_pared;
                 
             }
             
             $punto_anterior = $punto_pared;
        endforeach;
            //dibuja la pared faltante (primer punto de la última estructura con último punto de la última estructura
            //distancia = raiz[(y2 - y1)^2 + (x2 - x1)^2]
            $distancia = sqrt(pow($primer_punto->getPuntoOrigenY() - $punto_anterior->getPuntoOrigenY(),2) + pow($primer_punto->getPuntoOrigenX() - $punto_anterior->getPuntoOrigenX(),2));

             //punto medio = (x1 + x2) / 2 ; (y1 + y2) / 2
            $punto_medio_x = ($primer_punto->getPuntoOrigenX() + $punto_anterior->getPuntoOrigenX())/2;
            $punto_medio_y = ($primer_punto->getPuntoOrigenY() + $punto_anterior->getPuntoOrigenY())/2;


            //pendiente  = m = (y1-y2) / (x1-x2)
            //m = TAN(α)
            //α= ATAN(m) , ATAN=arcotangente 

            if (($punto_anterior->getPuntoOrigenX() - $primer_punto->getPuntoOrigenX()) != 0){
                $pendiente = ($punto_anterior->getPuntoOrigenY() - $primer_punto->getPuntoOrigenY()) / ($punto_anterior->getPuntoOrigenX() - $primer_punto->getPuntoOrigenX());
                $angulo_rotacion = atan($pendiente);
            }else{
                $angulo_rotacion = deg2rad(90);
            }


             ?>             



// create an array with six textures for a cool cube

            var materialArray = [];
            materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/crate.png') }));
            materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/crate.png') }));
            materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/crate.png') }));
            materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/crate.png') }));
            materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/walls.jpg') }));
            materialArray.push(new THREE.MeshBasicMaterial( { map: THREE.ImageUtils.loadTexture('../../../../images/walls.jpg') }));
            var MovingCubeMat = new THREE.MeshFaceMaterial(materialArray);
            var MovingCubeGeom = new THREE.CubeGeometry( <?php echo  $distancia ?>, elevation, border, 1, 1, 1, materialArray );

            pared = new THREE.Mesh( MovingCubeGeom, MovingCubeMat );
            pared.position.set(<?php echo $punto_medio_x ?>, 75, <?php echo -$punto_medio_y ?>);
            pared.rotation.y = <?php echo $angulo_rotacion?>;
            collidableMeshList.push(pared);
            scene.add( pared );

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
	
	// local transformations

	
	
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
	var rotation_matrix = new THREE.Matrix4().identity();
	if ( keyboard.pressed("A") )
		camera.rotateOnAxis( new THREE.Vector3(0,1,0), rotateAngle);
	if ( keyboard.pressed("D") )
		camera.rotateOnAxis( new THREE.Vector3(0,1,0), -rotateAngle);
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
           var pendiente = (camera.position.z - 200) / (camera.position.x - 3500);
           var angulo_rotacion = Math.atan(pendiente);
           
           var anguloAGirar = (angulo_rotacion - camera.rotation.y);
           if (anguloAGirar > 3.1415926535820002){
                anguloAGirar = -(6.2831853071640005 - anguloAGirar);
           }
                     
                        
           var tween2 = new TWEEN.Tween(camera.rotation).to({
                x: 0,
                y: anguloAGirar,
                z: 0 ,});
            tween2.easing(TWEEN.Easing.Linear.None).onUpdate(function () {
                
                //console.log(camera.rotation)
                //camera.lookAt(camera.position);
            });
            tween2.onComplete(function () {
          
               //camera.lookAt(camera.position);
                
                        var tween = new TWEEN.Tween(camera.position).to({
                             x: 3500,
                               y: 25,
                               z: 200
                          });
                         tween.easing(TWEEN.Easing.Linear.None).onUpdate(function () {

                             console.log(camera.rotation)
                                //camera.lookAt(camera.position);
                          });
                        tween.onComplete(function () {
                                //camera.lookAt(camera.position);
                        });
                        tween.start(); 
                                    
        });
        tween2.start();     
                
    }
    
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

</script>
    
