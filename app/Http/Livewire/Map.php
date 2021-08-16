<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Map extends Component
{
    public $civil, $militar, $gobierno, $postCount;
    public $poblacion_neutral=34174, $poblacion_a_favor=9150;
    public $estabilidad=0;
    public $reputacion=90;
    public $pobl_insurgente=2000, $capacidad_hablar, $fuerza;
    public $dinero=50, $corrupcion=0, $inflacion=0;
    public $nivel_apoyo=10;
    public $ataque=false;
    protected $listeners = ['operaciones'       => 'operaciones',
                            'cal_poblacion'     => 'cal_poblacion',
                            'poblacion'         => 'aumentar_poblacion',
                            'dynamic_events'    => 'dynamic_events'];                      
    public $titulo_operacion, $descripcion_operacion, $valor_operacion=0;
    public $bandera_evento_informativo = true;
    public $operaciones = array(
        'civil'     => array(
            'desarrollo'         => [
                'titulo'         => 'Desarrollo de Discusiones',
                'descripcion'    => 'Trabajas con la gente en local para comprender sus requisitos, locales, laborales y comerciales',
                'costo'          => 2
            ],
            'necesidad'          => [
                'titulo'         => 'Discusion de servicio',
                'descripcion'    => 'Trabajas con la gente en local para comprender sus requisitos de educacion, salud, agua y saneamiento',
                'costo'          => 2  
            ],
            'infraestructura'    => [
                'titulo'         => 'Discutir por Infraestructura',
                'descripcion'    => 'Trabajas con la gente en local para comprender sus requisitos, carreteras, energias y telecomunicaciones',
                'costo'          => 2
            ]
        ),
        'gobierno'  => array(
            'corrupcion'         => [
                'titulo'         => 'Anticorrupción I',
                'descripcion'    => 'Establece una linea directa basica y un sistema de informes de sitios web para que las victimas de corrupcion puedan denunciar abusos de poder, como el soborno y el nepotismo.',
                'costo'          => 11
            ],
            'milicia'            => [
                'titulo'         => 'Milicia local',
                'descripcion'    => 'Contratar y armar a ciudadanos locales sin entrenamiento para mantener la paz. <br> Mejora la seguridad de la zona, lo que dificulta que los insurgentes tomen el control pero disminuye el Nivel de apoyo',
                'costo'          => 1
            ],
            'distritos'          => [
                'titulo'         => 'Distritos representativos',
                'descripcion'    => 'Asignas representantes de la region a zonas individuales para que puedan trabajar con lideres de la comunidad y recopilar informacion confiable sobre lo que esta sucediendo',
                'costo'          => 2
            ]
        ),
        'militar'   =>  array(
            'coalicion'          => [
                'titulo'         => 'Iniciativas Militares',
                'descripcion'    => 'Esta area de iniciativa s centra en las capacidades militares nacionales y de la coalicion',
                'costo'          => 2
            ],
        ),
    );

    public $events = array(
            '0' =>array(
                'title' => 'Si tienes suficientes Apoyos en una zona (Y no hay Insurgentes presentes), la zona se vuelve ESTABLE ',
                'opciones' => null
            ),
            '1' =>array(
                'title' => 'En las zonas es importante para las actividades militares y civiles. Obtener la iniciativa gubernamental de representantes de distritos para reunir Intel.
                            Las zonas sin intel estan sombreadas en gris. ',
                'opciones' => null
            ),
            '2' =>array(
                'title' => 'Tiene dinero que se puede gastar para mejorar la estabilidad en toda la region. Presiona el boton Operacion para ver las iniciativas civiles
                            gubernamentales y militares para autorizar.',
                'opciones' => null
            ),
            '3' =>array(
                
            ),
            '4' =>array(
                
            ),
            '5' =>array(
                
            ),
            '6' =>array(
                
            ),
            '7' =>array(
                
            ),
            '8' =>array(
                
            ),
            '9' =>array(
                
            ),
            '10' =>array(

            ),
            '11' =>array(
                
            ),
            '12' =>array(
                
            ),
            '13' =>array(
                
            ),
            '14' =>array(
                
            ),
            '15' =>array(
                
            ),
            '16' =>array(
                
            ),
            '17' =>array(
                
            ),
            '18' =>array(
                
            ),
            '19' =>array(
                
            ),
            '20' =>array(
                
            ),
    );

    public $texto_evento;
    public $opciones_evento;

    public function render()
    {
        return view('livewire.map')->with('bandera_evento_informativo', $this->bandera_evento_informativo);
    }

    public function operaciones($tipo,$operacion)
    {   
        if($this->dinero > $this->operaciones[$tipo][$operacion]['costo']){
            $this->dinero -=  $this->operaciones[$tipo][$operacion]['costo']+$this->operaciones[$tipo][$operacion]['costo']*($this->inflacion/100);
            if($this->inflacion < 99){
                $this->inflacion +=2;
                $this->nivel_apoyo +=10;
                $this->estabilidad += 5;
                $this->corrupcion += 1;
            }
            
        }
        $this->titulo_operacion         = $this->operaciones[$tipo][$operacion]['titulo'];
        $this->descripcion_operacion    = $this->operaciones[$tipo][$operacion]['descripcion'];
        $this->valor_operacion          = $this->operaciones[$tipo][$operacion]['costo'];
    }

    public function aumentar_poblacion(){
        $random = rand( 0, 100);
        if($random == 10){
            if($this->poblacion_neutral > 10){
                $this->poblacion_neutral -= 10;
                $this->pobl_insurgente +=10;
            }     
        }else{
            $this->cal_evento($random);
        }
    }

    public function cal_poblacion(){
        if($this->reputacion > 20 ){
            if($this->poblacion_neutral > 3){
                $this->poblacion_a_favor +=3;
                $this->poblacion_neutral -= 3;
            } 
        }
    }

    public function cal_evento($rand){
        if($rand > 0 && $rand < 10){
            $this->ataque = true;
            $this->nivel_apoyo -= 2;
        }else{
            if($rand >= 10 && $rand < 15){

            }else{
                if($rand >= 15 && $rand < 20){

                }
            }
        }

    }

    public function cal_dinero(){
        if($this->reputacion > 20){
            $this->dinero+=3;
        }
    }


    public function dynamic_events(){
        $random = rand( 0, 20);
        $band = true;
        if($band == true){
            $this->texto_evento = 'Insurgentes atacando ve ahora a crear militares y atacarlos';
            $this->opciones_evento;    
        }

    }
}
