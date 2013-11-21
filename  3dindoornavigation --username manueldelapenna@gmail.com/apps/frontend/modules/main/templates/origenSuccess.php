<script> 
    if (!window.WebGLRenderingContext) {
        // the browser doesn't even know what WebGL is
        window.location = "../web/frontend2d.php/main/buscar?origen_id=1";
    }
</script>

<?php use_helper("I18N");?>
<h3 style="font-size: 20px"><?php echo __('Seleccione su ubicación actual.');?></h3>
<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Escriba parte del nombre para filtrar...">
  <?php foreach ($estructuras as $estructura):?>
  <li> <?php echo link_to($estructura->getNombre(),'main/buscar?id_estructura_origen='.$estructura->getId(),array(
               "rel" => "external", "style" => "font-size: 18px"));?> 
  </li>
  <?php endforeach?>
</ul>
        
          

