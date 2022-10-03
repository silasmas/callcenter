<?php

namespace App\Http\Livewire;

use App\Models\script;
use Livewire\Component;

class ViewScript extends Component
{
    public function render()
    {
        $script=script::orderBy('niveau',"ASC")->get();
        return view('livewire.view-script',compact('script'));
    }
}
