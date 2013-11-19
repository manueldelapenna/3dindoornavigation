<?php

/**
 * main actions.
 *
 * @package    tesis-recargada
 * @subpackage main
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions
{  
  /**
   * Función que permite navegar desde un punto de la facultad (situado por una aplicación externa) a otro seleccionado por el usuario
   * @param sfWebRequest $request 
   */
  public function executeNavegar(sfWebRequest $request){     
    //Se setea en el usuario el id de la estructura a donde el usuario desea navegar        
    $this->getUser()->setAttribute('fin_id',$request->getParameter('est_id'));
    
    if ($this->getUser()->getAttribute('fin_id') == $this->getUser()->getAttribute('origen_id')){
        $this->getUser()->setFlash('notice','Ud. se encuentra parado en el mismo lugar al que desea llegar. Por favor seleccione un nuevo destino');
        $this->getUser()->setAttribute('fin_id', null);
        $this->redirect('main/buscar?id_estructura_origen='.$this->getUser()->getAttribute('origen_id'));
    }
    
    $this->estructuras = Doctrine::getTable('Estructura')->findAll();
    $this->puntos_todas_paredes = Doctrine::getTable('Puntos')->findAll();
    $this->paredes_dibujables = Doctrine::getTable('ParedDibujable')->findAll();
    $d = new Dijkstra();
    $d->cargarListaDeAdyacencia();

    $estructura = Doctrine::getTable('Estructura')->find($request->getParameter('est_id'));
      
    if ((!$estructura) || (!$estructura->getEsNavegable())){
      $this->getUser()->setFlash('error','El lugar a donde intenta navegar no está disponible.');
      $this->redirect('@homepage');
    }    
    
    //Relative URL Ej: http://localhost/indoor-navigation
    $this->basepath = ('http'.($request->isSecure() ? 's' : '').'://').
                        $request->getHost().$request->getRelativeUrlRoot();
    //Si es Producción index.php sino frontend_dev.php    
    $this->enviroment = (sfConfig::get('sf_environment') == 'dev' ? 'frontend_dev.php' : 'index.php');
    
    $punto_navegacion = PuntoNavegacionTable::getPuntoNavegacionParaEstructuraId($estructura->getId()); 
    $this->destino = $punto_navegacion->getId();
    $d->caminoMinimoDesdeHasta($this->getUser()->getAttribute('actual_id'), $this->destino);    
    $this->puntos_navegacion = $d->getCamino();  
    //var_dump($this->puntos_navegacion); die;
  } 
  
  /**
   * Función que dibuja el template Origen
   * @param sfWebRequest $request 
   */  
  public function executeOrigen(sfWebRequest $request){
    //En actual ID se seteará el parámetro que vendrá del código de barra.
    $this->estructuras = EstructuraTable::getNavegables(); 
  }
  
  /**
   * Función que dibuja el template Busqueda
   * @param sfWebRequest $request 
   */  
  public function executeBuscar(sfWebRequest $request){
    
    $estructuraOrigenId = $request->getParameter('id_estructura_origen');
    $puntoNavegacionOrigen = PuntoNavegacionTable::getPuntoDeNavegacionAPartirDeEstructura($estructuraOrigenId)->getFirst();
    $this->getUser()->setAttribute('origen_id',$estructuraOrigenId);
    $this->getUser()->setAttribute('actual_id',$puntoNavegacionOrigen->getId());
    $this->getUser()->setAttribute('borrados', array());
    $this->getUser()->setAttribute('escala',sfConfig::get('app_escala'));
    $this->estructuras = EstructuraTable::getNavegables($estructuraOrigenId); 
    
    //si tiene un destino de una busqueda anterior lo guarda
    $this->destino = $this->getUser()->getAttribute('fin_id'); 
    $this->estructura = Doctrine::getTable('Estructura')->find($this->destino);
    

  }  

  /**
   * Acción que es ejecutada por el usuario en el template navegar cuando el usuario realizar un,
   * click sobre alguna estructura
   * @param sfWebRequest $request 
   */
  public function executeDetalleEstructura(sfWebRequest $request){    
    $this->destino = 
      Doctrine::getTable('PuntoNavegacion')->find($request->getParameter('idEstructura'));
    $this->estructura = 
      Doctrine::getTable('Estructura')->find($request->getParameter('idEstructura'));    
    $this->multimedia = 
      MultimediaTable::getMultimediaPara($request->getParameter('idEstructura'));
    $this->getUser()->setAttribute('fin_id', null);
  }
}
