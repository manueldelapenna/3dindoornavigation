<?php

/**
 * BasePuntos
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $punto_origen_x
 * @property integer $punto_origen_y
 * @property integer $estructura_id
 * @property Doctrine_Collection $Estructura
 * 
 * @method integer             getPuntoOrigenX()   Returns the current record's "punto_origen_x" value
 * @method integer             getPuntoOrigenY()   Returns the current record's "punto_origen_y" value
 * @method integer             getEstructuraId()   Returns the current record's "estructura_id" value
 * @method Doctrine_Collection getEstructura()     Returns the current record's "Estructura" collection
 * @method Puntos              setPuntoOrigenX()   Sets the current record's "punto_origen_x" value
 * @method Puntos              setPuntoOrigenY()   Sets the current record's "punto_origen_y" value
 * @method Puntos              setEstructuraId()   Sets the current record's "estructura_id" value
 * @method Puntos              setEstructura()     Sets the current record's "Estructura" collection
 * 
 * @package    tesis-recargada
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePuntos extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('puntos');
        $this->hasColumn('punto_origen_x', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('punto_origen_y', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('estructura_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Estructura', array(
             'refClass' => 'Estructura',
             'local' => 'estructura_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));
    }
}