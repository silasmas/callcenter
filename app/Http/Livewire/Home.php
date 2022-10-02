<?php

namespace App\Http\Livewire;

use App\Models\client;
use App\Models\libelle;
use App\Models\sujet;
use App\Models\User;
use Livewire\Component;

class Home extends Component
{
    public $existe=true;
    public $client="";
    public $user;
    public $tab;
    public $ville="";
    public $commune="";
    public $sexe="";
   
    protected $queryString=[
        'client'=>['except'=>'']
    ];

   
    
    private function s($val){
        return $val>2?"s":"";
    }

    public function updatedClient(){
        $this->tab = client::where("nom","{$this->client}")
        ->orWhere("telephone","{$this->client}")
        ->orWhere("prenom","{$this->client}")
        ->orWhere("email","{$this->client}")
        ->first();

        //  dd($this->tab);
        if ($this->tab) {
            $this->existe=false;
            // $this->user=$this->tab;
            //session()->with(['message'=>count($tab).' Client(s) trouvé(s)',"type"=>"success"]);
            session()->flash('message',' Client'.$this->s($this->tab->count()). ' trouvé'.$this->s($this->tab->count()));
            session()->flash('type', 'success');
        } else {
            $this->existe=true;
            session()->flash('message', 'Aucun client trouvé');
            session()->flash('type', 'danger');
        }

        return $this->tab ;
    }
    
    // public function updatedLibelle(){
    //     $this->libelle=libelle::where("id",$id)
    //     ->get();
    // }
    public function opneFolder($id){
        $this->user=client::where("id",$id)
        ->first();
         $this->ville=$this->user->ville;
         $this->commune=$this->user->commune;
         $this->sexe=$this->user->sexe;
    }
   
    public function render()
    {
    
        return view('livewire.home');
    }
}
