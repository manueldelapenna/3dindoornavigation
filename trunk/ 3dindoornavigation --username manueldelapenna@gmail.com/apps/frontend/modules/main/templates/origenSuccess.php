
<script> 
    if (!window.WebGLRenderingContext) {
        // the browser doesn't even know what WebGL is
        
        window.location = "frontend2d.php?punto_navegacion_origen_id=1";
        
    }
    _BASEPATH = "<?php echo $basepath;?>"; 
</script>


<?php use_helper("I18N");?>
<h3 style="font-size: 20px"><?php echo __('Lea un código QR para determinar su ubicación actual.');?></h3>
<div id="camara" class="origen">
    <video  id="camsource" autoplay width="320" height="240">Put your fallback message here.</video>
    <canvas id="qr-canvas" width="320" height="240" style="display:none"></canvas>
</div>        

<script>
    activarCamara(true);
</script>
          

