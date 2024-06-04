<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objectaccess extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','manageobject_id']; // Add more fillable fields as needed


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function manageobject()
    {
        return $this->belongsTo(Manageobject::class);
    }
    
}
