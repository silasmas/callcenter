<?php

namespace App\Models;

use App\Models\libelle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class client extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function appel(){
        return $this->belongsToMany(libelle::class);
    }
}
