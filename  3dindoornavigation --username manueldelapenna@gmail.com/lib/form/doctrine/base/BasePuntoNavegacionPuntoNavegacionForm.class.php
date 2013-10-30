<?php

/**
 * PuntoNavegacionPuntoNavegacion form base class.
 *
 * @method PuntoNavegacionPuntoNavegacion getObject() Returns the current form's model object
 *
 * @package    tesis-recargada
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePuntoNavegacionPuntoNavegacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'punto_navegacion_1_id' => new sfWidgetFormInputHidden(),
      'punto_navegacion_2_id' => new sfWidgetFormInputHidden(),
      'distancia'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'punto_navegacion_1_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('punto_navegacion_1_id')), 'empty_value' => $this->getObject()->get('punto_navegacion_1_id'), 'required' => false)),
      'punto_navegacion_2_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('punto_navegacion_2_id')), 'empty_value' => $this->getObject()->get('punto_navegacion_2_id'), 'required' => false)),
      'distancia'             => new sfValidatorNumber(),
    ));

    $this->widgetSchema->setNameFormat('punto_navegacion_punto_navegacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PuntoNavegacionPuntoNavegacion';
  }

}
