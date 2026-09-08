<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';

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
        'category_id',
        'unit_id',
        'sku',
        'name',
        'min_stock',
        'is_active',
    ];

    protected $casts = [
        'min_stock' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Get category of item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(
            ItemCategory::class,
            'category_id',
            'id'
        );
    }

    /**
     * Get unit of item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(
            Unit::class,
            'unit_id',
            'id'
        );
    }

    /**
     * Get purchase request items by item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseRequestItems()
    {
        return $this->hasMany(
            // PurchaseRequestItem::class,  //08-09-2026 23:24   waiting for Item model to be created
            'item_id',
            'id'
        );
    }

    /**
     * Get purchase order items by item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseOrderItems()
    {
        return $this->hasMany(
            // PurchaseOrderItem::class, //08-09-2026 23:24   waiting for Item model to be created
            'item_id',
            'id'
        );
    }

    /**
     * Get stock transactions by item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stockTransactions()
    {
        return $this->hasMany(
            // StockTransaction::class, //08-09-2026 23:24   waiting for Item model to be created
            'item_id',
            'id'
        );
    }
}
