<?php use_helper('I18N');?>

<?php if ($sf_user->hasFlash('error')): ?>
  <div class="mensaje_error"><?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?></div>
<?php endif; ?>
  
<?php if ($sf_user->hasFlash('notice')): ?>
  <div style="margin: 4px 0;  
    padding: 4px 4px 4px 30px;
    background: url(../images/notice.png) no-repeat 10px 4px;
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    background-color: #E1F49D;
    color: black;
    font-weight: bold;"><?php echo sfOutputEscaper::unescape(__($sf_user->getFlash('notice'), array(), 'sf_admin')) ?></div>
<?php endif; ?>

