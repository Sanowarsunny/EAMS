<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable=['name','address', 'contctNo','status','business', 'user_id','created_at','updated_at','logo'];

    
}
