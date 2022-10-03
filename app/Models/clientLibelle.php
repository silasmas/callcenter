<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientLibelle extends Model
{
    use HasFactory;
    protected $dates=['created_at','updated_at'];
    protected $guarded=[];
}
