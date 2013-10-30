<?php

/**
 * Puntos filter form base class.
 *
 * @package    tesis-recargada
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePuntosFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'punto_origen_x'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'punto_origen_y'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estructura_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estructura'), 'add_empty' => true)),
      'estructura_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Estructura')),
    ));

    $this->setValidators(array(
      'punto_origen_x'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'punto_origen_y'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'estructura_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Estructura'), 'column' => 'id')),
      'estructura_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Estructura', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('puntos_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addEstructuraListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('Estructura.id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Puntos';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'punto_origen_x'  => 'Number',
      'punto_origen_y'  => 'Number',
      'estructura_id'   => 'ForeignKey',
      'estructura_list' => 'ManyKey',
    );
  }
}
