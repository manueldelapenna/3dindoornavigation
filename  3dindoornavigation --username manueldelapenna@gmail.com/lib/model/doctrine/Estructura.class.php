<?php

/**
 * Estructura
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    tesis-recargada
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Estructura extends BaseEstructura
{  
  public function __toString() {
    return $this->getNombre();
  }
  
  public function getTipoToString(){
    return BaseCustomOptionsHolder::getInstance('EstructuraType')->getStringFor($this->getTipo());
  }
}
