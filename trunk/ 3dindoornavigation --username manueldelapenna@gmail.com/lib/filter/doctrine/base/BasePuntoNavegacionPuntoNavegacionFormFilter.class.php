<?php

/**
 * PuntoNavegacionPuntoNavegacion filter form base class.
 *
 * @package    tesis-recargada
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePuntoNavegacionPuntoNavegacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'distancia'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'distancia'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('punto_navegacion_punto_navegacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PuntoNavegacionPuntoNavegacion';
  }

  public function getFields()
  {
    return array(
      'punto_navegacion_1_id' => 'Number',
      'punto_navegacion_2_id' => 'Number',
      'distancia'             => 'Number',
    );
  }
}
