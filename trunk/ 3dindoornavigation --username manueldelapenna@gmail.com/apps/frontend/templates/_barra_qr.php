<?php
    //Relative URL Ej: http://localhost/indoor-navigation
    $basepath = ('http'.($sf_request->isSecure() ? 's' : '').'://').$sf_request->getHost().$sf_request->getRelativeUrlRoot();
    //Si es Producción index.php sino frontend_dev.php    
    $enviroment = (sfConfig::get('sf_environment') == 'dev' ? 'frontend_dev.php' : 'index.php');
;?>

<div style="position:absolute; left: 10px; bottom:10px" data-role="controlgroup" data-type="horizontal" data-mini="false">
  
  <a id="link_encender_lector" href="javascript:encenderLector()" 
     data-role="button" data-icon="refresh" data-theme="a" rel = "external">Activar QR
  </a>  
    
  <a id="link_apagar_lector" href="javascript:apagarLector()" 
     data-role="button" data-icon="refresh" data-theme="a" rel = "external">Desactivar QR
  </a>
  
  <a id="link_recalcular_camino" href="javascript:recalcularCamino()" 
     data-role="button" data-icon="refresh" data-theme="a" rel = "external">Recalcular Camino
  </a>
  
</div>