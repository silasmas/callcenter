<?php

namespace App\Http\Livewire;

use App\Models\sujet;
use App\Models\libelle;
use Livewire\Component;

class Historique extends Component
{
    public $libelle=[];
    public $statut=null;
    public $selectstatut=null;
    public function amount(){
        $this->libelle=collect();
    }
    public function updatedSelectStatut(){
       
        $this->libelle=libelle::where("sujet_id",$this->selectstatut)
        ->get();
        // dd(  $this->libelle);
    }
    public function sousmenu($id){
        $this->libelle=libelle::where("id",$id)
        ->get();
    }
    public function render()
    {
        $statu=sujet::all();
        return view('livewire.historique',compact("statu"));
    }
}
