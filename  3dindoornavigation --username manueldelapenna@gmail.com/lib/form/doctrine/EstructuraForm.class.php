<?php

/**
 * Estructura form.
 *
 * @package    tesis-recargada
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EstructuraForm extends BaseEstructuraForm
{
  public function configure()
  {
    unset($this['multimedia_list'],
          $this['puntos_list'],
          $this['punto_navegacion_list']);
    $this->setWidget('tipo', new sfWidgetFormChoice(array(
        'choices' => BaseCustomOptionsHolder::getInstance('EstructuraType')->getOptions('Seleccione'))));
    $this->setValidator('tipo', new sfValidatorChoice(array(
        'choices' => BaseCustomOptionsHolder::getInstance('EstructuraType')->getKeys(),
        'required' => true
    )));
    
  }
}
