<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objectaccesstocompany extends Model
{
    use HasFactory;

    protected $fillable = ['company_id','manageobject_id']; // Add more fillable fields as needed


}
