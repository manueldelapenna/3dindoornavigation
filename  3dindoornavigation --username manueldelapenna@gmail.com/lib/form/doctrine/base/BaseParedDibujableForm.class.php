<?php

/**
 * ParedDibujable form base class.
 *
 * @method ParedDibujable getObject() Returns the current form's model object
 *
 * @package    tesis-recargada
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseParedDibujableForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'punto_1_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Punto1'), 'add_empty' => false)),
      'punto_2_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Punto2'), 'add_empty' => false)),
      'link_imagen' => new sfWidgetFormTextarea(),
      'descripcion' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'punto_1_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Punto1'))),
      'punto_2_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Punto2'))),
      'link_imagen' => new sfValidatorString(),
      'descripcion' => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('pared_dibujable[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ParedDibujable';
  }

}
