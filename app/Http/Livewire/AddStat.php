<?php

namespace App\Http\Livewire;

use App\Models\sujet;
use App\Models\libelle;
use Livewire\Component;

class AddStat extends Component
{
    public  $titr2;
    public  $descd;
    public  $ids;
    protected $rules = [
        'ids' => 'required|int',
    ];
    public function submit2()
    {
        $this->validate();
 
       $rep= libelle::create([
            'titre' => $this->titre2,
            'description' => $this->descd,
            'sujet_id' => $this->ids,
        ]);
        if ($rep) {
            $this->descd="";
            $this->titre2="";
            $this->ids="";
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'titre' => 'Réussit',
                'from'=>"add",
                'text' =>"Le statu est enregistrer avec succès",
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'titre' => 'Erreur',
                'from'=>"add",
                'text' =>"Erreur d'enregistrement",
            ]);
        }
        
    }    public function render()
    {
        $statu=sujet::all();
        return view('livewire.add-stat',compact("statu"));
    }
}
