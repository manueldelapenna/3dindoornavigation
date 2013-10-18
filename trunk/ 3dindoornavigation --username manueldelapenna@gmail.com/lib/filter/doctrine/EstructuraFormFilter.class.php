<?php

/**
 * Estructura filter form.
 *
 * @package    tesis-recargada
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EstructuraFormFilter extends BaseEstructuraFormFilter
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
        'required' => false
    )));    
    
    $this->setWidget('es_navegable', new sfWidgetFormChoice(array('choices' => array('' => 'Indistinto', 1 => 'Sí', 0 => 'No'))));
  }
  
  /**
   * Función que hace una consulta para filtrar por fecha de la liquidación DESDE
   * @param Doctrine_Query $query
   * @param Array $field
   * @param Date $values 
   */    
  public function addTipoColumnQuery(Doctrine_Query $query, $field, $values){
    $query->addWhere($query->getRootAlias().'.tipo = ?',$values);              
  }

  public function getFields() {
  	return array_merge(parent::getFields(), array(
        'tipo' => 'Number'));
  }
  
}
