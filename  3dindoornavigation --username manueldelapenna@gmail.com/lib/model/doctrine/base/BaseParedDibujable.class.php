<?php

/**
 * BaseParedDibujable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $punto_1_id
 * @property integer $punto_2_id
 * @property string $link_imagen
 * @property string $descripcion
 * @property integer $orientacion_pared_id
 * @property OrientacionPared $OrientacionPared
 * @property Puntos $Punto1
 * @property Puntos $Punto2
 * 
 * @method integer          getPunto1Id()             Returns the current record's "punto_1_id" value
 * @method integer          getPunto2Id()             Returns the current record's "punto_2_id" value
 * @method string           getLinkImagen()           Returns the current record's "link_imagen" value
 * @method string           getDescripcion()          Returns the current record's "descripcion" value
 * @method integer          getOrientacionParedId()   Returns the current record's "orientacion_pared_id" value
 * @method OrientacionPared getOrientacionPared()     Returns the current record's "OrientacionPared" value
 * @method Puntos           getPunto1()               Returns the current record's "Punto1" value
 * @method Puntos           getPunto2()               Returns the current record's "Punto2" value
 * @method ParedDibujable   setPunto1Id()             Sets the current record's "punto_1_id" value
 * @method ParedDibujable   setPunto2Id()             Sets the current record's "punto_2_id" value
 * @method ParedDibujable   setLinkImagen()           Sets the current record's "link_imagen" value
 * @method ParedDibujable   setDescripcion()          Sets the current record's "descripcion" value
 * @method ParedDibujable   setOrientacionParedId()   Sets the current record's "orientacion_pared_id" value
 * @method ParedDibujable   setOrientacionPared()     Sets the current record's "OrientacionPared" value
 * @method ParedDibujable   setPunto1()               Sets the current record's "Punto1" value
 * @method ParedDibujable   setPunto2()               Sets the current record's "Punto2" value
 * 
 * @package    tesis-recargada
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseParedDibujable extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('pared_dibujable');
        $this->hasColumn('punto_1_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('punto_2_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('link_imagen', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('descripcion', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('orientacion_pared_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('OrientacionPared', array(
             'local' => 'orientacion_pared_id',
             'foreign' => 'id',
             'onDelete' => 'restrict'));

        $this->hasOne('Puntos as Punto1', array(
             'local' => 'punto_1_id',
             'foreign' => 'id',
             'onDelete' => 'restrict'));

        $this->hasOne('Puntos as Punto2', array(
             'local' => 'punto_2_id',
             'foreign' => 'id',
             'onDelete' => 'restrict'));
    }
}