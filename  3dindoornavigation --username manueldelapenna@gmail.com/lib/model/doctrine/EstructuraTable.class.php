<?php

/**
 * EstructuraTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EstructuraTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object EstructuraTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Estructura');
    }
    
    public static function getNavegables($origen){
      $query = Doctrine_Query::create()->
              from('Estructura e')->
              where('e.es_navegable = 1')->
              andWhere("e.id <> $origen")->
              orderBy('e.nombre');
      
      return $query->execute();              
    }
    
    public static function getPuntoNavegacion($idEstructura){
      $query = Doctrine_Query::create()->
              from('PuntoNavegacion p')->
              where('p.estructura_id =?',$idEstructura);
      
      return $query->execute()->getFirst();              
    }
    

}