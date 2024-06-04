<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorymodel extends Model
{
    use HasFactory;

    public function categorytype()
    {
        return $this->belongsTo(Categorytype::class);
    }

}
