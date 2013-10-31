<?php

/**
 * ParedDibujable filter form base class.
 *
 * @package    tesis-recargada
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseParedDibujableFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'punto_1_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Punto1'), 'add_empty' => true)),
      'punto_2_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Punto2'), 'add_empty' => true)),
      'link_imagen'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'orientacion_pared_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrientacionPared'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'punto_1_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Punto1'), 'column' => 'id')),
      'punto_2_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Punto2'), 'column' => 'id')),
      'link_imagen'          => new sfValidatorPass(array('required' => false)),
      'descripcion'          => new sfValidatorPass(array('required' => false)),
      'orientacion_pared_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('OrientacionPared'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('pared_dibujable_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ParedDibujable';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'punto_1_id'           => 'ForeignKey',
      'punto_2_id'           => 'ForeignKey',
      'link_imagen'          => 'Text',
      'descripcion'          => 'Text',
      'orientacion_pared_id' => 'ForeignKey',
    );
  }
}
