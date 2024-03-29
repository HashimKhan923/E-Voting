<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;


    public function votes()
    {
        return $this->hasMany(Vote::class,'party_id');
    }
}
