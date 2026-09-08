<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'warehouses';


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
        'location',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get goods receipts by warehouse.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function goodsReceipts()
    {
        return $this->hasMany(
            // GoodsReceipt::class, // 09-08-2026 16:20   waiting for GoodsReceipt model to be created
            'warehouse_id',
            'id'
        );
    }

    /**
     * Get stock transactions by warehouse.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stockTransactions()
    {
        return $this->hasMany(
            // StockTransaction::class, // 09-08-2026 16:21   waiting for StockTransaction model to be created
            'warehouse_id',
            'id'
        );
    }
}