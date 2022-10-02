<?php

namespace App\Models;

use App\Models\sujet;
use App\Models\client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class libelle extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function sujet(){
        return $this->belongsToMany(sujet::class);
    }
    public function client(){
        return $this->belongsToMany(client::class);
    }
}
