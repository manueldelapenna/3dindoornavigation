<?php

class Dijkstra {

  const valor_maximo = '9999999';
  public $lista_de_adyacencias = array();
  public $cantidad_nodos;
  public $camino_a_recorrer = array(); 

  public $distancia = array();  
  public $camino = array();

  /*
   * carga la lista de adyacencia con todos los puntos de navegacion,
   * y para cada uno agrega un arreglo.
   * Con sus vecinos y su distancia a ellos. Ejemplo.
   * 0 =>
    array
      0 =>
        array
          'punto_navegacion_1_id' => string '1' (length=1)
          'punto_navegacion_2_id' => string '2' (length=1)
          'distancia' => string '200.00' (length=6)
   */
  
  public function getCamino(){
    return $this->camino_a_recorrer;
  }
  
  public function cargarListaDeAdyacencia(){

    $puntos_navegacion = Doctrine::getTable('PuntoNavegacion')->findAll();
    foreach ($puntos_navegacion as $pd){
      $this->lista_de_adyacencias[] = $pd;
    }

    for ($i=0;$i<count($this->lista_de_adyacencias);$i++){        
      $this->lista_de_adyacencias[$i] = 
       PuntoNavegacionPuntoNavegacionTable::retrieveById($this->lista_de_adyacencias[$i]->getId());     
    }

    $this->cantidad_nodos = count($this->lista_de_adyacencias);
  }

  /*
   * Retorna la distancia entre un nodo A a uno B si es que tienen relacion directa (son vecinos)
   */
  public function obtenerDistanciasDesdeHasta($global_id_a,$global_id_b){
    foreach ($this->lista_de_adyacencias[$global_id_a - 1] as $nodo){        
      if ($nodo['punto_navegacion_1_id'] == $global_id_b)
        return $nodo['distancia'];
      if ($nodo['punto_navegacion_2_id'] == $global_id_b)
        return $nodo['distancia'];
    }
    return -1;    
  }

  public function caminoMinimoDesdeHasta($global_id_inicio, $id_destino){    
    $distancia = array();
    $visitado = array();
    $camino = array();
    
    for ($i=0; $i < $this->cantidad_nodos ; $i++) {
      $visitado[$i] = false;
      $distancia[$i] = '9999999' ;//$this->valor_maximo;
      $camino[$i] = -1;
    }
    $distancia[ $global_id_inicio -1 ] = 0;

    while (!$this->noEstenTodosVisitados($visitado)){      
      $nodo_actual = $this->getMenorDesconocido($visitado,$distancia);
      $visitado[$nodo_actual] = true;      
      foreach ($this->lista_de_adyacencias[$nodo_actual] as $vecinos){
        if (($nodo_actual+1) == $vecinos['punto_navegacion_1_id'])
          $vecino_id = $vecinos['punto_navegacion_2_id'];
        else
          $vecino_id = $vecinos['punto_navegacion_1_id'];
        
        $vecino_id --;
        //Actualizo la distancia si es menor a la del nodo actual mas la que tengo
        if ((!$visitado[$vecino_id]) && ($distancia[$vecino_id] > $distancia[$nodo_actual] + $vecinos['distancia'])){
          $distancia[$vecino_id] = $distancia[$nodo_actual] + $vecinos['distancia'];
          $camino[$vecino_id] = $nodo_actual;
        }           
      }//End Foreach
    }//End While
    
    $this->camino = $camino;
    $this->distancia = $distancia;
    $this->camino_a_recorrer =$this->imprimirCamino($id_destino, $camino, $distancia);
  }

  public function getMenorDesconocido($visitados,$distancias){
    $min_pos = -1;
    $min = '99999';// $this->valor_maximo;
    for ($i=0 ; $i < $this->cantidad_nodos ; $i++) {
      if (($distancias[$i] < $min) && (!$visitados[$i])){
        $min = $distancias[$i];
        $min_pos = $i;        
      }
    }
    return $min_pos;
  }

  public function noEstenTodosVisitados($visitados){
    for ($i=0;$i < $this->cantidad_nodos;$i++) {
      if ($visitados[$i] == false)
        return false;
    }
    return true;
  }


  public function imprimirCamino($destino, $camino, $distancias){
    //echo "-- IMPRESION DEL CAMINO -- <br><br>";  //
    $nodoActual = $destino-1 ;
    $nodosARecorrer = array();
    $nodosARecorrer[] = Doctrine::getTable('PuntoNavegacion')->find($destino);
    while( $camino[$nodoActual] != '-1')
    {
       // echo "Soy el nodo= ".$nodoActual."+1 y para llegar a mi recorrieron = ".$distancias[$nodoActual]." metros <br>";
        $nodoActual = $camino[$nodoActual];
        $nodosARecorrer[] = Doctrine::getTable('PuntoNavegacion')->find($nodoActual+1);
    }
    //echo "Soy el nodo= ".$nodoActual."+1 y para llegar a mi recorrieron = ".$distancias[$nodoActual]." metros <br>";
    //die(var_dump($nodosARecorrer));
    
    return $nodosARecorrer;
    
 }

  public function getIdsNodosCamino($destino ){

    $camino = $this->camino;
    $distancias = $this->distancia;
    #$this->imprimirCamino($destino, $camino, $distancias);
    return $this->imprimirCamino($destino, $camino, $distancias);
    //die();
    
    $nodosARecorrer = array();
    
    //echo "-- IMPRESION DEL CAMINO -- <br><br>";  //
    $nodoActual = $destino-1 ;
    while( $camino[$nodoActual] != '-1')
    {
        //echo "Soy el nodo= ".$nodoActual."+1 y para llegar a mi recorrieron = ".$distancias[$nodoActual]." metros <br>";
        $nodosARecorrer[] = $nodoActual+1;
        $nodoActual = $camino[$nodoActual];
    }
    $nodosARecorrer[] = $nodoActual+1;
    return $nodosARecorrer;
   //echo "Soy el nodo= ".$nodoActual."+1 y para llegar a mi recorrieron = ".$distancias[$nodoActual]." metros <br>";
  }

}
?>
