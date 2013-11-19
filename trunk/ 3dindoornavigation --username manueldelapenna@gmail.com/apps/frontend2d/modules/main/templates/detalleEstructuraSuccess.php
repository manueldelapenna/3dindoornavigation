<div class="ui-grid-a" id="opcionesNavegacion">
  <div class="ui-block-a">	
    <?php echo link_to('Volver a la navegación anterior' ,'main/navegar?est_id='.$destino,array("rel" => "external", " data-role" => "button", "data-icon" => "back"));?>
  </div>
  <div class="ui-block-b">	
    <?php echo link_to('Navegar hacia: '.$estructura->getNombre() ,'main/navegarHacia?est_id='.$estructura->getId(),array("rel" => "external", " data-role" => "button", "data-icon" => "check"));?>
  </div>    
</div>

<div data-role="content" data-theme="c" class="ui-corner-bottom ui-content ui-body-c" role="main">
      <h3><?php echo  $estructura->getNombre(); ?></h3>
      <strong> M&aacute;xima cantidad de personas: </strong> <?php echo  $estructura->getCapacidad();?> <br>
      <?php $cont = 1;?>     
      <?php if(count($multimedia) > 0):?>
          <strong> Recursos Multimediales: </strong> <br> <br>       
          <div class="ui-grid-b" data-theme="b">      
            <?php foreach ($multimedia as $media): ?>        
              <!--Tumb imagens-->
              <?php switch($cont){
                    case '1':
                      $letra = 'a';
                      $cont ++;
                    break;
                    case '2':
                      $letra = 'b';
                      $cont ++;                    
                    break;
                    case '3':
                      $letra = 'c';
                      $cont = 1;                    
                    break;                                
              };?>            
              <div class="ui-block-<?php echo $letra;?>"> 
                  <a href="<?php echo '#popupBasic_'.$media->getId();?>" data-rel="popup">
                      <?php echo image_tag('fotos/'.$media->getNombre(),array("height"=>"350px" , "width"=>"100%"));?>
                  </a>
              </div>

              <!-- Popup imagen -->
              <div data-role="popup" id="<?php echo 'popupBasic_'.$media->getId();?>"
                  data-overlay-theme="a" data-corners="false" aria-disabled="false" data-shadow="true" data-transition="flip"
                  data-shadow="true">          
                <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-popup-btn-close ui-btn ui-shadow ui-btn-corner-all ui-btn-icon-notext ui-btn-up-a" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" title="Close"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Close</span><span class="ui-icon ui-icon-delete ui-icon-shadow">&nbsp;</span></span></a>
                <?php echo image_tag('fotos/'.$media->getNombre(),array('size' => '800x600'));?>
              </div>        
            <?php endforeach;?>    
          </div>
      <?php else:?>
          <strong> Recursos Multimediales: </strong>          
          <?php echo 'La estructura seleccionada no posee ningún recurso asociado';?>
      <?php endif;?>
</div>
