<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assetitem_po_dtl extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'assetitem_po_dtls';

    // Specify the fillable fields
    protected $fillable = [
        'assetitem_po_mst_id',
        'categorymodel_id',
        'brand_id',
        'unit_price',
        'quantity',
        'total_amount',
        'uom_id',
        'user_id',
        'updated_by',
    ];

    // Define the relationship to the master table
    public function assetitemPoMst()
    {
        return $this->belongsTo(Assetitem_po_mst::class, 'assetitem_po_mst_id');
    }

    // Define the relationship to the category model table
    public function categoryModel()
    {
        return $this->belongsTo(Categorymodel::class, 'categorymodel_id');
    }

    // Define the relationship to the brand table
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class, 'uom_id');
    }
    
    // Define the relationship to the user table
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

