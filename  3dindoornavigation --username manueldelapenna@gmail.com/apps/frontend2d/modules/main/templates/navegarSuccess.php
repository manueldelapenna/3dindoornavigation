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
            dibujarPuntoNavegacion(stage,layer,<?php echo $x?>,<?php echo $y?>, <?php echo $id?>, true,false);
          <?php else:?>  
            dibujarPuntoNavegacion(stage,layer,<?php echo $x?>,<?php echo $y?>, <?php echo $id?>, false,false);
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
 
  function cerrarDialogo(){
    $("#popupDialog").popup("close");
  }
</script>

<div data-role="popup" id="popupDialog" data-overlay-theme="a" data-theme="a" style="max-width:600px;" class="ui-corner-all" aria-disabled="false" data-shadow="true" data-corners="true" data-transition="pop">
  <div data-role="header" data-theme="a" class="ui-corner-top ui-header ui-bar-d" role="banner">
    <h1 class="ui-title" role="heading" aria-level="1">Felicitaciones</h1>
  </div>
  <div data-role="content" data-theme="a" style="padding:15px;" class="ui-corner-bottom ui-content ui-body-d" role="main">
    <p>Usted a llegado a su destino</p>
    <?php echo link_to('Navegar a otro sitio' ,'main/buscar',array("rel" => "external", " data-role" => "button", "data-icon" => "search" , "data-theme"=>"a", "data-corners" => "true"));?>            
    <?php echo link_to_function('Cerrar' ,'cerrarDialogo()',array("data-rel"=>"back" ,"data-role" => "button", "data-icon" => "back" ,  "data-theme"=>"a", "data-corners" => "true"));?>                                   
  </div>
</div>