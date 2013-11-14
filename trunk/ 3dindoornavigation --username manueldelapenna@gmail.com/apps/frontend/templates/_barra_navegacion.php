<?php
    //Relative URL Ej: http://localhost/indoor-navigation
    $basepath = ('http'.($sf_request->isSecure() ? 's' : '').'://').$sf_request->getHost().$sf_request->getRelativeUrlRoot();
    //Si es Producción index.php sino frontend_dev.php    
    $enviroment = (sfConfig::get('sf_environment') == 'dev' ? 'frontend_dev.php' : 'index.php');
;?>
<!--
<div data-role="controlgroup" data-type="horizontal" data-mini="false">
  <a id="link_retroceder" href="<?php //echo $basepath."/".$enviroment."/main/retroceder";?>" 
     data-role="button" data-icon="arrow-l" data-theme="a" rel = "external"> Retroceder 
  </a>    
  <a id="link_avanzar" href="<?php //echo $basepath."/".$enviroment."/main/adelantar";?>" 
     data-role="button" data-icon="arrow-r" data-theme="a" rel = "external"> Avanzar 
  </a>
  <a id="link_zoom_in" href="<?php //echo $basepath."/".$enviroment."/main/zoomIn";?>" 
     data-role="button" data-icon="plus" data-theme="a" rel = "external"> Zoom In 
  </a>
  <a id="link_zoom_out" href="<?php //echo $basepath."/".$enviroment."/main/zoomOut";?>" 
     data-role="button" data-icon="minus" data-theme="a" rel = "external"> Zoom Out 
  </a>
</div>-->

<div style="position:absolute;" data-role="controlgroup" data-type="horizontal" data-mini="false">
  
  <a type="button" id="link_retroceder" href="javascript:getPuntoAnterior()" 
     data-icon="arrow-l" data-theme="a" rel = "external">Retroceder </a>
  
  <a type="button" id="link_avanzar" href="javascript:getPuntoSiguiente()" 
     data-icon="arrow-r" data-theme="a" rel = "external">Avanzar </a>
    
  <a id="link_360_izquierda" href="javascript:rotar360(2*Math.PI,camera)" 
     data-role="button" data-icon="arrow-l" data-theme="a" rel = "external">360º Izquierda 
  </a>
  <a id="link_360_derecha" href="javascript:rotar360(-2*Math.PI,camera)" 
     data-role="button" data-icon="arrow-r" data-theme="a" rel = "external">360º Derecha
  </a>
    
  
</div>