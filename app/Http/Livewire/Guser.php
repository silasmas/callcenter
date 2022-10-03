<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Guser extends Component
{
    public $name="";
  
    public $prenom="";
    public $sexe="";
    public $telephone="";
    public $email="";
    public $fonction="";
    public $niveau="";
    public $pwd="";
    public $idu="";
    public $openedit=false;
    protected $rules = [
        'name' => 'required|min:3',
        'niveau' => 'required',
        'email' => 'required|email|unique:users',
        'telephone' => 'required|unique:users',
    ];
    public function addUser(){

        $this->validate();
        $user=User::create([
            "name"=>$this->name,
            "prenom"=>$this->prenom,
            "sexe"=>$this->sexe,
            "telephone"=>$this->telephone,
            "email"=>$this->email,
            "fonction"=>$this->fonction,
            "niveau"=>$this->niveau,
            "password"=>Hash::make($this->pwd),
        ]);
        if ($user) {
            $this->name="";
            $this->prenom="";
            $this->sexe="";
            $this->telephone="";
            $this->email="";
            $this->fonction="";
            $this->niveau="";
            $this->pwd="";
            session()->flash('message','Enregistrement réussit');
            session()->flash('type', 'success');
        } else {
            session()->flash('message','Erreur d\'enregistrement');
            session()->flash('type', 'danger');
        }
  
    }
    public function updateUser(){
       
        $user=User::find($this->idu);
       
            $user->name=$this->name;
            $user->prenom=$this->prenom;
            $user->sexe=$this->sexe;
            $user->telephone=$this->telephone;
            $user->email=$this->email;
            $user->fonction=$this->fonction;
            $user->niveau=$this->niveau;
            $user->password=$this->pwd==""?$user->password:$this->pwd;
           $user->save();
        if ($user) {
            $this->name="";
            $this->prenom="";
            $this->sexe="";
            $this->telephone="";
            $this->email="";
            $this->fonction="";
            $this->niveau="";
            $this->pwd="";
            session()->flash('message','Modification réussie');
            session()->flash('type', 'success');
        } else {
            session()->flash('message','Erreur d\'enregistrement');
            session()->flash('type', 'danger');
        }
  
    }
    public function edite($id){
        $user=User::find($id);
            $this->name=$user->name;
            $this->prenom=$user->prenom;
            $this->sexe=$user->sexe;
            $this->telephone=$user->telephone;
            $this->email=$user->email;
            $this->fonction=$user->fonction;
            $this->niveau=$user->niveau;
            $this->idu=$user->id;
            $this->openedit=true;
    }
    public function render()
    {
        $users=User::all();
        return view('livewire.guser',compact("users"));
    }
}
