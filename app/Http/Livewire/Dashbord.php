<?php

namespace App\Http\Livewire;

use App\Models\client;
use Livewire\Component;

class Dashbord extends Component
{
    public function render()
    {
        $today = date("Y-m-d h:m:s");
        $byAgent=client::selectRaw("clients.*,client_libelles.*")->orderBy('client_libelles.created_at',"ASC")
        ->join("client_libelles","clients.id","client_libelles.client_id")
       ->get();
        $all=client::selectRaw("clients.*,users.name un,users.prenom up,client_libelles.*")->orderBy('client_libelles.created_at',"ASC")
        ->join("client_libelles","clients.id","client_libelles.client_id")
        ->join("users","users.id","client_libelles.user_id")
        // ->groupBy('users.name')
        // ->where([['client_libelles.user_id',Auth::user()->id],['client_libelles.created_at',$today]])
        ->get();
        // dd($byAgent);
        return view('livewire.dashbord',compact('all',"byAgent"));
    }
}
