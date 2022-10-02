<?php

namespace App\Http\Livewire;

use App\Models\libelle;
use App\Models\script;
use App\Models\sujet;
use Livewire\Component;

class AddStatut extends Component
{

 
    public $titre;

  
    public function addstatut()
    {
       $rep= sujet::create([
            'titre' => $this->titre,
            'description' => $this->description,
        ]);
        if ($rep) {
            $this->titre="";
            $this->description="";
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'titre' => 'Réussit',
                'from'=>"add",
                'text' =>"Le script est enregistrer avec succès",
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'titre' => 'Erreur',
                'from'=>"add",
                'text' =>"Erreur d'enregistrement",
            ]);
        }
        
    }
   
    public function render()
    {
        $statu=sujet::all();
        return view('livewire.add-statut');
    }
}
