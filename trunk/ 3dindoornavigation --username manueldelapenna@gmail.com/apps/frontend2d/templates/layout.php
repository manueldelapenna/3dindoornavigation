<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
      <title>Indoor Navigation</title>
      <meta charset="utf-8" />
      <?php include_stylesheets();?>
      <?php include_javascripts();?>
      <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css" />
      <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
      <script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>      
      <link rel="shortcut icon" href="<?php echo public_path('/favicon.ico') ?>" /> 
  </head>
  <body>
    
    <div data-role="page" style="width:100%">
      <div data-role="header">
        <h1 style="font-size: 22px">Navegaci&oacute;n Indoor</h1>
      </div><!-- /header --> 
      
      <div data-role="navbar">
          <ul>
            <li><?php echo link_to('Buscar', 'main/buscar', array("rel" => "external", "style" => "font-size: 20px"));?></li>
          </ul>
      </div><!-- /navbar -->
      
      <div data-role="content">        
        <?php if ($sf_request->getParameter('action') == 'navegar'):?>
          <?php include_partial('global/barra_navegacion');?>        
        <?php endif;?>        
        <?php include_partial('global/mensajes_usuario');?>
        <div id="container"> </div><!--/container - Acá se dibuja el canvas-->    
        <?php echo $sf_content; ?>
      </div><!-- /content -->
      
      <div data-role="footer">
        <h4 style="font-size: 22px"> &copy; 2012 | Navegaci&oacute;n Indoor 2D | Versi&oacute;n <?php echo sfConfig::get('app_version');?> </h4>
      </div><!-- /footer -->
    </div><!-- /div data-role -->
  </body>
</html>
