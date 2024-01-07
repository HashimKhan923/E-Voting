<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    public function voter()
    {
        return $this->belongsTo(User::class,'voter_id');
    }

    public function party()
    {
        return $this->belongsTo(Party::class, 'party_id');
    }
}
