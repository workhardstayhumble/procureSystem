<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'suppliers';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'tax_no',
        'email',
        'phone',
        'address',
        'is_active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];


    public function purchaseOrders()
    {
        return $this->hasMany(
            // PurchaseOrder::class,  // 09-08-2026 14:39   waiting for PurchaseOrder model to be created
            'supplier_id',
            'id'
        );
    }

    public function supplierInvoices()
    {
        return $this->hasMany(
            // SupplierInvoice::class, // 09-08-2026 14:41   waiting for SupplierInvoice model to be created
            'supplier_id',
            'id'
        );
    }
}
