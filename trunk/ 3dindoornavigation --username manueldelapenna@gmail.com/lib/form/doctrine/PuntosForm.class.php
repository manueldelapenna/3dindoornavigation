<?php

/**
 * Puntos form.
 *
 * @package    tesis-recargada
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PuntosForm extends BasePuntosForm
{
  public function configure()
  {
    unset($this['estructura_list']);
    
    $this->setValidator('estructura_id', new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estructura'), 'required' => true)));
  }
}
