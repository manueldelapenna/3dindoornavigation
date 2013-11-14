<?php use_helper("I18N");?>
<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="success" id="success2">
    <?php echo $sf_user->getFlash('notice') ?>
  </div>
<?php endif; ?>
<?php
    if ($destino != null){
    echo link_to('Continuar navegando hacia '. $estructura->getNombre(),'main/navegar?est_id='.$destino,array(
               "rel" => "external", "style" => "font-size: 18px"));
    }
?> 
<h3 style="font-size: 20px"><?php echo __('Seleccione el destino.');?></h3>
<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Escriba parte del nombre para filtrar...">
  <?php foreach ($estructuras as $estructura):?>
  <li> <?php echo link_to($estructura->getNombre(),'main/navegar?est_id='.$estructura->getId(),array(
               "rel" => "external", "style" => "font-size: 18px"));?> 
  </li>
  <?php endforeach?>
</ul>
        
          

