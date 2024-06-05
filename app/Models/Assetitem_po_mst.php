<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assetitem_po_mst extends Model
{
    use HasFactory;

    // Define the primary key for the model
    protected $primaryKey = 'id';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'po_gen_id',
        'currency',
        'approver',
        'status',
        'LC_no',
        'LC_date',
        'workshop_id',
        'supplier_id',
        'company_id',
        'user_id',
        'updated_by',
    ];

    // Define relationships with other models

    // A PurchaseOrderMaster belongs to a Workshop
    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    // A PurchaseOrderMaster belongs to a Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // A PurchaseOrderMaster belongs to a Company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // A PurchaseOrderMaster belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(Assetitem_po_dtl::class);
    }

}

