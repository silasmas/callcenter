<?php

namespace App\Models;

use App\Models\libelle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class sujet extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function libelle(){
        return $this->hasMany(libelle::class);
    }
}
