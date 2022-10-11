<?php

namespace App\Http\Livewire;

use App\Models\client;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\{
    Http\Livewire\LivewireDatatable,
    Column,
    NumberColumn,
    DateColumn
};
class Dashbord extends LivewireDatatable
{
    public $date;
    public $all = [];

    protected $listeners = ['actualise' => '$refresh'];
    public function byDate()
    {
        // dd($this->date);
        $this->all = client::selectRaw("clients.*,users.name un,users.prenom up,client_libelles.*")->orderBy('client_libelles.created_at', "ASC")
            ->join("client_libelles", "clients.id", "client_libelles.client_id")
            ->join("users", "users.id", "client_libelles.user_id")
            ->whereBetween('client_libelles.created_at', [$this->date . " 00:00:00", $this->date . " 23:59:59"])
            ->get();
            $this->emitself("actualise");
        //dd($this->all);

    }
    public function mount(){


    }
    public function render()
    {
        if ($this->date == "") {
            $this->all = client::selectRaw("clients.*,users.name un,users.prenom up,client_libelles.*")->orderBy('client_libelles.created_at', "ASC")
                ->join("client_libelles", "clients.id", "client_libelles.client_id")
                ->join("users", "users.id", "client_libelles.user_id")
                ->get();
        } else{
            $this->all = client::selectRaw("clients.*,users.name un,users.prenom up,client_libelles.*")->orderBy('client_libelles.created_at', "ASC")
            ->join("client_libelles", "clients.id", "client_libelles.client_id")
            ->join("users", "users.id", "client_libelles.user_id")
            ->whereBetween('client_libelles.created_at', [$this->date . " 00:00:00", $this->date . " 23:59:59"])
            ->get();
            // $this->all =$this->date;
        }
        return view('livewire.dashbord');
    }
}
