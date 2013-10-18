<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilities
 *
 * @author luciano
 */
class Utilities {

    public function crearObjetos() {
        /**
         * En está primera parte se instancia la facultad que será el contenedor de los demás objetos
         */
        $facultad = new Estructura();
        $facultad->setNombre('Facultad de Informática');
        $facultad->setCapacidad(1000);
        $facultad->setTipo(EstructuraType::No_Navegable);
        $facultad->setEsNavegable(false);
        $facultad->save();

        $facu_punto_1 = new Puntos();
        $facu_punto_1->setPuntoOrigenX('0');
        $facu_punto_1->setPuntoOrigenY('0');
        $facu_punto_1->setEstructuraId($facultad->getId());
        $facu_punto_1->save();

        $facu_punto_2 = new Puntos();
        $facu_punto_2->setPuntoOrigenX('1650');
        $facu_punto_2->setPuntoOrigenY('0');
        $facu_punto_2->setEstructuraId($facultad->getId());
        $facu_punto_2->save();

        $facu_punto_3 = new Puntos();
        $facu_punto_3->setPuntoOrigenX('1650');
        $facu_punto_3->setPuntoOrigenY('100');
        $facu_punto_3->setEstructuraId($facultad->getId());
        $facu_punto_3->save();

        $facu_punto_4 = new Puntos();
        $facu_punto_4->setPuntoOrigenX('2990');
        $facu_punto_4->setPuntoOrigenY('100');
        $facu_punto_4->setEstructuraId($facultad->getId());
        $facu_punto_4->save();

        $facu_punto_5 = new Puntos();
        $facu_punto_5->setPuntoOrigenX('3085');
        $facu_punto_5->setPuntoOrigenY('270');
        $facu_punto_5->setEstructuraId($facultad->getId());
        $facu_punto_5->save();

        $facu_punto_6 = new Puntos();
        $facu_punto_6->setPuntoOrigenX('4140');
        $facu_punto_6->setPuntoOrigenY('270');
        $facu_punto_6->setEstructuraId($facultad->getId());
        $facu_punto_6->save();

        $facu_punto_7 = new Puntos();
        $facu_punto_7->setPuntoOrigenX('4140');
        $facu_punto_7->setPuntoOrigenY('350');
        $facu_punto_7->setEstructuraId($facultad->getId());
        $facu_punto_7->save();

        $facu_punto_8 = new Puntos();
        $facu_punto_8->setPuntoOrigenX('4680');
        $facu_punto_8->setPuntoOrigenY('1350');
        $facu_punto_8->setEstructuraId($facultad->getId());
        $facu_punto_8->save();

        $facu_punto_9 = new Puntos();
        $facu_punto_9->setPuntoOrigenX('4610');
        $facu_punto_9->setPuntoOrigenY('1380');
        $facu_punto_9->setEstructuraId($facultad->getId());
        $facu_punto_9->save();

        $facu_punto_10 = new Puntos();
        $facu_punto_10->setPuntoOrigenX('4780');
        $facu_punto_10->setPuntoOrigenY('1680');
        $facu_punto_10->setEstructuraId($facultad->getId());
        $facu_punto_10->save();

        $facu_punto_11 = new Puntos();
        $facu_punto_11->setPuntoOrigenX('1490');
        $facu_punto_11->setPuntoOrigenY('3480');
        $facu_punto_11->setEstructuraId($facultad->getId());
        $facu_punto_11->save();

        $facu_punto_12 = new Puntos();
        $facu_punto_12->setPuntoOrigenX('1100');
        $facu_punto_12->setPuntoOrigenY('2780');
        $facu_punto_12->setEstructuraId($facultad->getId());
        $facu_punto_12->save();

        $facu_punto_13 = new Puntos();
        $facu_punto_13->setPuntoOrigenX('1510');
        $facu_punto_13->setPuntoOrigenY('2560');
        $facu_punto_13->setEstructuraId($facultad->getId());
        $facu_punto_13->save();

        $facu_punto_14 = new Puntos();
        $facu_punto_14->setPuntoOrigenX('910');
        $facu_punto_14->setPuntoOrigenY('1480');
        $facu_punto_14->setEstructuraId($facultad->getId());
        $facu_punto_14->save();

        $facu_punto_15 = new Puntos();
        $facu_punto_15->setPuntoOrigenX('1710');
        $facu_punto_15->setPuntoOrigenY('1050');
        $facu_punto_15->setEstructuraId($facultad->getId());
        $facu_punto_15->save();

        $facu_punto_16 = new Puntos();
        $facu_punto_16->setPuntoOrigenX('2300');
        $facu_punto_16->setPuntoOrigenY('2150');
        $facu_punto_16->setEstructuraId($facultad->getId());
        $facu_punto_16->save();

        $facu_punto_17 = new Puntos();
        $facu_punto_17->setPuntoOrigenX('3650');
        $facu_punto_17->setPuntoOrigenY('1400');
        $facu_punto_17->setEstructuraId($facultad->getId());
        $facu_punto_17->save();

        $facu_punto_18 = new Puntos();
        $facu_punto_18->setPuntoOrigenX('3550');
        $facu_punto_18->setPuntoOrigenY('1220');
        $facu_punto_18->setEstructuraId($facultad->getId());
        $facu_punto_18->save();

        $facu_punto_19 = new Puntos();
        $facu_punto_19->setPuntoOrigenX('2890');
        $facu_punto_19->setPuntoOrigenY('1640');
        $facu_punto_19->setEstructuraId($facultad->getId());
        $facu_punto_19->save();

        $facu_punto_20 = new Puntos();
        $facu_punto_20->setPuntoOrigenX('2430');
        $facu_punto_20->setPuntoOrigenY('810');
        $facu_punto_20->setEstructuraId($facultad->getId());
        $facu_punto_20->save();

        $facu_punto_21 = new Puntos();
        $facu_punto_21->setPuntoOrigenX('3330');
        $facu_punto_21->setPuntoOrigenY('810');
        $facu_punto_21->setEstructuraId($facultad->getId());
        $facu_punto_21->save();

        $facu_punto_22 = new Puntos();
        $facu_punto_22->setPuntoOrigenX('3270');
        $facu_punto_22->setPuntoOrigenY('600');
        $facu_punto_22->setEstructuraId($facultad->getId());
        $facu_punto_22->save();

        $facu_punto_23 = new Puntos();
        $facu_punto_23->setPuntoOrigenX('600');
        $facu_punto_23->setPuntoOrigenY('600');
        $facu_punto_23->setEstructuraId($facultad->getId());
        $facu_punto_23->save();

        $facu_punto_24 = new Puntos();
        $facu_punto_24->setPuntoOrigenX('600');
        $facu_punto_24->setPuntoOrigenY('350');
        $facu_punto_24->setEstructuraId($facultad->getId());
        $facu_punto_24->save();

        $facu_punto_25 = new Puntos();
        $facu_punto_25->setPuntoOrigenX('300');
        $facu_punto_25->setPuntoOrigenY('350');
        $facu_punto_25->setEstructuraId($facultad->getId());
        $facu_punto_25->save();

        $facu_punto_26 = new Puntos();
        $facu_punto_26->setPuntoOrigenX('300');
        $facu_punto_26->setPuntoOrigenY('600');
        $facu_punto_26->setEstructuraId($facultad->getId());
        $facu_punto_26->save();

        $facu_punto_27 = new Puntos();
        $facu_punto_27->setPuntoOrigenX('0');
        $facu_punto_27->setPuntoOrigenY('600');
        $facu_punto_27->setEstructuraId($facultad->getId());
        $facu_punto_27->save();

        /**
         * Dibujando las AULAS
         */
        //Pared de afuera al lado del consultorio médico
        $aula_a = new Estructura();
        $aula_a->setNombre('Pared de afuera');
        $aula_a->setCapacidad(0);
        $aula_a->setTipo(EstructuraType::Pared);
        $aula_a->setEsNavegable(false);
        $aula_a->save();

        $aula_a_punto_1 = new Puntos();
        $aula_a_punto_1->setPuntoOrigenX('0');
        $aula_a_punto_1->setPuntoOrigenY('0');
        $aula_a_punto_1->setEstructuraId($aula_a->getId());
        $aula_a_punto_1->save();

        $aula_a_punto_2 = new Puntos();
        $aula_a_punto_2->setPuntoOrigenX('300');
        $aula_a_punto_2->setPuntoOrigenY('0');
        $aula_a_punto_2->setEstructuraId($aula_a->getId());
        $aula_a_punto_2->save();

        $aula_a_punto_3 = new Puntos();
        $aula_a_punto_3->setPuntoOrigenX('300');
        $aula_a_punto_3->setPuntoOrigenY('600');
        $aula_a_punto_3->setEstructuraId($aula_a->getId());
        $aula_a_punto_3->save();

        $aula_a_punto_4 = new Puntos();
        $aula_a_punto_4->setPuntoOrigenX('0');
        $aula_a_punto_4->setPuntoOrigenY('600');
        $aula_a_punto_4->setEstructuraId($aula_a->getId());
        $aula_a_punto_4->save();

        //Consultorio Médico
        $aula_b = new Estructura();
        $aula_b->setNombre('Consultorio Médico');
        $aula_b->setCapacidad(10);
        $aula_b->setTipo(EstructuraType::Navegable);
        $aula_b->setEsNavegable(true);        
        $aula_b->save();

        $aula_b_punto_1 = new Puntos();
        $aula_b_punto_1->setPuntoOrigenX('300');
        $aula_b_punto_1->setPuntoOrigenY('0');
        $aula_b_punto_1->setEstructuraId($aula_b->getId());
        $aula_b_punto_1->save();

        $aula_b_punto_2 = new Puntos();
        $aula_b_punto_2->setPuntoOrigenX('600');
        $aula_b_punto_2->setPuntoOrigenY('0');
        $aula_b_punto_2->setEstructuraId($aula_b->getId());
        $aula_b_punto_2->save();

        $aula_b_punto_3 = new Puntos();
        $aula_b_punto_3->setPuntoOrigenX('600');
        $aula_b_punto_3->setPuntoOrigenY('450');
        $aula_b_punto_3->setEstructuraId($aula_b->getId());
        $aula_b_punto_3->save();

        $aula_b_punto_4 = new Puntos();
        $aula_b_punto_4->setPuntoOrigenX('300');
        $aula_b_punto_4->setPuntoOrigenY('450');
        $aula_b_punto_4->setEstructuraId($aula_b->getId());
        $aula_b_punto_4->save();

        //Escalera 3 (Al lado del área contable)E
        $aula_c = new Estructura();
        $aula_c->setNombre('Pared al lado de Económico Financiera');
        $aula_c->setCapacidad(0);
        $aula_c->setTipo(EstructuraType::Pared);
        $aula_c->setEsNavegable(false);        
        $aula_c->save();

        $aula_c_punto_1 = new Puntos();
        $aula_c_punto_1->setPuntoOrigenX('600');
        $aula_c_punto_1->setPuntoOrigenY('0');
        $aula_c_punto_1->setEstructuraId($aula_c->getId());
        $aula_c_punto_1->save();

        $aula_c_punto_2 = new Puntos();
        $aula_c_punto_2->setPuntoOrigenX('1050');
        $aula_c_punto_2->setPuntoOrigenY('0');
        $aula_c_punto_2->setEstructuraId($aula_c->getId());
        $aula_c_punto_2->save();

        $aula_c_punto_3 = new Puntos();
        $aula_c_punto_3->setPuntoOrigenX('1050');
        $aula_c_punto_3->setPuntoOrigenY('300');
        $aula_c_punto_3->setEstructuraId($aula_c->getId());
        $aula_c_punto_3->save();

        $aula_c_punto_4 = new Puntos();
        $aula_c_punto_4->setPuntoOrigenX('600');
        $aula_c_punto_4->setPuntoOrigenY('300');
        $aula_c_punto_4->setEstructuraId($aula_c->getId());
        $aula_c_punto_4->save();

        //Área económico financiera
        $area_econo_fin = new Estructura();
        $area_econo_fin->setNombre('Área Económico Financiera');
        $area_econo_fin->setCapacidad(15);
        $area_econo_fin->setTipo(EstructuraType::Navegable);
        $area_econo_fin->setEsNavegable(true);                
        $area_econo_fin->save();

        $area_econo_fin_punto_1 = new Puntos();
        $area_econo_fin_punto_1->setPuntoOrigenX('1050');
        $area_econo_fin_punto_1->setPuntoOrigenY('0');
        $area_econo_fin_punto_1->setEstructuraId($area_econo_fin->getId());
        $area_econo_fin_punto_1->save();

        $area_econo_fin_punto_2 = new Puntos();
        $area_econo_fin_punto_2->setPuntoOrigenX('1650');
        $area_econo_fin_punto_2->setPuntoOrigenY('0');
        $area_econo_fin_punto_2->setEstructuraId($area_econo_fin->getId());
        $area_econo_fin_punto_2->save();

        $area_econo_fin_punto_3 = new Puntos();
        $area_econo_fin_punto_3->setPuntoOrigenX('1650');
        $area_econo_fin_punto_3->setPuntoOrigenY('450');
        $area_econo_fin_punto_3->setEstructuraId($area_econo_fin->getId());
        $area_econo_fin_punto_3->save();

        $area_econo_fin_punto_4 = new Puntos();
        $area_econo_fin_punto_4->setPuntoOrigenX('1050');
        $area_econo_fin_punto_4->setPuntoOrigenY('450');
        $area_econo_fin_punto_4->setEstructuraId($area_econo_fin->getId());
        $area_econo_fin_punto_4->save();

        //Secretaria Administrativa
        $aula_d = new Estructura();
        $aula_d->setNombre('Secretaria Administrativa');
        $aula_d->setCapacidad(15);
        $aula_d->setTipo(EstructuraType::Navegable);
        $aula_d->setEsNavegable(true);                
        $aula_d->save();

        $aula_d_punto_1 = new Puntos();
        $aula_d_punto_1->setPuntoOrigenX('1650');
        $aula_d_punto_1->setPuntoOrigenY('100');
        $aula_d_punto_1->setEstructuraId($aula_d->getId());
        $aula_d_punto_1->save();

        $aula_d_punto_2 = new Puntos();
        $aula_d_punto_2->setPuntoOrigenX('1950');
        $aula_d_punto_2->setPuntoOrigenY('100');
        $aula_d_punto_2->setEstructuraId($aula_d->getId());
        $aula_d_punto_2->save();

        $aula_d_punto_3 = new Puntos();
        $aula_d_punto_3->setPuntoOrigenX('1950');
        $aula_d_punto_3->setPuntoOrigenY('450');
        $aula_d_punto_3->setEstructuraId($aula_d->getId());
        $aula_d_punto_3->save();

        $aula_d_punto_4 = new Puntos();
        $aula_d_punto_4->setPuntoOrigenX('1650');
        $aula_d_punto_4->setPuntoOrigenY('450');
        $aula_d_punto_4->setEstructuraId($aula_d->getId());
        $aula_d_punto_4->save();

        //Despacho
        $aula_e = new Estructura();
        $aula_e->setNombre('Despacho');
        $aula_e->setCapacidad(15);
        $aula_e->setTipo(EstructuraType::Navegable);
        $aula_e->setEsNavegable(true);                
        $aula_e->save();

        $aula_e_punto_1 = new Puntos();
        $aula_e_punto_1->setPuntoOrigenX('1950');
        $aula_e_punto_1->setPuntoOrigenY('100');
        $aula_e_punto_1->setEstructuraId($aula_e->getId());
        $aula_e_punto_1->save();

        $aula_e_punto_2 = new Puntos();
        $aula_e_punto_2->setPuntoOrigenX('2250');
        $aula_e_punto_2->setPuntoOrigenY('100');
        $aula_e_punto_2->setEstructuraId($aula_e->getId());
        $aula_e_punto_2->save();

        $aula_e_punto_3 = new Puntos();
        $aula_e_punto_3->setPuntoOrigenX('2250');
        $aula_e_punto_3->setPuntoOrigenY('450');
        $aula_e_punto_3->setEstructuraId($aula_e->getId());
        $aula_e_punto_3->save();

        $aula_e_punto_4 = new Puntos();
        $aula_e_punto_4->setPuntoOrigenX('1950');
        $aula_e_punto_4->setPuntoOrigenY('450');
        $aula_e_punto_4->setEstructuraId($aula_e->getId());
        $aula_e_punto_4->save();

        //Depto. Personal y Concursos
        $aula_f = new Estructura();
        $aula_f->setNombre('Depto. Personal y Concursos');
        $aula_f->setCapacidad(15);
        $aula_f->setTipo(EstructuraType::Navegable);
        $aula_f->setEsNavegable(true);                
        $aula_f->save();

        $aula_f_punto_1 = new Puntos();
        $aula_f_punto_1->setPuntoOrigenX('2250');
        $aula_f_punto_1->setPuntoOrigenY('100');
        $aula_f_punto_1->setEstructuraId($aula_f->getId());
        $aula_f_punto_1->save();

        $aula_f_punto_2 = new Puntos();
        $aula_f_punto_2->setPuntoOrigenX('2550');
        $aula_f_punto_2->setPuntoOrigenY('100');
        $aula_f_punto_2->setEstructuraId($aula_f->getId());
        $aula_f_punto_2->save();

        $aula_f_punto_3 = new Puntos();
        $aula_f_punto_3->setPuntoOrigenX('2550');
        $aula_f_punto_3->setPuntoOrigenY('350');
        $aula_f_punto_3->setEstructuraId($aula_f->getId());
        $aula_f_punto_3->save();

        $aula_f_punto_4 = new Puntos();
        $aula_f_punto_4->setPuntoOrigenX('2250');
        $aula_f_punto_4->setPuntoOrigenY('350');
        $aula_f_punto_4->setEstructuraId($aula_f->getId());
        $aula_f_punto_4->save();

        //Oficina de alumnos
        $aula_g = new Estructura();
        $aula_g->setNombre('Oficina de alumnos');
        $aula_g->setCapacidad(15);
        $aula_g->setTipo(EstructuraType::Navegable);
        $aula_g->setEsNavegable(true);                
        $aula_g->save();

        $aula_g_punto_1 = new Puntos();
        $aula_g_punto_1->setPuntoOrigenX('2550');
        $aula_g_punto_1->setPuntoOrigenY('100');
        $aula_g_punto_1->setEstructuraId($aula_g->getId());
        $aula_g_punto_1->save();

        $aula_g_punto_2 = new Puntos();
        $aula_g_punto_2->setPuntoOrigenX('2850');
        $aula_g_punto_2->setPuntoOrigenY('100');
        $aula_g_punto_2->setEstructuraId($aula_g->getId());
        $aula_g_punto_2->save();

        $aula_g_punto_3 = new Puntos();
        $aula_g_punto_3->setPuntoOrigenX('2850');
        $aula_g_punto_3->setPuntoOrigenY('350');
        $aula_g_punto_3->setEstructuraId($aula_g->getId());
        $aula_g_punto_3->save();

        $aula_g_punto_4 = new Puntos();
        $aula_g_punto_4->setPuntoOrigenX('2550');
        $aula_g_punto_4->setPuntoOrigenY('350');
        $aula_g_punto_4->setEstructuraId($aula_g->getId());
        $aula_g_punto_4->save();

        //MESA DE ENTRADAS
        $aula_h = new Estructura();
        $aula_h->setNombre('Oficina G');
        $aula_h->setCapacidad(15);
        $aula_h->setTipo(EstructuraType::Navegable);
        $aula_h->setEsNavegable(true);                
        $aula_h->save();

        $aula_h_punto_1 = new Puntos();
        $aula_h_punto_1->setPuntoOrigenX('2850');
        $aula_h_punto_1->setPuntoOrigenY('100');
        $aula_h_punto_1->setEstructuraId($aula_h->getId());
        $aula_h_punto_1->save();

        $aula_h_punto_2 = new Puntos();
        $aula_h_punto_2->setPuntoOrigenX('2990');
        $aula_h_punto_2->setPuntoOrigenY('100');
        $aula_h_punto_2->setEstructuraId($aula_h->getId());
        $aula_h_punto_2->save();

        $aula_h_punto_3 = new Puntos();
        $aula_h_punto_3->setPuntoOrigenX('2990');
        $aula_h_punto_3->setPuntoOrigenY('350');
        $aula_h_punto_3->setEstructuraId($aula_h->getId());
        $aula_h_punto_3->save();

        $aula_h_punto_4 = new Puntos();
        $aula_h_punto_4->setPuntoOrigenX('2850');
        $aula_h_punto_4->setPuntoOrigenY('350');
        $aula_h_punto_4->setEstructuraId($aula_h->getId());
        $aula_h_punto_4->save();

        //Intendencia
        $aula_i = new Estructura();
        $aula_i->setNombre('Intendencia');
        $aula_i->setCapacidad(10);
        $aula_i->setTipo(EstructuraType::Navegable);
        $aula_i->setEsNavegable(true);                
        $aula_i->save();

        $aula_i_punto_1 = new Puntos();
        $aula_i_punto_1->setPuntoOrigenX('2990');
        $aula_i_punto_1->setPuntoOrigenY('105');
        $aula_i_punto_1->setEstructuraId($aula_i->getId());
        $aula_i_punto_1->save();

        $aula_i_punto_2 = new Puntos();
        $aula_i_punto_2->setPuntoOrigenX('3160');
        $aula_i_punto_2->setPuntoOrigenY('350');
        $aula_i_punto_2->setEstructuraId($aula_i->getId());
        $aula_i_punto_2->save();

        $aula_i_punto_3 = new Puntos();
        $aula_i_punto_3->setPuntoOrigenX('2990');
        $aula_i_punto_3->setPuntoOrigenY('350');
        $aula_i_punto_3->setEstructuraId($aula_i->getId());
        $aula_i_punto_3->save();

        //Biblioteca
        $aula_j = new Estructura();
        $aula_j->setNombre('Biblioteca');
        $aula_j->setCapacidad(50);
        $aula_j->setTipo(EstructuraType::Navegable);
        $aula_j->setEsNavegable(true);                
        $aula_j->save();

        $aula_j_punto_1 = new Puntos();
        $aula_j_punto_1->setPuntoOrigenX('3330');
        $aula_j_punto_1->setPuntoOrigenY('810');
        $aula_j_punto_1->setEstructuraId($aula_j->getId());
        $aula_j_punto_1->save();

        $aula_j_punto_2 = new Puntos();
        $aula_j_punto_2->setPuntoOrigenX('2430');
        $aula_j_punto_2->setPuntoOrigenY('810');
        $aula_j_punto_2->setEstructuraId($aula_j->getId());
        $aula_j_punto_2->save();

        $aula_j_punto_3 = new Puntos();
        $aula_j_punto_3->setPuntoOrigenX('2890');
        $aula_j_punto_3->setPuntoOrigenY('1640');
        $aula_j_punto_3->setEstructuraId($aula_j->getId());
        $aula_j_punto_3->save();

        $aula_j_punto_4 = new Puntos();
        $aula_j_punto_4->setPuntoOrigenX('3550');
        $aula_j_punto_4->setPuntoOrigenY('1220');
        $aula_j_punto_4->setEstructuraId($aula_j->getId());
        $aula_j_punto_4->save();

        //Aula Fortran
        $aula_k = new Estructura();
        $aula_k->setNombre('Aula 5 Fortran');
        $aula_k->setCapacidad(150);
        $aula_k->setTipo(EstructuraType::Navegable);
        $aula_k->setEsNavegable(true);                
        $aula_k->save();

        $aula_k_punto_1 = new Puntos();
        $aula_k_punto_1->setPuntoOrigenX('2300');
        $aula_k_punto_1->setPuntoOrigenY('2150');
        $aula_k_punto_1->setEstructuraId($aula_k->getId());
        $aula_k_punto_1->save();

        $aula_k_punto_2 = new Puntos();
        $aula_k_punto_2->setPuntoOrigenX('1710');
        $aula_k_punto_2->setPuntoOrigenY('1050');
        $aula_k_punto_2->setEstructuraId($aula_k->getId());
        $aula_k_punto_2->save();

        $aula_k_punto_3 = new Puntos();
        $aula_k_punto_3->setPuntoOrigenX('910');
        $aula_k_punto_3->setPuntoOrigenY('1480');
        $aula_k_punto_3->setEstructuraId($aula_k->getId());
        $aula_k_punto_3->save();

        $aula_k_punto_4 = new Puntos();
        $aula_k_punto_4->setPuntoOrigenX('1510');
        $aula_k_punto_4->setPuntoOrigenY('2560');
        $aula_k_punto_4->setEstructuraId($aula_k->getId());
        $aula_k_punto_4->save();

        //Aula 1 PL/1
        $aula_pl_1 = new Estructura();
        $aula_pl_1->setNombre('Aula 1 PL/1');
        $aula_pl_1->setCapacidad(50);
        $aula_pl_1->setTipo(EstructuraType::Navegable);
        $aula_pl_1->setEsNavegable(true);                
        $aula_pl_1->save();

        //Punto superior derecho
        $aula_pl_1_punto_1 = new Puntos();
        $aula_pl_1_punto_1->setPuntoOrigenX('4050');
        $aula_pl_1_punto_1->setPuntoOrigenY('2080');
        $aula_pl_1_punto_1->setEstructuraId($aula_pl_1->getId());
        $aula_pl_1_punto_1->save();

        //Punto inferior derecho
        $aula_pl_1_punto_2 = new Puntos();
        $aula_pl_1_punto_2->setPuntoOrigenX('3740');
        $aula_pl_1_punto_2->setPuntoOrigenY('1540');
        $aula_pl_1_punto_2->setEstructuraId($aula_pl_1->getId());
        $aula_pl_1_punto_2->save();

        //Punto inferior izquierdo
        $aula_pl_1_punto_3 = new Puntos();
        $aula_pl_1_punto_3->setPuntoOrigenX('3410');
        $aula_pl_1_punto_3->setPuntoOrigenY('1720');
        $aula_pl_1_punto_3->setEstructuraId($aula_pl_1->getId());
        $aula_pl_1_punto_3->save();

        //Punto superior izquierdo
        $aula_pl_1_punto_4 = new Puntos();
        $aula_pl_1_punto_4->setPuntoOrigenX('3710');
        $aula_pl_1_punto_4->setPuntoOrigenY('2260');
        $aula_pl_1_punto_4->setEstructuraId($aula_pl_1->getId());
        $aula_pl_1_punto_4->save();

        //Aula 2 APL
        $aula_apl_2 = new Estructura();
        $aula_apl_2->setNombre('Aula 2 APL');
        $aula_apl_2->setCapacidad(50);
        $aula_apl_2->setTipo(EstructuraType::Navegable);
        $aula_apl_2->setEsNavegable(true);                
        $aula_apl_2->save();

        //Punto superior derecho
        $aula_apl_2_punto_1 = new Puntos();
        $aula_apl_2_punto_1->setPuntoOrigenX('3710');
        $aula_apl_2_punto_1->setPuntoOrigenY('2260');
        $aula_apl_2_punto_1->setEstructuraId($aula_apl_2->getId());
        $aula_apl_2_punto_1->save();

        //Punto inferior derecho
        $aula_apl_2_punto_2 = new Puntos();
        $aula_apl_2_punto_2->setPuntoOrigenX('3410');
        $aula_apl_2_punto_2->setPuntoOrigenY('1720');
        $aula_apl_2_punto_2->setEstructuraId($aula_apl_2->getId());
        $aula_apl_2_punto_2->save();

        //Punto inferior izquierdo
        $aula_apl_2_punto_3 = new Puntos();
        $aula_apl_2_punto_3->setPuntoOrigenX('3080');
        $aula_apl_2_punto_3->setPuntoOrigenY('1910');
        $aula_apl_2_punto_3->setEstructuraId($aula_apl_2->getId());
        $aula_apl_2_punto_3->save();

        //Punto superior izquierdo
        $aula_apl_2_punto_4 = new Puntos();
        $aula_apl_2_punto_4->setPuntoOrigenX('3370');
        $aula_apl_2_punto_4->setPuntoOrigenY('2450');
        $aula_apl_2_punto_4->setEstructuraId($aula_apl_2->getId());
        $aula_apl_2_punto_4->save();

        //Aula 3 Cobol
        $aula_cobol_3 = new Estructura();
        $aula_cobol_3->setNombre('Aula 3 Cobol');
        $aula_cobol_3->setCapacidad(50);
        $aula_cobol_3->setTipo(EstructuraType::Navegable);
        $aula_cobol_3->setEsNavegable(true);                
        $aula_cobol_3->save();

        //Punto superior derecho
        $aula_cobol_3_punto_1 = new Puntos();
        $aula_cobol_3_punto_1->setPuntoOrigenX('3370');
        $aula_cobol_3_punto_1->setPuntoOrigenY('2450');
        $aula_cobol_3_punto_1->setEstructuraId($aula_cobol_3->getId());
        $aula_cobol_3_punto_1->save();

        //Punto inferior derecho
        $aula_cobol_3_punto_2 = new Puntos();
        $aula_cobol_3_punto_2->setPuntoOrigenX('3080');
        $aula_cobol_3_punto_2->setPuntoOrigenY('1910');
        $aula_cobol_3_punto_2->setEstructuraId($aula_cobol_3->getId());
        $aula_cobol_3_punto_2->save();

        //Punto inferior izquierdo
        $aula_cobol_3_punto_3 = new Puntos();
        $aula_cobol_3_punto_3->setPuntoOrigenX('2750');
        $aula_cobol_3_punto_3->setPuntoOrigenY('2100');
        $aula_cobol_3_punto_3->setEstructuraId($aula_cobol_3->getId());
        $aula_cobol_3_punto_3->save();

        //Punto superior izquierdo
        $aula_cobol_3_punto_4 = new Puntos();
        $aula_cobol_3_punto_4->setPuntoOrigenX('3040');
        $aula_cobol_3_punto_4->setPuntoOrigenY('2630');
        $aula_cobol_3_punto_4->setEstructuraId($aula_cobol_3->getId());
        $aula_cobol_3_punto_4->save();

        //Aula 4 LISP
        $aula_lisp = new Estructura();
        $aula_lisp->setNombre('Aula 4 Lisp');
        $aula_lisp->setCapacidad(50);
        $aula_lisp->setTipo(EstructuraType::Navegable);
        $aula_lisp->setEsNavegable(true);                        
        $aula_lisp->save();

        //Punto superior derecho
        $aula_lisp_punto_1 = new Puntos();
        $aula_lisp_punto_1->setPuntoOrigenX('3040');
        $aula_lisp_punto_1->setPuntoOrigenY('2630');
        $aula_lisp_punto_1->setEstructuraId($aula_lisp->getId());
        $aula_lisp_punto_1->save();

        //Punto inferior derecho
        $aula_lisp_punto_2 = new Puntos();
        $aula_lisp_punto_2->setPuntoOrigenX('2750');
        $aula_lisp_punto_2->setPuntoOrigenY('2100');
        $aula_lisp_punto_2->setEstructuraId($aula_lisp->getId());
        $aula_lisp_punto_2->save();

        //Punto inferior izquierdo  (Punto Ref 3370 - 2450)
        $aula_lisp_punto_3 = new Puntos();
        $aula_lisp_punto_3->setPuntoOrigenX('1860');
        $aula_lisp_punto_3->setPuntoOrigenY('2580');
        $aula_lisp_punto_3->setEstructuraId($aula_lisp->getId());
        $aula_lisp_punto_3->save();

        //Punto superior izquierdo
        $aula_lisp_punto_4 = new Puntos();
        $aula_lisp_punto_4->setPuntoOrigenX('2150');
        $aula_lisp_punto_4->setPuntoOrigenY('3120');
        $aula_lisp_punto_4->setEstructuraId($aula_lisp->getId());
        $aula_lisp_punto_4->save();

        //Escalera 2 (enfrente al aula LISP)
        $escalera2 = new Estructura();
        $escalera2->setNombre('Escalera 2');
        $escalera2->setCapacidad(10);
        $escalera2->setTipo(EstructuraType::Navegable);
        $escalera2->setEsNavegable(true);                                
        $escalera2->save();

        //Punto superior derecho
        $escalera2_punto_1 = new Puntos();
        $escalera2_punto_1->setPuntoOrigenX('2150');
        $escalera2_punto_1->setPuntoOrigenY('3120');
        $escalera2_punto_1->setEstructuraId($escalera2->getId());
        $escalera2_punto_1->save();

        //Punto inferior derecho
        $escalera2_punto_2 = new Puntos();
        $escalera2_punto_2->setPuntoOrigenX('1950');
        $escalera2_punto_2->setPuntoOrigenY('2750');
        $escalera2_punto_2->setEstructuraId($escalera2->getId());
        $escalera2_punto_2->save();

        //Punto inferior izquierdo  (Punto Ref 2150 - 3120)
        $escalera2_punto_3 = new Puntos();
        $escalera2_punto_3->setPuntoOrigenX('1560');
        $escalera2_punto_3->setPuntoOrigenY('2960');
        $escalera2_punto_3->setEstructuraId($escalera2->getId());
        $escalera2_punto_3->save();

        //Punto superior izquierdo
        $escalera2_punto_4 = new Puntos();
        $escalera2_punto_4->setPuntoOrigenX('1760');
        $escalera2_punto_4->setPuntoOrigenY('3330');
        $escalera2_punto_4->setEstructuraId($escalera2->getId());
        $escalera2_punto_4->save();

        //Pared del medio entre la escalera 2
        $aulamedia = new Estructura();
        $aulamedia->setNombre('Pared');
        $aulamedia->setCapacidad(0);
        $aulamedia->setTipo(EstructuraType::Pared);
        $aulamedia->setEsNavegable(false);                                
        $aulamedia->save();
        //(Puntos Refetencia X = 1560; Y = 2960)
        $aulamedia_punto_1 = new Puntos();
        $aulamedia_punto_1->setPuntoOrigenX('1980');
        $aulamedia_punto_1->setPuntoOrigenY('3040');
        $aulamedia_punto_1->setEstructuraId($aulamedia->getId());
        $aulamedia_punto_1->save();

        $aulamedia_punto_2 = new Puntos();
        $aulamedia_punto_2->setPuntoOrigenX('1850');
        $aulamedia_punto_2->setPuntoOrigenY('2800');
        $aulamedia_punto_2->setEstructuraId($aulamedia->getId());
        $aulamedia_punto_2->save();

        $aulamedia_punto_3 = new Puntos();
        $aulamedia_punto_3->setPuntoOrigenX('1670');
        $aulamedia_punto_3->setPuntoOrigenY('2900');
        $aulamedia_punto_3->setEstructuraId($aulamedia->getId());
        $aulamedia_punto_3->save();

        $aulamedia_punto_4 = new Puntos();
        $aulamedia_punto_4->setPuntoOrigenX('1790');
        $aulamedia_punto_4->setPuntoOrigenY('3140');
        $aulamedia_punto_4->setEstructuraId($aulamedia->getId());
        $aulamedia_punto_4->save();

        //Baño Hombres 2
        $banio_hombres_2 = new Estructura();
        $banio_hombres_2->setNombre('Baño hombres 2');
        $banio_hombres_2->setCapacidad(15);
        $banio_hombres_2->setTipo(EstructuraType::Navegable);
        $banio_hombres_2->setEsNavegable(true);
        $banio_hombres_2->save();
        //(Puntos Refetencia X = 1760; Y = 3330)
        $banio_hombres_2_punto_1 = new Puntos();
        $banio_hombres_2_punto_1->setPuntoOrigenX('1760');
        $banio_hombres_2_punto_1->setPuntoOrigenY('3330');
        $banio_hombres_2_punto_1->setEstructuraId($banio_hombres_2->getId());
        $banio_hombres_2_punto_1->save();

        $banio_hombres_2_punto_2 = new Puntos();
        $banio_hombres_2_punto_2->setPuntoOrigenX('1560');
        $banio_hombres_2_punto_2->setPuntoOrigenY('2960');
        $banio_hombres_2_punto_2->setEstructuraId($banio_hombres_2->getId());
        $banio_hombres_2_punto_2->save();

        $banio_hombres_2_punto_3 = new Puntos();
        $banio_hombres_2_punto_3->setPuntoOrigenX('1490');
        $banio_hombres_2_punto_3->setPuntoOrigenY('3000');
        $banio_hombres_2_punto_3->setEstructuraId($banio_hombres_2->getId());
        $banio_hombres_2_punto_3->save();
        //(Puntos Refetencia X = 1760; Y = 3330)
        $banio_hombres_2_punto_4 = new Puntos();
        $banio_hombres_2_punto_4->setPuntoOrigenX('1520');
        $banio_hombres_2_punto_4->setPuntoOrigenY('3060');
        $banio_hombres_2_punto_4->setEstructuraId($banio_hombres_2->getId());
        $banio_hombres_2_punto_4->save();

        $banio_hombres_2_punto_5 = new Puntos();
        $banio_hombres_2_punto_5->setPuntoOrigenX('1450');
        $banio_hombres_2_punto_5->setPuntoOrigenY('3100');
        $banio_hombres_2_punto_5->setEstructuraId($banio_hombres_2->getId());
        $banio_hombres_2_punto_5->save();

        $banio_hombres_2_punto_6 = new Puntos();
        $banio_hombres_2_punto_6->setPuntoOrigenX('1620');
        $banio_hombres_2_punto_6->setPuntoOrigenY('3410');
        $banio_hombres_2_punto_6->setEstructuraId($banio_hombres_2->getId());
        $banio_hombres_2_punto_6->save();

        //Baño Mujeres 2 (enfrente al centro de estudiantes)
        $banio_mujeres_2 = new Estructura();
        $banio_mujeres_2->setNombre('Baño mujeres 2');
        $banio_mujeres_2->setCapacidad(15);
        $banio_mujeres_2->setTipo(EstructuraType::Navegable);
        $banio_mujeres_2->setEsNavegable(true);        
        $banio_mujeres_2->save();
        //(Puntos Referencia X = 1760; Y = 3330)
        $banio_mujeres_2_punto_1 = new Puntos();
        $banio_mujeres_2_punto_1->setPuntoOrigenX('1620');
        $banio_mujeres_2_punto_1->setPuntoOrigenY('3410');
        $banio_mujeres_2_punto_1->setEstructuraId($banio_mujeres_2->getId());
        $banio_mujeres_2_punto_1->save();

        $banio_mujeres_2_punto_2 = new Puntos();
        $banio_mujeres_2_punto_2->setPuntoOrigenX('1450');
        $banio_mujeres_2_punto_2->setPuntoOrigenY('3100');
        $banio_mujeres_2_punto_2->setEstructuraId($banio_mujeres_2->getId());
        $banio_mujeres_2_punto_2->save();

        $banio_mujeres_2_punto_3 = new Puntos();
        $banio_mujeres_2_punto_3->setPuntoOrigenX('1380');
        $banio_mujeres_2_punto_3->setPuntoOrigenY('3130');
        $banio_mujeres_2_punto_3->setEstructuraId($banio_mujeres_2->getId());
        $banio_mujeres_2_punto_3->save();
        //(Puntos Referencia X = 1760; Y = 3330)
        $banio_mujeres_2_punto_4 = new Puntos();
        $banio_mujeres_2_punto_4->setPuntoOrigenX('1350');
        $banio_mujeres_2_punto_4->setPuntoOrigenY('3070');
        $banio_mujeres_2_punto_4->setEstructuraId($banio_mujeres_2->getId());
        $banio_mujeres_2_punto_4->save();

        $banio_mujeres_2_punto_5 = new Puntos();
        $banio_mujeres_2_punto_5->setPuntoOrigenX('1285');
        $banio_mujeres_2_punto_5->setPuntoOrigenY('3110');
        $banio_mujeres_2_punto_5->setEstructuraId($banio_mujeres_2->getId());
        $banio_mujeres_2_punto_5->save();

        $banio_mujeres_2_punto_6 = new Puntos();
        $banio_mujeres_2_punto_6->setPuntoOrigenX('1490');
        $banio_mujeres_2_punto_6->setPuntoOrigenY('3480');
        $banio_mujeres_2_punto_6->setEstructuraId($banio_mujeres_2->getId());
        $banio_mujeres_2_punto_6->save();

        //Centro de estudiantes
        $centro_de_estudiantes = new Estructura();
        $centro_de_estudiantes->setNombre('Centro de estudiantes');
        $centro_de_estudiantes->setCapacidad(15);
        $centro_de_estudiantes->setTipo(EstructuraType::Navegable);
        $centro_de_estudiantes->setEsNavegable(true);        
        $centro_de_estudiantes->save();
        #Se toma la referencia desde este punto X = 1100, Y = 2780
        $centro_de_estudiantes_punto_1 = new Puntos();
        $centro_de_estudiantes_punto_1->setPuntoOrigenX('1100');
        $centro_de_estudiantes_punto_1->setPuntoOrigenY('2780');
        $centro_de_estudiantes_punto_1->setEstructuraId($centro_de_estudiantes->getId());
        $centro_de_estudiantes_punto_1->save();

        $centro_de_estudiantes_punto_2 = new Puntos();
        $centro_de_estudiantes_punto_2->setPuntoOrigenX('1380');
        $centro_de_estudiantes_punto_2->setPuntoOrigenY('2630');
        $centro_de_estudiantes_punto_2->setEstructuraId($centro_de_estudiantes->getId());
        $centro_de_estudiantes_punto_2->save();

        $centro_de_estudiantes_punto_3 = new Puntos();
        $centro_de_estudiantes_punto_3->setPuntoOrigenX('1470');
        $centro_de_estudiantes_punto_3->setPuntoOrigenY('2790');
        $centro_de_estudiantes_punto_3->setEstructuraId($centro_de_estudiantes->getId());
        $centro_de_estudiantes_punto_3->save();

        $centro_de_estudiantes_punto_4 = new Puntos();
        $centro_de_estudiantes_punto_4->setPuntoOrigenX('1260');
        $centro_de_estudiantes_punto_4->setPuntoOrigenY('2900');
        $centro_de_estudiantes_punto_4->setEstructuraId($centro_de_estudiantes->getId());
        $centro_de_estudiantes_punto_4->save();

        $centro_de_estudiantes_punto_5 = new Puntos();
        $centro_de_estudiantes_punto_5->setPuntoOrigenX('1320');
        $centro_de_estudiantes_punto_5->setPuntoOrigenY('3010');
        $centro_de_estudiantes_punto_5->setEstructuraId($centro_de_estudiantes->getId());
        $centro_de_estudiantes_punto_5->save();

        $centro_de_estudiantes_punto_6 = new Puntos();
        $centro_de_estudiantes_punto_6->setPuntoOrigenX('1250');
        $centro_de_estudiantes_punto_6->setPuntoOrigenY('3050');
        $centro_de_estudiantes_punto_6->setEstructuraId($centro_de_estudiantes->getId());
        $centro_de_estudiantes_punto_6->save();

        //Baño Hombres 1
        $aula_s = new Estructura();
        $aula_s->setNombre('Baño Hombres 1');
        $aula_s->setCapacidad(15);
        $aula_s->setTipo(EstructuraType::Navegable);
        $aula_s->setEsNavegable(true);        
        $aula_s->save();

        $aula_s_punto_1 = new Puntos();
        $aula_s_punto_1->setPuntoOrigenX('4050');
        $aula_s_punto_1->setPuntoOrigenY('2080');
        $aula_s_punto_1->setEstructuraId($aula_s->getId());
        $aula_s_punto_1->save();

        $aula_s_punto_2 = new Puntos();
        $aula_s_punto_2->setPuntoOrigenX('4440');
        $aula_s_punto_2->setPuntoOrigenY('1870');
        $aula_s_punto_2->setEstructuraId($aula_s->getId());
        $aula_s_punto_2->save();

        $aula_s_punto_3 = new Puntos();
        $aula_s_punto_3->setPuntoOrigenX('4360');
        $aula_s_punto_3->setPuntoOrigenY('1700');
        $aula_s_punto_3->setEstructuraId($aula_s->getId());
        $aula_s_punto_3->save();

        $aula_s_punto_4 = new Puntos();
        $aula_s_punto_4->setPuntoOrigenX('3960');
        $aula_s_punto_4->setPuntoOrigenY('1920');
        $aula_s_punto_4->setEstructuraId($aula_s->getId());
        $aula_s_punto_4->save();

        //Baños mujeres 1 (al lado del ascensor)
        $aula_t = new Estructura();
        $aula_t->setNombre('Baño mujeres 1');
        $aula_t->setCapacidad(15);
        $aula_t->setTipo(EstructuraType::Navegable);
        $aula_t->setEsNavegable(true);
        $aula_t->save();

        $aula_t_punto_1 = new Puntos();
        $aula_t_punto_1->setPuntoOrigenX('4440');
        $aula_t_punto_1->setPuntoOrigenY('1870');
        $aula_t_punto_1->setEstructuraId($aula_t->getId());
        $aula_t_punto_1->save();

        $aula_t_punto_2 = new Puntos();
        $aula_t_punto_2->setPuntoOrigenX('4780');
        $aula_t_punto_2->setPuntoOrigenY('1680');
        $aula_t_punto_2->setEstructuraId($aula_t->getId());
        $aula_t_punto_2->save();

        $aula_t_punto_3 = new Puntos();
        $aula_t_punto_3->setPuntoOrigenX('4690');
        $aula_t_punto_3->setPuntoOrigenY('1520');
        $aula_t_punto_3->setEstructuraId($aula_t->getId());
        $aula_t_punto_3->save();

        $aula_t_punto_4 = new Puntos();
        $aula_t_punto_4->setPuntoOrigenX('4350');
        $aula_t_punto_4->setPuntoOrigenY('1700');
        $aula_t_punto_4->setEstructuraId($aula_t->getId());
        $aula_t_punto_4->save();

        //Escalera 1 (Al lado del ascensor)
        $aula_u = new Estructura();
        $aula_u->setNombre('Escalera 1');
        $aula_u->setCapacidad(15);
        $aula_u->setTipo(EstructuraType::Navegable);
        $aula_u->setEsNavegable(true);
        $aula_u->save();

        $aula_u_punto_1 = new Puntos();
        $aula_u_punto_1->setPuntoOrigenX('4140');
        $aula_u_punto_1->setPuntoOrigenY('1820');
        $aula_u_punto_1->setEstructuraId($aula_u->getId());
        $aula_u_punto_1->save();

        $aula_u_punto_2 = new Puntos();
        $aula_u_punto_2->setPuntoOrigenX('4580');
        $aula_u_punto_2->setPuntoOrigenY('1580');
        $aula_u_punto_2->setEstructuraId($aula_u->getId());
        $aula_u_punto_2->save();

        $aula_u_punto_3 = new Puntos();
        $aula_u_punto_3->setPuntoOrigenX('4460');
        $aula_u_punto_3->setPuntoOrigenY('1360');
        $aula_u_punto_3->setEstructuraId($aula_u->getId());
        $aula_u_punto_3->save();

        $aula_u_punto_4 = new Puntos();
        $aula_u_punto_4->setPuntoOrigenX('4020');
        $aula_u_punto_4->setPuntoOrigenY('1600');
        $aula_u_punto_4->setEstructuraId($aula_u->getId());
        $aula_u_punto_4->save();

        //Ascensor
        $aula_v = new Estructura();
        $aula_v->setNombre('Ascensor');
        $aula_v->setCapacidad(6);
        $aula_v->setTipo(EstructuraType::Navegable);
        $aula_v->setEsNavegable(true);        
        $aula_v->save();

        $aula_v_punto_1 = new Puntos();
        $aula_v_punto_1->setPuntoOrigenX('4190');
        $aula_v_punto_1->setPuntoOrigenY('1640');
        $aula_v_punto_1->setEstructuraId($aula_v->getId());
        $aula_v_punto_1->save();

        $aula_v_punto_2 = new Puntos();
        $aula_v_punto_2->setPuntoOrigenX('4410');
        $aula_v_punto_2->setPuntoOrigenY('1520');
        $aula_v_punto_2->setEstructuraId($aula_v->getId());
        $aula_v_punto_2->save();

        $aula_v_punto_3 = new Puntos();
        $aula_v_punto_3->setPuntoOrigenX('4360');
        $aula_v_punto_3->setPuntoOrigenY('1420');
        $aula_v_punto_3->setEstructuraId($aula_v->getId());
        $aula_v_punto_3->save();

        $aula_v_punto_4 = new Puntos();
        $aula_v_punto_4->setPuntoOrigenX('4140');
        $aula_v_punto_4->setPuntoOrigenY('1540');
        $aula_v_punto_4->setEstructuraId($aula_v->getId());
        $aula_v_punto_4->save();

        //PUNTOS DE NAVEGACION
        $p1 = new PuntoNavegacion();
        $p1->setNombre('P1');
        $p1->setPuntoOrigenX('3615');
        $p1->setPuntoOrigenY('220');
        $p1->save();

        $p2 = new PuntoNavegacion();
        $p2->setNombre('P2');
        $p2->setPuntoOrigenX('3615');
        $p2->setPuntoOrigenY('525');
        $p2->save();

        //intendencia
        $p3 = new PuntoNavegacion();
        $p3->setNombre('P3');
        $p3->setPuntoOrigenX('3065');
        $p3->setPuntoOrigenY('525');
        $p3->save();

        $p4 = new PuntoNavegacion();
        $p4->setNombre('P4');
        $p4->setPuntoOrigenX('3065');
        $p4->setPuntoOrigenY('300');
        $p4->setEstructuraId($aula_i->getId());
        $p4->save();

        //mesa de entradas
        $p5 = new PuntoNavegacion();
        $p5->setNombre('P5');
        $p5->setPuntoOrigenX('2920');
        $p5->setPuntoOrigenY('525');
        $p5->save();

        $p6 = new PuntoNavegacion();
        $p6->setNombre('P6');
        $p6->setPuntoOrigenX('2920');
        $p6->setPuntoOrigenY('300');
        $p6->setEstructuraId($aula_h->getId());
        $p6->save();

        //oficina de alumnos
        $p7 = new PuntoNavegacion();
        $p7->setNombre('P7');
        $p7->setPuntoOrigenX('2700');
        $p7->setPuntoOrigenY('525');
        $p7->save();

        $p8 = new PuntoNavegacion();
        $p8->setNombre('P8');
        $p8->setPuntoOrigenX('2700');
        $p8->setPuntoOrigenY('300');
        $p8->setEstructuraId($aula_g->getId());
        $p8->save();

        //Depto concurso
        $p9 = new PuntoNavegacion();
        $p9->setNombre('P9');
        $p9->setPuntoOrigenX('2400');
        $p9->setPuntoOrigenY('525');
        $p9->save();

        $p10 = new PuntoNavegacion();
        $p10->setNombre('P10');
        $p10->setPuntoOrigenX('2400');
        $p10->setPuntoOrigenY('300');
        $p10->setEstructuraId($aula_f->getId());
        $p10->save();

        //despacho
        $p11 = new PuntoNavegacion();
        $p11->setNombre('P11');
        $p11->setPuntoOrigenX('2100');
        $p11->setPuntoOrigenY('525');
        $p11->save();

        $p12 = new PuntoNavegacion();
        $p12->setNombre('P12');
        $p12->setPuntoOrigenX('2100');
        $p12->setPuntoOrigenY('400');
        $p12->setEstructuraId($aula_e->getId());
        $p12->save();

        //Secretaria administrativa
        $p13 = new PuntoNavegacion();
        $p13->setNombre('P13');
        $p13->setPuntoOrigenX('1800');
        $p13->setPuntoOrigenY('525');
        $p13->save();

        $p14 = new PuntoNavegacion();
        $p14->setNombre('P14');
        $p14->setPuntoOrigenX('1800');
        $p14->setPuntoOrigenY('400');
        $p14->setEstructuraId($aula_d->getId());
        $p14->save();

        //Área económico financiera
        $p15 = new PuntoNavegacion();
        $p15->setNombre('P15');
        $p15->setPuntoOrigenX('1350');
        $p15->setPuntoOrigenY('525');
        $p15->save();

        $p16 = new PuntoNavegacion();
        $p16->setNombre('P16');
        $p16->setPuntoOrigenX('1350');
        $p16->setPuntoOrigenY('400');
        $p16->setEstructuraId($area_econo_fin->getId());
        $p16->save();

        //Escalera
        $p17 = new PuntoNavegacion();
        $p17->setNombre('P17');
        $p17->setPuntoOrigenX('825');
        $p17->setPuntoOrigenY('525');
        $p17->save();

        $p18 = new PuntoNavegacion();
        $p18->setNombre('P18');
        $p18->setPuntoOrigenX('825');
        $p18->setPuntoOrigenY('250');
        $p18->setEstructuraId($aula_c->getId());
        $p18->save();

        //Entrada al lado del consultorio médico
        $p19 = new PuntoNavegacion();
        $p19->setNombre('P19');
        $p19->setPuntoOrigenX('825');
        $p19->setPuntoOrigenY('562.5');
        $p19->save();

        $p20 = new PuntoNavegacion();
        $p20->setNombre('P20');
        $p20->setPuntoOrigenX('550');
        $p20->setPuntoOrigenY('562.5');
        $p20->save();

        //consultorio médico
        $p21 = new PuntoNavegacion();
        $p21->setNombre('P21');
        $p21->setPuntoOrigenX('550');
        $p21->setPuntoOrigenY('400');
        $p21->setEstructuraId($aula_b->getId());
        $p21->save();

        //entrada facultad frente al despacho
        $p22 = new PuntoNavegacion();
        $p22->setNombre('P22');
        $p22->setPuntoOrigenX('2100');
        $p22->setPuntoOrigenY('650');
        $p22->save();

        //entrada facultad frente al Depto concurso
        $p23 = new PuntoNavegacion();
        $p23->setNombre('P23');
        $p23->setPuntoOrigenX('2400');
        $p23->setPuntoOrigenY('650');
        $p23->save();

        //puntos navegacion entrada a la biblioteca
        $p24 = new PuntoNavegacion();
        $p24->setNombre('p24');
        $p24->setPuntoOrigenX('3815');
        $p24->setPuntoOrigenY('900');
        $p24->save();

        $p25 = new PuntoNavegacion();
        $p25->setNombre('p25');
        $p25->setPuntoOrigenX('3350');
        $p25->setPuntoOrigenY('1050');
        $p25->setEstructuraId($aula_j->getId());
        $p25->save();

        //punto de navegacion entre el ascensor y la biblioteca
        $p26 = new PuntoNavegacion();
        $p26->setNombre('p26');
        $p26->setPuntoOrigenX('4030');
        $p26->setPuntoOrigenY('1290');
        $p26->save();

        //puntos de navegacion del ascensor
        $p27 = new PuntoNavegacion();
        $p27->setNombre('p27');
        $p27->setPuntoOrigenX('4130');
        $p27->setPuntoOrigenY('1230');
        $p27->save();

        $p28 = new PuntoNavegacion();
        $p28->setNombre('p28');
        $p28->setPuntoOrigenX('4280');
        $p28->setPuntoOrigenY('1530');
        $p28->setEstructuraId($aula_v->getId());
        $p28->save();

        //Puntos de navegación de la escalera1 (al lado del ascensor)
        $p29 = new PuntoNavegacion();
        $p29->setNombre('p29');
        $p29->setPuntoOrigenX('4270');
        $p29->setPuntoOrigenY('1150');
        $p29->save();

        $p30 = new PuntoNavegacion();
        $p30->setNombre('p30');
        $p30->setPuntoOrigenX('4440');
        $p30->setPuntoOrigenY('1440');
        $p30->setEstructuraId($aula_u->getId());
        $p30->save();

        //puntos de navegación del baño de mujeres (al lado del ascensor)
        $p31 = new PuntoNavegacion();
        $p31->setNombre('p31');
        $p31->setPuntoOrigenX('4380');
        $p31->setPuntoOrigenY('1090');
        $p31->save();

        $p32 = new PuntoNavegacion();
        $p32->setNombre('p32');
        $p32->setPuntoOrigenX('4670');
        $p32->setPuntoOrigenY('1620');
        $p32->setEstructuraId($aula_t->getId());
        $p32->save();

        //puntos de navegación del baño de hombre (al lado del ascensor)
        $p33 = new PuntoNavegacion();
        $p33->setNombre('p33');
        $p33->setPuntoOrigenX('3830');
        $p33->setPuntoOrigenY('1400');
        $p33->save();

        $p34 = new PuntoNavegacion();
        $p34->setNombre('p34');
        $p34->setPuntoOrigenX('4120');
        $p34->setPuntoOrigenY('1920');
        $p34->setEstructuraId($aula_s->getId());
        $p34->save();

        //puntos de navegación del aula 1 PL/1
        $p35 = new PuntoNavegacion();
        $p35->setNombre('p35');
        $p35->setPuntoOrigenX('3540');
        $p35->setPuntoOrigenY('1560');
        $p35->save();

        $p36 = new PuntoNavegacion();
        $p36->setNombre('p36');
        $p36->setPuntoOrigenX('3620');
        $p36->setPuntoOrigenY('1700');
        $p36->setEstructuraId($aula_pl_1->getId());
        $p36->save();

        //puntos de navegación del aula 2 APL
        $p37 = new PuntoNavegacion();
        $p37->setNombre('p37');
        $p37->setPuntoOrigenX('3210');
        $p37->setPuntoOrigenY('1750');
        $p37->save();

        $p38 = new PuntoNavegacion();
        $p38->setNombre('p38');
        $p38->setPuntoOrigenX('3300');
        $p38->setPuntoOrigenY('1890');
        $p38->setEstructuraId($aula_apl_2->getId());
        $p38->save();

        //puntos de navegación del aula 3 Cobol
        $p39 = new PuntoNavegacion();
        $p39->setNombre('p39');
        $p39->setPuntoOrigenX('2880');
        $p39->setPuntoOrigenY('1940');
        $p39->save();

        $p40 = new PuntoNavegacion();
        $p40->setNombre('p40');
        $p40->setPuntoOrigenX('2960');
        $p40->setPuntoOrigenY('2080');
        $p40->setEstructuraId($aula_cobol_3->getId());
        $p40->save();

        //puntos de navegación del aula 4 LISP
        $p41 = new PuntoNavegacion();
        $p41->setNombre('p41');
        $p41->setPuntoOrigenX('2550');
        $p41->setPuntoOrigenY('2130');
        $p41->save();

        $p42 = new PuntoNavegacion();
        $p42->setNombre('p42');
        $p42->setPuntoOrigenX('2630');
        $p42->setPuntoOrigenY('2270');
        $p42->setEstructuraId($aula_lisp->getId());
        $p42->save();

        //puntos de navegación de la escalera 2
        $p43 = new PuntoNavegacion();
        $p43->setNombre('p43');
        $p43->setPuntoOrigenX('1775');
        $p43->setPuntoOrigenY('2550');
        $p43->save();

        $p44 = new PuntoNavegacion();
        $p44->setNombre('p44');
        $p44->setPuntoOrigenX('1930');
        $p44->setPuntoOrigenY('2830');
        $p44->setEstructuraId($escalera2->getId());
        $p44->save();

        //puntos de navegación del aula 5 FORTRAN (adentro de la facu)
        $p45 = new PuntoNavegacion();
        $p45->setNombre('p45');
        $p45->setPuntoOrigenX('1630');
        $p45->setPuntoOrigenY('2625');
        $p45->save();

        $p46 = new PuntoNavegacion();
        $p46->setNombre('p46');
        $p46->setPuntoOrigenX('1540');
        $p46->setPuntoOrigenY('2460');
        $p46->setEstructuraId($aula_k->getId());
        $p46->save();

        //puntos de navegación de la puerta de entrada al lado del aula 5 FORTRAN
        $p47 = new PuntoNavegacion();
        $p47->setNombre('p47');
        $p47->setPuntoOrigenX('1500');
        $p47->setPuntoOrigenY('2700');
        $p47->save();

        $p48 = new PuntoNavegacion();
        $p48->setNombre('p48');
        $p48->setPuntoOrigenX('1400');
        $p48->setPuntoOrigenY('2530');
        $p48->save();

        //puntos de navegación del aula 5 FORTRAN (afuera de la facu "ARRIBA")
        $p49 = new PuntoNavegacion();
        $p49->setNombre('p49');
        $p49->setPuntoOrigenX('1230');
        $p49->setPuntoOrigenY('2330');
        $p49->save();

        $p50 = new PuntoNavegacion();
        $p50->setNombre('p50');
        $p50->setPuntoOrigenX('1370');
        $p50->setPuntoOrigenY('2150');
        $p50->setEstructuraId($aula_k->getId());
        $p50->save();

        //puntos de navegación del aula LISP (afuera de la facu "ABAJO")
        $p51 = new PuntoNavegacion();
        $p51->setNombre('p51');
        $p51->setPuntoOrigenX('1060');
        $p51->setPuntoOrigenY('1930');
        $p51->save();

        $p52 = new PuntoNavegacion();
        $p52->setNombre('p52');
        $p52->setPuntoOrigenX('1200');
        $p52->setPuntoOrigenY('1840');
        $p52->setEstructuraId($aula_k->getId());
        $p52->save();

        //punto intermedio antes de ir para el lado de los baños
        $p53 = new PuntoNavegacion();
        $p53->setNombre('p53');
        $p53->setPuntoOrigenX('1600');
        $p53->setPuntoOrigenY('2890');
        $p53->save();

        //punto de navegación baño de hombres
        $p54 = new PuntoNavegacion();
        $p54->setNombre('p54');
        $p54->setPuntoOrigenX('1440');
        $p54->setPuntoOrigenY('2990');
        $p54->save();

        $p55 = new PuntoNavegacion();
        $p55->setNombre('p55');
        $p55->setPuntoOrigenX('1470');
        $p55->setPuntoOrigenY('3050');
        $p55->save();

        $p56 = new PuntoNavegacion();
        $p56->setNombre('p56');
        $p56->setPuntoOrigenX('1540');
        $p56->setPuntoOrigenY('3010');
        $p56->setEstructuraId($banio_hombres_2->getId());
        $p56->save();

        //punto de navegación baño de hombres
        $p57 = new PuntoNavegacion();
        $p57->setNombre('p57');
        $p57->setPuntoOrigenX('1380');
        $p57->setPuntoOrigenY('3020');
        $p57->save();

        $p58 = new PuntoNavegacion();
        $p58->setNombre('p58');
        $p58->setPuntoOrigenX('1410');
        $p58->setPuntoOrigenY('3080');
        $p58->save();

        $p59 = new PuntoNavegacion();
        $p59->setNombre('p59');
        $p59->setPuntoOrigenX('1335');
        $p59->setPuntoOrigenY('3120');
        $p59->setEstructuraId($banio_mujeres_2->getId());
        $p59->save();

        //Puntos de navegación del centro de estudiantes
        $p60 = new PuntoNavegacion();
        $p60->setNombre('p60');
        $p60->setPuntoOrigenX('1300');
        $p60->setPuntoOrigenY('3060');
        $p60->save();

        $p61 = new PuntoNavegacion();
        $p61->setNombre('p61');
        $p61->setPuntoOrigenX('1270');
        $p61->setPuntoOrigenY('3000');
        $p61->setEstructuraId($centro_de_estudiantes->getId());
        $p61->save();

        //RELACIONES ENTRE LOS PUNTOS DE NAVEGACION
        $r1 = new PuntoNavegacionPuntoNavegacion();
        $r1->setPuntoNavegacion_1Id($p1->getId());
        $r1->setPuntoNavegacion_2Id($p2->getId());
        $r1->setDistancia('305');
        $r1->save();

        $r2 = new PuntoNavegacionPuntoNavegacion();
        $r2->setPuntoNavegacion_1Id($p2->getId());
        $r2->setPuntoNavegacion_2Id($p3->getId());
        $r2->setDistancia('550');
        $r2->save();

        $r3 = new PuntoNavegacionPuntoNavegacion();
        $r3->setPuntoNavegacion_1Id($p3->getId());
        $r3->setPuntoNavegacion_2Id($p4->getId());
        $r3->setDistancia('225');
        $r3->save();

        $r4 = new PuntoNavegacionPuntoNavegacion();
        $r4->setPuntoNavegacion_1Id($p3->getId());
        $r4->setPuntoNavegacion_2Id($p5->getId());
        $r4->setDistancia('145');
        $r4->save();

        $r5 = new PuntoNavegacionPuntoNavegacion();
        $r5->setPuntoNavegacion_1Id($p5->getId());
        $r5->setPuntoNavegacion_2Id($p6->getId());
        $r5->setDistancia('225');
        $r5->save();

        $r6 = new PuntoNavegacionPuntoNavegacion();
        $r6->setPuntoNavegacion_1Id($p5->getId());
        $r6->setPuntoNavegacion_2Id($p7->getId());
        $r6->setDistancia('220');
        $r6->save();

        $r7 = new PuntoNavegacionPuntoNavegacion();
        $r7->setPuntoNavegacion_1Id($p7->getId());
        $r7->setPuntoNavegacion_2Id($p8->getId());
        $r7->setDistancia('225');
        $r7->save();

        $r8 = new PuntoNavegacionPuntoNavegacion();
        $r8->setPuntoNavegacion_1Id($p7->getId());
        $r8->setPuntoNavegacion_2Id($p9->getId());
        $r8->setDistancia('300');
        $r8->save();

        $r9 = new PuntoNavegacionPuntoNavegacion();
        $r9->setPuntoNavegacion_1Id($p9->getId());
        $r9->setPuntoNavegacion_2Id($p10->getId());
        $r9->setDistancia('225');
        $r9->save();

        $r10 = new PuntoNavegacionPuntoNavegacion();
        $r10->setPuntoNavegacion_1Id($p9->getId());
        $r10->setPuntoNavegacion_2Id($p23->getId());
        $r10->setDistancia('125');
        $r10->save();

        $r11 = new PuntoNavegacionPuntoNavegacion();
        $r11->setPuntoNavegacion_1Id($p9->getId());
        $r11->setPuntoNavegacion_2Id($p11->getId());
        $r11->setDistancia('300');
        $r11->save();

        $r12 = new PuntoNavegacionPuntoNavegacion();
        $r12->setPuntoNavegacion_1Id($p11->getId());
        $r12->setPuntoNavegacion_2Id($p12->getId());
        $r12->setDistancia('125');
        $r12->save();

        $r13 = new PuntoNavegacionPuntoNavegacion();
        $r13->setPuntoNavegacion_1Id($p11->getId());
        $r13->setPuntoNavegacion_2Id($p22->getId());
        $r13->setDistancia('125');
        $r13->save();

        $r14 = new PuntoNavegacionPuntoNavegacion();
        $r14->setPuntoNavegacion_1Id($p11->getId());
        $r14->setPuntoNavegacion_2Id($p13->getId());
        $r14->setDistancia('300');
        $r14->save();

        $r15 = new PuntoNavegacionPuntoNavegacion();
        $r15->setPuntoNavegacion_1Id($p13->getId());
        $r15->setPuntoNavegacion_2Id($p14->getId());
        $r15->setDistancia('125');
        $r15->save();

        $r16 = new PuntoNavegacionPuntoNavegacion();
        $r16->setPuntoNavegacion_1Id($p13->getId());
        $r16->setPuntoNavegacion_2Id($p15->getId());
        $r16->setDistancia('450');
        $r16->save();

        $r17 = new PuntoNavegacionPuntoNavegacion();
        $r17->setPuntoNavegacion_1Id($p15->getId());
        $r17->setPuntoNavegacion_2Id($p16->getId());
        $r17->setDistancia('125');
        $r17->save();

        $r18 = new PuntoNavegacionPuntoNavegacion();
        $r18->setPuntoNavegacion_1Id($p15->getId());
        $r18->setPuntoNavegacion_2Id($p17->getId());
        $r18->setDistancia('525');
        $r18->save();

        $r19 = new PuntoNavegacionPuntoNavegacion();
        $r19->setPuntoNavegacion_1Id($p17->getId());
        $r19->setPuntoNavegacion_2Id($p18->getId());
        $r19->setDistancia('275');
        $r19->save();

        $r20 = new PuntoNavegacionPuntoNavegacion();
        $r20->setPuntoNavegacion_1Id($p17->getId());
        $r20->setPuntoNavegacion_2Id($p19->getId());
        $r20->setDistancia('37.5');
        $r20->save();

        $r21 = new PuntoNavegacionPuntoNavegacion();
        $r21->setPuntoNavegacion_1Id($p19->getId());
        $r21->setPuntoNavegacion_2Id($p20->getId());
        $r21->setDistancia('275');
        $r21->save();

        $r22 = new PuntoNavegacionPuntoNavegacion();
        $r22->setPuntoNavegacion_1Id($p20->getId());
        $r22->setPuntoNavegacion_2Id($p21->getId());
        $r22->setDistancia('162.5');
        $r22->save();

        $r23 = new PuntoNavegacionPuntoNavegacion();
        $r23->setPuntoNavegacion_1Id($p2->getId());
        $r23->setPuntoNavegacion_2Id($p24->getId());
        $r23->setDistancia('425');
        $r23->save();
        
        $r24 = new PuntoNavegacionPuntoNavegacion();
        $r24->setPuntoNavegacion_1Id($p24->getId());
        $r24->setPuntoNavegacion_2Id($p25->getId());
        $r24->setDistancia('515');
        $r24->save();
        
        $r25 = new PuntoNavegacionPuntoNavegacion();
        $r25->setPuntoNavegacion_1Id($p24->getId());
        $r25->setPuntoNavegacion_2Id($p26->getId());
        $r25->setDistancia('440');
        $r25->save();
        
        $r26 = new PuntoNavegacionPuntoNavegacion();
        $r26->setPuntoNavegacion_1Id($p26->getId());
        $r26->setPuntoNavegacion_2Id($p27->getId());
        $r26->setDistancia('100');
        $r26->save();
        
        $r27 = new PuntoNavegacionPuntoNavegacion();
        $r27->setPuntoNavegacion_1Id($p27->getId());
        $r27->setPuntoNavegacion_2Id($p28->getId());
        $r27->setDistancia('350');
        $r27->save();
        
        $r28 = new PuntoNavegacionPuntoNavegacion();
        $r28->setPuntoNavegacion_1Id($p27->getId());
        $r28->setPuntoNavegacion_2Id($p29->getId());
        $r28->setDistancia('140');
        $r28->save();
        
        $r29 = new PuntoNavegacionPuntoNavegacion();
        $r29->setPuntoNavegacion_1Id($p29->getId());
        $r29->setPuntoNavegacion_2Id($p30->getId());
        $r29->setDistancia('350');
        $r29->save();
        
        $r30 = new PuntoNavegacionPuntoNavegacion();
        $r30->setPuntoNavegacion_1Id($p29->getId());
        $r30->setPuntoNavegacion_2Id($p31->getId());
        $r30->setDistancia('110');
        $r30->save();
        
        $r31 = new PuntoNavegacionPuntoNavegacion();
        $r31->setPuntoNavegacion_1Id($p31->getId());
        $r31->setPuntoNavegacion_2Id($p32->getId());
        $r31->setDistancia('580');
        $r31->save();
        
        $r32 = new PuntoNavegacionPuntoNavegacion();
        $r32->setPuntoNavegacion_1Id($p26->getId());
        $r32->setPuntoNavegacion_2Id($p33->getId());
        $r32->setDistancia('250');
        $r32->save();
        
        $r33 = new PuntoNavegacionPuntoNavegacion();
        $r33->setPuntoNavegacion_1Id($p33->getId());
        $r33->setPuntoNavegacion_2Id($p34->getId());
        $r33->setDistancia('580');
        $r33->save();
        
        $r34 = new PuntoNavegacionPuntoNavegacion();
        $r34->setPuntoNavegacion_1Id($p33->getId());
        $r34->setPuntoNavegacion_2Id($p35->getId());
        $r34->setDistancia('340');
        $r34->save();
        
        $r35 = new PuntoNavegacionPuntoNavegacion();
        $r35->setPuntoNavegacion_1Id($p35->getId());
        $r35->setPuntoNavegacion_2Id($p36->getId());
        $r35->setDistancia('190');
        $r35->save();
        
        $r36 = new PuntoNavegacionPuntoNavegacion();
        $r36->setPuntoNavegacion_1Id($p35->getId());
        $r36->setPuntoNavegacion_2Id($p37->getId());
        $r36->setDistancia('380');
        $r36->save();
        
        $r37 = new PuntoNavegacionPuntoNavegacion();
        $r37->setPuntoNavegacion_1Id($p37->getId());
        $r37->setPuntoNavegacion_2Id($p38->getId());
        $r37->setDistancia('190');
        $r37->save();
        
        $r38 = new PuntoNavegacionPuntoNavegacion();
        $r38->setPuntoNavegacion_1Id($p37->getId());
        $r38->setPuntoNavegacion_2Id($p39->getId());
        $r38->setDistancia('380');
        $r38->save();
        
        $r39 = new PuntoNavegacionPuntoNavegacion();
        $r39->setPuntoNavegacion_1Id($p39->getId());
        $r39->setPuntoNavegacion_2Id($p40->getId());
        $r39->setDistancia('190');
        $r39->save();
        
        $r40 = new PuntoNavegacionPuntoNavegacion();
        $r40->setPuntoNavegacion_1Id($p39->getId());
        $r40->setPuntoNavegacion_2Id($p41->getId());
        $r40->setDistancia('380');
        $r40->save();
        
        $r41 = new PuntoNavegacionPuntoNavegacion();
        $r41->setPuntoNavegacion_1Id($p41->getId());
        $r41->setPuntoNavegacion_2Id($p42->getId());
        $r41->setDistancia('190');
        $r41->save();
        
        $r42 = new PuntoNavegacionPuntoNavegacion();
        $r42->setPuntoNavegacion_1Id($p41->getId());
        $r42->setPuntoNavegacion_2Id($p43->getId());
        $r42->setDistancia('825');
        $r42->save();
        
        $r43 = new PuntoNavegacionPuntoNavegacion();
        $r43->setPuntoNavegacion_1Id($p43->getId());
        $r43->setPuntoNavegacion_2Id($p44->getId());
        $r43->setDistancia('255');
        $r43->save();
        
        $r44 = new PuntoNavegacionPuntoNavegacion();
        $r44->setPuntoNavegacion_1Id($p43->getId());
        $r44->setPuntoNavegacion_2Id($p45->getId());
        $r44->setDistancia('145');
        $r44->save();
        
        $r45 = new PuntoNavegacionPuntoNavegacion();
        $r45->setPuntoNavegacion_1Id($p45->getId());
        $r45->setPuntoNavegacion_2Id($p47->getId());
        $r45->setDistancia('130');
        $r45->save();
        
        $r46 = new PuntoNavegacionPuntoNavegacion();
        $r46->setPuntoNavegacion_1Id($p45->getId());
        $r46->setPuntoNavegacion_2Id($p46->getId());
        $r46->setDistancia('215');
        $r46->save();
        
        $r47 = new PuntoNavegacionPuntoNavegacion();
        $r47->setPuntoNavegacion_1Id($p47->getId());
        $r47->setPuntoNavegacion_2Id($p48->getId());
        $r47->setDistancia('220');
        $r47->save();
        
        $r48 = new PuntoNavegacionPuntoNavegacion();
        $r48->setPuntoNavegacion_1Id($p48->getId());
        $r48->setPuntoNavegacion_2Id($p49->getId());
        $r48->setDistancia('350');
        $r48->save();
        
        $r49 = new PuntoNavegacionPuntoNavegacion();
        $r49->setPuntoNavegacion_1Id($p49->getId());
        $r49->setPuntoNavegacion_2Id($p50->getId());
        $r49->setDistancia('190');
        $r49->save();
        
        $r50 = new PuntoNavegacionPuntoNavegacion();
        $r50->setPuntoNavegacion_1Id($p49->getId());
        $r50->setPuntoNavegacion_2Id($p51->getId());
        $r50->setDistancia('350');
        $r50->save();
        
        $r51 = new PuntoNavegacionPuntoNavegacion();
        $r51->setPuntoNavegacion_1Id($p51->getId());
        $r51->setPuntoNavegacion_2Id($p52->getId());
        $r51->setDistancia('190');
        $r51->save();
        
        $r52 = new PuntoNavegacionPuntoNavegacion();
        $r52->setPuntoNavegacion_1Id($p47->getId());
        $r52->setPuntoNavegacion_2Id($p53->getId());
        $r52->setDistancia('240');
        $r52->save();
        
        $r53 = new PuntoNavegacionPuntoNavegacion();
        $r53->setPuntoNavegacion_1Id($p53->getId());
        $r53->setPuntoNavegacion_2Id($p54->getId());
        $r53->setDistancia('160');
        $r53->save();
        
        $r54 = new PuntoNavegacionPuntoNavegacion();
        $r54->setPuntoNavegacion_1Id($p54->getId());
        $r54->setPuntoNavegacion_2Id($p55->getId());
        $r54->setDistancia('80');        
        $r54->save();
        
        $r55 = new PuntoNavegacionPuntoNavegacion();
        $r55->setPuntoNavegacion_1Id($p55->getId());
        $r55->setPuntoNavegacion_2Id($p56->getId());
        $r55->setDistancia('120');
        $r55->save();
        
        $r56 = new PuntoNavegacionPuntoNavegacion();
        $r56->setPuntoNavegacion_1Id($p54->getId());
        $r56->setPuntoNavegacion_2Id($p57->getId());
        $r56->setDistancia('160');
        $r56->save();
        
        $r57 = new PuntoNavegacionPuntoNavegacion();
        $r57->setPuntoNavegacion_1Id($p57->getId());
        $r57->setPuntoNavegacion_2Id($p58->getId());
        $r57->setDistancia('80');
        $r57->save();
        
        $r58 = new PuntoNavegacionPuntoNavegacion();
        $r58->setPuntoNavegacion_1Id($p58->getId());
        $r58->setPuntoNavegacion_2Id($p59->getId());
        $r58->setDistancia('120');
        $r58->save();
        
        $r59 = new PuntoNavegacionPuntoNavegacion();
        $r59->setPuntoNavegacion_1Id($p57->getId());
        $r59->setPuntoNavegacion_2Id($p60->getId());
        $r59->setDistancia('130');
        $r59->save();
        
        $r60 = new PuntoNavegacionPuntoNavegacion();
        $r60->setPuntoNavegacion_1Id($p60->getId());
        $r60->setPuntoNavegacion_2Id($p61->getId());
        $r60->setDistancia('110');
        $r60->save();
        
        /**********************FOTOS**********************/
        
        $foto = new Multimedia();
        $foto->setNombre('Biblioteca1.jpeg');
        $foto->setTipo(MultimediaType::photo);
        $foto->setEstructuraId($aula_j->getId());
        $foto->save();
        
        $foto = new Multimedia();
        $foto->setNombre('Biblioteca2.jpeg');
        $foto->setTipo(MultimediaType::photo);
        $foto->setEstructuraId($aula_j->getId());
        $foto->save();        
        
        $foto = new Multimedia();
        $foto->setNombre('Biblioteca3.jpeg');
        $foto->setTipo(MultimediaType::photo);
        $foto->setEstructuraId($aula_j->getId());
        $foto->save();        
                
        $foto = new Multimedia();
        $foto->setNombre('Biblioteca5.jpeg');
        $foto->setTipo(MultimediaType::photo);
        $foto->setEstructuraId($aula_j->getId());
        $foto->save();        
        
        $foto = new Multimedia();
        $foto->setNombre('Biblioteca6.jpeg');
        $foto->setTipo(MultimediaType::photo);
        $foto->setEstructuraId($aula_j->getId());
        $foto->save();        
        
        $foto = new Multimedia();
        $foto->setNombre('Biblioteca7.jpeg');
        $foto->setTipo(MultimediaType::photo);
        $foto->setEstructuraId($aula_j->getId());
        $foto->save();        
        
        $foto = new Multimedia();
        $foto->setNombre('Biblioteca8.jpeg');
        $foto->setTipo(MultimediaType::photo);
        $foto->setEstructuraId($aula_j->getId());
        $foto->save();        
        
        $foto = new Multimedia();
        $foto->setNombre('Biblioteca9.jpeg');
        $foto->setTipo(MultimediaType::photo);
        $foto->setEstructuraId($aula_j->getId());
        $foto->save();        
        
        $foto = new Multimedia();
        $foto->setNombre('Biblioteca10.jpeg');
        $foto->setTipo(MultimediaType::photo);
        $foto->setEstructuraId($aula_j->getId());
        $foto->save();        
        
        $foto = new Multimedia();
        $foto->setNombre('Biblioteca11.jpeg');
        $foto->setTipo(MultimediaType::photo);
        $foto->setEstructuraId($aula_j->getId());
        $foto->save();
        
        $foto = new Multimedia();
        $foto->setNombre('Aula 1 - PL1.jpeg');
        $foto->setTipo(MultimediaType::photo);
        $foto->setEstructuraId($aula_pl_1->getId());
        $foto->save();        
        
        $foto = new Multimedia();
        $foto->setNombre('Aula 2 - APL.jpeg');
        $foto->setTipo(MultimediaType::photo);
        $foto->setEstructuraId($aula_apl_2->getId());
        $foto->save();
        
        $foto = new Multimedia();
        $foto->setNombre('Aula 3 - COBOL.jpeg');
        $foto->setTipo(MultimediaType::photo);
        $foto->setEstructuraId($aula_cobol_3->getId());
        $foto->save();        
        
        $foto = new Multimedia();
        $foto->setNombre('Aula 4 - LISP.jpeg');
        $foto->setTipo(MultimediaType::photo);
        $foto->setEstructuraId($aula_lisp->getId());
        $foto->save();               
        
        $foto = new Multimedia();
        $foto->setNombre('Aula 5 - FORTRAN.jpeg');
        $foto->setTipo(MultimediaType::photo);
        $foto->setEstructuraId($aula_k->getId());
        $foto->save();
    }
}

?>
