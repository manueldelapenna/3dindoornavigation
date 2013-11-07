<?php

/**
 * PuntoNavegacionTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PuntoNavegacionTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object PuntoNavegacionTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PuntoNavegacion');
    }
    
    public static function getPuntoNavegacionParaEstructuraId($estructura_id){
      $query = Doctrine_Query::create()->
              from('PuntoNavegacion pn')->
              where('pn.estructura_id = ?',$estructura_id);
      
      return $query->fetchOne();
    }
    
    public static function getPuntoNavegacionXPara($punto_navegacion_id){
      $query = Doctrine_Query::create()->
              from('PuntoNavegacion pn')->
              where('pn.id = ?',$punto_navegacion_id);
      
      return $query->fetchOne()->getPuntoOrigenX();      
    }
    
    public static function getPuntoNavegacionYPara($punto_navegacion_id){
      $query = Doctrine_Query::create()->
              from('PuntoNavegacion pn')->
              where('pn.id = ?',$punto_navegacion_id);
      
      return $query->fetchOne()->getPuntoOrigenY();      
    }
    
      public static function getPuntoDeNavegacionAPartirDeEstructura($estructuraId){
      $query = Doctrine_Query::create()->
              from('PuntoNavegacion pn')->
              where("pn.estructura_id = $estructuraId");              
      
      return $query->execute();              
    }
}
