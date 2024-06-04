<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objecttorole extends Model
{
    use HasFactory;

    protected $fillable = ['rollmanage_id','manageobject_id']; // Add more fillable fields as needed


    public function manageobject()
    {
        return $this->belongsTo(Manageobject::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
