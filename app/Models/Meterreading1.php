<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meterreading extends Model
{
    use HasFactory;

    public function assetitem()
    {
        return $this->belongsTo(Assetitem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
