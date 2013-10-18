<?php

/**
 * Estructura form base class.
 *
 * @method Estructura getObject() Returns the current form's model object
 *
 * @package    tesis-recargada
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEstructuraForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'nombre'                => new sfWidgetFormInputText(),
      'tipo'                  => new sfWidgetFormInputText(),
      'capacidad'             => new sfWidgetFormInputText(),
      'es_navegable'          => new sfWidgetFormInputCheckbox(),
      'multimedia_list'       => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Multimedia')),
      'puntos_list'           => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Puntos')),
      'punto_navegacion_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'PuntoNavegacion')),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'                => new sfValidatorString(array('max_length' => 50)),
      'tipo'                  => new sfValidatorInteger(),
      'capacidad'             => new sfValidatorInteger(),
      'es_navegable'          => new sfValidatorBoolean(array('required' => false)),
      'multimedia_list'       => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Multimedia', 'required' => false)),
      'puntos_list'           => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Puntos', 'required' => false)),
      'punto_navegacion_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'PuntoNavegacion', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estructura[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Estructura';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['multimedia_list']))
    {
      $this->setDefault('multimedia_list', $this->object->Multimedia->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['puntos_list']))
    {
      $this->setDefault('puntos_list', $this->object->Puntos->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['punto_navegacion_list']))
    {
      $this->setDefault('punto_navegacion_list', $this->object->PuntoNavegacion->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveMultimediaList($con);
    $this->savePuntosList($con);
    $this->savePuntoNavegacionList($con);

    parent::doSave($con);
  }

  public function saveMultimediaList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['multimedia_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Multimedia->getPrimaryKeys();
    $values = $this->getValue('multimedia_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Multimedia', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Multimedia', array_values($link));
    }
  }

  public function savePuntosList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['puntos_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Puntos->getPrimaryKeys();
    $values = $this->getValue('puntos_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Puntos', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Puntos', array_values($link));
    }
  }

  public function savePuntoNavegacionList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['punto_navegacion_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->PuntoNavegacion->getPrimaryKeys();
    $values = $this->getValue('punto_navegacion_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('PuntoNavegacion', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('PuntoNavegacion', array_values($link));
    }
  }

}
