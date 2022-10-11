<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\sujet;
use App\Models\client;
use App\Models\libelle;
use Livewire\Component;
use App\Models\clientLibelle;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public $existe=true;
    public $modif=true;
    public $client="";
    public $user;
    public $tab;
    public $ville="";
    public $commune="";
    public $nom="";
    public $postnom="";
    public $prenom="";
    public $telephone="";
    public $tel2="";
    public $tel3="";
    public $email="";
    public $avenu="";
    public $numero="";
    public $quartier="";
    public $statut="";
    public $libelle="";
    public $type="";
    public $date="";
    public $ids="";
    public $sexe="";
    public $description="";
    public $libelles=[];
    public $statuts=null;
    public $selectstatut=null;
    protected $queryString=[
        'client'=>['except'=>'']
    ];

   
    
    private function s($val){
        return $val>2?"s":"";
    }
    public function amount(){
        $this->libelles=collect();
    }
    public function updatedSelectStatut(){
       
        $this->libelles=libelle::where("sujet_id",$this->selectstatut)
        ->get();
        // dd(  $this->libelle);
    }
    public function sousmenu($id){
        $this->libelles=libelle::where("id",$id)
        ->get();
    }
    public function updatedClient(){
        $this->tab = client::where("nom","LIKE","{$this->client}")
        ->orWhere("telephone","LIKE","{$this->client}")
        ->orWhere("nom","LIKE","{$this->client}")
        ->orWhere("prenom","LIKE","{$this->client}")
        ->orWhere("email","LIKE","{$this->client}")
        ->first();

        //  dd($this->tab);
        if ($this->tab) {
            $this->existe=false;
            $this->ids=$this->tab->id;
            // $this->user=$this->tab;
            //session()->with(['message'=>count($tab).' Client(s) trouvé(s)',"type"=>"success"]);
            session()->flash('message',' Client '.$this->s($this->tab->count()). ' trouvé'.$this->s($this->tab->count()));
            session()->flash('type', 'success');
        } else {
            $this->existe=true;
            session()->flash('message', 'Aucun client trouvé');
            session()->flash('type', 'danger');
        }

        return $this->tab ;
    }
    protected $rules = [
        'nom' => 'required',
        'telephone' => 'required',
        'date' => 'required',
        'type'=> 'required',
    ];
    public function saveClient(){
        if ($this->ids=="") {
            $this->validate();

           $client= client::create([
                'nom' => $this->nom,
                'postnom' => $this->postnom,
                'prenom' => $this->prenom,
                'sexe' => $this->sexe,
                'telephone' => $this->telephone,
                'tel2' => $this->tel2,
                'tel3' => $this->tel3,
                'ville' => $this->ville,
                'commune' => $this->commune,
                'quartier' => $this->quartier,
                'avenu' => $this->avenu,
                'numero' => $this->numero,
                'email' => $this->email,
            ]);
            if($client){
                if(empty($this->libelle)){
                    $st=sujet::find($this->statut);
                    clientLibelle::create([
                        'client_id' => $client->id,
                        'libelle_id' => $st->titre,
                        'user_id' =>Auth::user()->id,
                        'commentaire' => $this->description,
                        'created_at' => $this->date,
                        'type' => $this->type,
                    ]);
                    $this->vider();
                    $this->notify("success","Enregistrement réussit","Merci");

                }else{
                    clientLibelle::create([
                        'client_id' => $client->id,
                        'libelle_id' => $this->libelle,
                        'user_id' => Auth::user()->id,
                        'commentaire' => $this->description,
                        'type' => $this->type,
                        'created_at' => $this->date,
                    ]);
                    
                    $this->vider();
                    $this->notify("success","Enregistrement réussit","Merci");

                }
            }
        
        } else {
            $this->validate();
           $cl= client::find($this->ids);
           if($cl){
                $cl->nom = $this->nom;
                $cl->postnom = $this->postnom;
                $cl->prenom = $this->prenom;
                $cl->sexe = $this->sexe;
                $cl->telephone = $this->telephone;
                $cl->tel2 = $this->tel2;
                $cl->tel3 = $this->tel3;
                $cl->ville = $this->ville;
                $cl->commune = $this->commune;
                $cl->quartier = $this->quartier;
                $cl->avenu = $this->avenu;
                $cl->numero = $this->numero;
                $cl->email = $this->email;
                $cl->save();
            if(empty($this->libelle)){
                $st=sujet::find($this->statut);
                clientLibelle::create([
                    'client_id' => $cl->id,
                    'libelle_id' => $st->titre,
                    'user_id' =>Auth::user()->id,
                    'commentaire' => $this->description,
                    'created_at' => $this->date,
                    'type' => $this->type,
                ]);
                
                $this->vider();
                $this->notify("success","Enregistrement réussit","Merci");
            }else{
                clientLibelle::create([
                    'client_id' => $cl->id,
                    'libelle_id' => $this->libelle,
                    'user_id' => Auth::user()->id,
                    'commentaire' => $this->description,
                    'created_at' => $this->date,
                ]);
                
                $this->vider();
                $this->notify("success","Enregistrement réussit","Merci");
            }
        }

        }

    }
    public function modifClient(){
        // dd('ok');
        if ($this->ids=="") {
            $this->vider();
            $this->notify("danger","Echec de modification","Merci");
        } else {
           $cl= client::find($this->ids);
           if($cl){
                $cl->nom = $this->nom==""?$cl->nom:$this->nom;
                $cl->postnom = $this->postnom==""?$cl->postnom:$this->postnom;
                $cl->prenom = $this->prenom==""?$cl->prenom:$this->prenom;
                $cl->sexe = $this->sexe==""?$cl->sexe:$this->sexe;
                $cl->telephone = $this->telephone==""?$cl->telephone:$this->telephone;
                $cl->tel2 = $this->tel2==""?$cl->tel2:$this->tel2;
                $cl->tel3 = $this->tel3==""?$cl->tel3:$this->tel3;
                $cl->ville = $this->ville==""?$cl->ville:$this->ville;
                $cl->commune = $this->commune==""?$cl->commune:$this->commune;
                $cl->quartier = $this->quartier==""?$cl->quartier:$this->quartier;
                $cl->avenu = $this->avenu==""?$cl->avenu:$this->avenu;
                $cl->numero = $this->numero==""?$cl->numero:$this->numero;
                $cl->email = $this->email==""?$cl->email:$this->email;
                $cl->save();
                $this->vider();
                $this->notify("success","Modification réussit","Merci");
        }

        }

    }
    private function notify($type,$msg,$titre){
        session()->flash('message', $msg);
                session()->flash('type',$type);
        $this->dispatchBrowserEvent('swal:modal',[
            'type'=>$type,
            'titre'=>$titre,
            'text'=>$msg,
            'from'=>"client",
        ]);
    }
    public function opneFolder($id){
        $this->user=client::where("id",$id)
        ->first();
         $this->nom=$this->user->nom;
         $this->postnom=$this->user->postnom;
         $this->prenom=$this->user->prenom;
         $this->telephone=$this->user->telephone;
         $this->tel2=$this->user->tel2;
         $this->tel3=$this->user->tel3;
         $this->email=$this->user->email;
         $this->quartier=$this->user->quartier;
         $this->avenu=$this->user->avenu;
         $this->numero=$this->user->numero;
         $this->ville=$this->user->ville;
         $this->commune=$this->user->commune;
         $this->sexe=$this->user->sexe;
         $this->ids=$this->user->id;
         $this->modif=false;
    }
   
    private function vider(){
        $this->nom="";
        $this->postnom="";
        $this->prenom="";
        $this->telephone="";
        $this->tel2="";
        $this->tel3="";
        $this->email="";
        $this->quartier="";
        $this->avenu="";
        $this->numero="";
        $this->ville="";
        $this->commune="";
        $this->sexe="";
        $this->ids="";
        $this->libelle="";
        $this->statut="";
        $this->client="";

        $this->libelles=[];
        $this->statuts=null;
        $this->selectstatut=null;
        $this->existe=true;
        $this->modif=true;
    }
    public function render()
    {
        $statu=sujet::all();
        return view('livewire.home',compact("statu"));
    }
}
