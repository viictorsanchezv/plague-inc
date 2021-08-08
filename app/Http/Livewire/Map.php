<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Map extends Component
{
    public $civil, $militar, $gobierno, $postCount;
    public $poblacion_neutral=34174, $poblacion_a_favor=9150;
    public $estabilidad;
    public $reputacion=90;
    public $pobl_insurgente=2000;
    public function render()
    {
        return view('livewire.map');
    }

    protected $listeners = ['postAdded'     => 'incrementPostCount',
                            'cal_poblacion' => 'cal_poblacion'];

    public function incrementPostCount()
    {   
        $band = false;
        $random = rand( 0, 100);
        if($random == 10){
            $band = true;
            if($this->poblacion_neutral > 10){
                $this->poblacion_neutral -= 10;
                $this->pobl_insurgente +=10;
            }
            
        }else{
            $this->cal_evento($random);
        }
        $this->postCount += 1;
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

        }else{
            if($rand >= 10 && $rand < 15){

            }else{
                if($rand >= 15 && $rand < 20){

                }
            }
        }

    }
}
