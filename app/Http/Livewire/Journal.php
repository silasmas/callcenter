<?php

namespace App\Http\Livewire;

use App\Models\client;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class Journal extends Component
{
    public function render()
    {
        $today = date("Y-m-d h:m:s");
        $journal=client::orderBy('client_libelles.created_at',"ASC")
        ->join("client_libelles","clients.id","client_libelles.client_id")
        ->where([['client_libelles.user_id',Auth::user()->id]])
        // ->where([['client_libelles.user_id',Auth::user()->id],['client_libelles.created_at',$today]])
        ->get();

        return view('livewire.journal',compact("journal"));
    }
}
