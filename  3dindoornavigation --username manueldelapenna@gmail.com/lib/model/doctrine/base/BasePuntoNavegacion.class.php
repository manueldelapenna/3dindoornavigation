<?php

/**
 * BasePuntoNavegacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $nombre
 * @property integer $punto_origen_x
 * @property integer $punto_origen_y
 * @property integer $estructura_id
 * @property Doctrine_Collection $Estructura
 * @property Doctrine_Collection $PuntoNavegacion
 * 
 * @method string              getNombre()          Returns the current record's "nombre" value
 * @method integer             getPuntoOrigenX()    Returns the current record's "punto_origen_x" value
 * @method integer             getPuntoOrigenY()    Returns the current record's "punto_origen_y" value
 * @method integer             getEstructuraId()    Returns the current record's "estructura_id" value
 * @method Doctrine_Collection getEstructura()      Returns the current record's "Estructura" collection
 * @method Doctrine_Collection getPuntoNavegacion() Returns the current record's "PuntoNavegacion" collection
 * @method PuntoNavegacion     setNombre()          Sets the current record's "nombre" value
 * @method PuntoNavegacion     setPuntoOrigenX()    Sets the current record's "punto_origen_x" value
 * @method PuntoNavegacion     setPuntoOrigenY()    Sets the current record's "punto_origen_y" value
 * @method PuntoNavegacion     setEstructuraId()    Sets the current record's "estructura_id" value
 * @method PuntoNavegacion     setEstructura()      Sets the current record's "Estructura" collection
 * @method PuntoNavegacion     setPuntoNavegacion() Sets the current record's "PuntoNavegacion" collection
 * 
 * @package    tesis-recargada
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePuntoNavegacion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('punto_navegacion');
        $this->hasColumn('nombre', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
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
             'onDelete' => 'restrict'));

        $this->hasMany('PuntoNavegacion', array(
             'refClass' => 'PuntoNavegacionPuntoNavegacion',
             'local' => 'punto_navegacion_1_id',
             'foreign' => 'punto_navegacion_2_id',
             'equal' => true));
    }
}