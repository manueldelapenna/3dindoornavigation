<?php

/**
 * Puntos form base class.
 *
 * @method Puntos getObject() Returns the current form's model object
 *
 * @package    tesis-recargada
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePuntosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'punto_origen_x'  => new sfWidgetFormInputText(),
      'punto_origen_y'  => new sfWidgetFormInputText(),
      'estructura_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estructura'), 'add_empty' => true)),
      'estructura_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Estructura')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'punto_origen_x'  => new sfValidatorInteger(),
      'punto_origen_y'  => new sfValidatorInteger(),
      'estructura_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estructura'), 'required' => false)),
      'estructura_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Estructura', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('puntos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Puntos';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['estructura_list']))
    {
      $this->setDefault('estructura_list', $this->object->Estructura->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveEstructuraList($con);

    parent::doSave($con);
  }

  public function saveEstructuraList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['estructura_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Estructura->getPrimaryKeys();
    $values = $this->getValue('estructura_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Estructura', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Estructura', array_values($link));
    }
  }

}
