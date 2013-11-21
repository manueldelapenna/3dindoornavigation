<?php use_helper("I18N");?>

<h1><?php echo __('Su navegador no soporta WebGL. Pruebe el navegador 2D.');?></h1>
<h3 style="font-size: 20px"><?php echo __('Seleccione el destino.');?></h3>
<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Escriba parte del nombre para filtrar...">
  <?php foreach ($estructuras as $estructura):?>
  <li> <?php echo link_to($estructura->getNombre(),'main/navegar?est_id='.$estructura->getId(),array(
               "rel" => "external", "style" => "font-size: 18px"));?> 
  </li>
  <?php endforeach?>
</ul>
        
          

