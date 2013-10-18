<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstructuraType
 *
 * @author Claudio Borré
 */
class EstructuraType extends BaseCustomOptionsHolder
{
  const
    Navegable            = 1,
    No_Navegable         = 2,
    Pared                = 3;
  
  protected
    $_options = array(
        self::Navegable => 'Estructura Navegable',
        self::No_Navegable => 'Estructura No-Navegable',
        self::Pared => 'Pared'        
       );
}
?>
