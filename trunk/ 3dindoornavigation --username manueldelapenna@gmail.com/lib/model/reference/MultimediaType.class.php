<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MultimediaType
 *
 * @author Claudio Borré
 */
class MultimediaType extends BaseCustomOptionsHolder
{
  const
    photo   = 1,
    video   = 2,
    audio   = 3,
    audio_video = 4;
  
  protected
    $_options = array(
        self::photo => 'Foto',
        self::video  => 'Video',
        self::audio => 'Audio',        
        self::audio_video => 'Audio/Video',
       );
}
?>
