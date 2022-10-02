<?php

namespace App\Http\Livewire;

use App\Models\script;
use Livewire\Component;

class AddScript extends Component
{
    public  $niveau;
    public $titre;
    public  $description;

    protected $rules = [
        'niveau' => 'required|int',
        'titre' => 'required|min:3',
    ];
    public function submit()
    {
        $this->validate();
 
       $rep= script::create([
            'niveau' => $this->niveau,
            'titre' => $this->titre,
            'description' => $this->description,
        ]);
        if ($rep) {
            $this->niveau="";
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
        return view('livewire.add-script');
    }
}
