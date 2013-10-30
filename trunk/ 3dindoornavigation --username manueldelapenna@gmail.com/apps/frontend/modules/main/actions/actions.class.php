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
   * Función para persitir todos los objetos necesarios en la base de datos
   * @param sfWebRequest $request 
   */  
  public function executeCrearEstructuras(sfWebRequest $request){
    $crear_objectos = new Utilities();
    $crear_objectos->crearObjetos();
    $this->getUser()->setFlash('notice','Estructuras creadas satisfactoriamente.');
    $this->redirect('@homepage');       
  }   
    
  /**
   * Función que permite navegar desde un punto de la facultad (situado por una aplicación externa) a otro seleccionado por el usuario
   * @param sfWebRequest $request 
   */
  public function executeNavegar(sfWebRequest $request){     
    //Se setea en el usuario el id de la estructura a donde el usuario desea navegar        
    $this->getUser()->setAttribute('fin_id',$request->getParameter('est_id'));
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
  } 
 
  /**
   * Función que dibuja el template Busqueda
   * @param sfWebRequest $request 
   */  
  public function executeBuscar(sfWebRequest $request){
    //En actual ID se seteará el parámetro que vendrá del código de barra.
    $this->getUser()->setAttribute('actual_id',1);
    $this->getUser()->setAttribute('borrados', array());
    $this->getUser()->setAttribute('escala',sfConfig::get('app_escala'));
    $this->estructuras = EstructuraTable::getNavegables(); 
  }  

  /**
   * Acción que es ejecutada por el usuario en el template navegar cuando el usuario realizar un,
   * click sobre alguna estructura
   * @param sfWebRequest $request 
   */
  public function executeDetalleEstructura(sfWebRequest $request){    
    $this->destino = 
      Doctrine::getTable('PuntoNavegacion')->find($request->getParameter('idDestino'))->getEstructuraId();
    $this->estructura = 
      Doctrine::getTable('Estructura')->find($request->getParameter('idEstructura'));    
    $this->multimedia = 
      MultimediaTable::getMultimediaPara($request->getParameter('idEstructura'));
  }
  
  /**
   * Acción que es ejecutada por el usuario en el template navegar cuando el usuario ejecuta la acción "Avanzar"
   * @param sfWebRequest $request 
   */
  public function executeAdelantar(sfWebRequest $request){    
    $borrados = $this->getUser()->getAttribute('borrados');        
    $borrados[] = $this->getUser()->getAttribute('actual_id');    
    $this->getUser()->setAttribute('borrados',$borrados);
    $this->getUser()->setAttribute('actual_id',$this->getUser()->getAttribute('siguiente_id'));
    $this->redirect('main/navegar?est_id='.$this->getUser()->getAttribute('fin_id'));
  }

  /**
   * Acción que es ejecutada por el usuario en el template navegar cuando el usuario ejecuta la acción "Retroceder"
   * @param sfWebRequest $request 
   */
  public function executeRetroceder(sfWebRequest $request){
    $borrados = $this->getUser()->getAttribute('borrados');        
    $ultimo_elemento = $borrados[count($borrados)-1];
    $this->getUser()->setAttribute('actual_id',$ultimo_elemento);
    array_pop($borrados);
    $this->getUser()->setAttribute('borrados',$borrados);    
    $this->redirect('main/navegar?est_id='.$this->getUser()->getAttribute('fin_id'));    
  }
  
  /**
   * Acción que es llamada por el usuario desde el template detalleEstructura que permite cambiar de dirección en el caso de solicitarlo el usuario
   * @param sfWebRequest $request 
   */  
  public function executeNavegarHacia(sfWebRequest $request){
    //Se inicializa el arreglo de borrados
    $this->getUser()->setAttribute('borrados', array());    
    //Se redirige al navegar con los nuevos parámetros seteados
    $this->redirect('main/navegar?est_id='.$request->getParameter('est_id'));        
  }
  
  /**
   * Acción que es ejecutada por el usuario en el template navegar cuando el usuario ejecuta la acción "Zoom In"
   * @param sfWebRequest $request 
   */
  public function executeZoomIn(sfWebRequest $request){
    //Se resta uno a la escala actual
    $this->getUser()->setAttribute('escala', $this->getUser()->getAttribute('escala')-1);
    //Se redirige al navegar con los nuevos parámetros seteados       
    $this->redirect('main/navegar?est_id='.$this->getUser()->getAttribute('fin_id'));        
  }
  
  /**
   * Acción que es ejecutada por el usuario en el template navegar cuando el usuario ejecuta la acción "Zoom Out"
   * @param sfWebRequest $request 
   */
  public function executeZoomOut(sfWebRequest $request){
    //Se resta uno a la escala actual
    $this->getUser()->setAttribute('escala', $this->getUser()->getAttribute('escala')+1);
    //Se redirige al navegar con los nuevos parámetros seteados       
    $this->redirect('main/navegar?est_id='.$this->getUser()->getAttribute('fin_id'));    
  }  
}
