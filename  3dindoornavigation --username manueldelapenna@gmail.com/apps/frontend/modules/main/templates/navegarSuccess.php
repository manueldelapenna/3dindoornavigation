<?php use_helper("JavascriptBase");?>

<!-- Interfaz de navegación-->    
<div id="ThreeJS" style="position: relative; left:0; border-style: solid; left:0px; top:0px; height: 500px; width: window.innerWidth"> 
    <?php include_partial('global/barra_navegacion');?><!-- Acá se dibuja la barra de control de navegacion-->    
    <div id="camara" class="navegar" style="position:absolute; left: 10px; bottom:70px">
        <video  id="camsource" autoplay width="320" height="240">Put your fallback message here.</video>
        <canvas id="qr-canvas" width="320" height="240" style="display:none"></canvas>
    </div><!-- Acá se dibuja la cámara-->    
    <?php include_partial('global/barra_qr');?> <!-- Acá se dibuja la barra de control de la camara-->    
    <div id="container" style="position:absolute; right: 10px; bottom:10px"> </div><!-- Acá se dibuja el canvas 2D-->    
</div><!-- Acá se dibuja el canvas 3D-->    
        
<!-- Mensaje de llegada a destino -->
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
        
<!-- Mensajes de usuario -->
<?php include_partial('global/mensajes_usuario');?>
    
    
<script>
    //declaraciones 2D
    _BASEPATH = "<?php echo $basepath;?>"; 
    _ENVIROMENT = "<?php echo $enviroment;?>";

    app_maximo_y = <?php echo sfConfig::get('app_maximo_y')?>;
    escala =  <?php echo $sf_user->getAttribute('escala')?>;
    
    var stage = new Kinetic.Stage({
              container: "container",
              width: <?php echo sfConfig::get('app_canvas_width');?>,
              height: <?php echo sfConfig::get('app_canvas_height');?>          
        });

    var layer = new Kinetic.Layer();  


    //declaraciones 3D
    var container, scene, camara, renderer;// controls
    var keyboard = new THREEx.KeyboardState();
    
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
    
    $(document).ready(inicio);


function inicio(){    
    //inicio 2D
    dibujarFacu(stage);
    dibujarTodosLosPuntos(stage,layer);
    stage.draw();

    //inicio 3D
    init();
    animate();
}  
  
      
 //dibujo de facultad en 2D
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
    render();		
    TWEEN.update();
    
}

function render() 
{
     renderer.render( scene, camara );
}

</script>