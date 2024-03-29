<?php

/**
 * Multimedia form base class.
 *
 * @method Multimedia getObject() Returns the current form's model object
 *
 * @package    tesis-recargada
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMultimediaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'nombre'          => new sfWidgetFormInputText(),
      'tipo'            => new sfWidgetFormInputText(),
      'estructura_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estructura'), 'add_empty' => true)),
      'estructura_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Estructura')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'          => new sfValidatorString(array('max_length' => 255)),
      'tipo'            => new sfValidatorInteger(),
      'estructura_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estructura'), 'required' => false)),
      'estructura_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Estructura', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('multimedia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Multimedia';
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
