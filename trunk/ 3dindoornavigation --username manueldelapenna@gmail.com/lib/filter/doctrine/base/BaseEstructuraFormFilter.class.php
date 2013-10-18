<?php

/**
 * Estructura filter form base class.
 *
 * @package    tesis-recargada
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEstructuraFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'capacidad'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'es_navegable'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'multimedia_list'       => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Multimedia')),
      'puntos_list'           => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Puntos')),
      'punto_navegacion_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'PuntoNavegacion')),
    ));

    $this->setValidators(array(
      'nombre'                => new sfValidatorPass(array('required' => false)),
      'tipo'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'capacidad'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'es_navegable'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'multimedia_list'       => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Multimedia', 'required' => false)),
      'puntos_list'           => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Puntos', 'required' => false)),
      'punto_navegacion_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'PuntoNavegacion', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estructura_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addMultimediaListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.Estructura Estructura')
      ->andWhereIn('Estructura.estructura_id', $values)
    ;
  }

  public function addPuntosListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.Estructura Estructura')
      ->andWhereIn('Estructura.estructura_id', $values)
    ;
  }

  public function addPuntoNavegacionListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.Estructura Estructura')
      ->andWhereIn('Estructura.estructura_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Estructura';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'nombre'                => 'Text',
      'tipo'                  => 'Number',
      'capacidad'             => 'Number',
      'es_navegable'          => 'Boolean',
      'multimedia_list'       => 'ManyKey',
      'puntos_list'           => 'ManyKey',
      'punto_navegacion_list' => 'ManyKey',
    );
  }
}
