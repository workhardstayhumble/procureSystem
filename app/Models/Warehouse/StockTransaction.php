<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\Item;

class StockTransaction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_transactions';

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
        'warehouse_id',
        'item_id',
        'trx_type',
        'reference_type',
        'reference_id',
        'qty_in',
        'qty_out',
        'trx_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'warehouse_id' => 'integer',
        'item_id' => 'integer',
        'reference_id' => 'integer',
        'trx_date' => 'datetime',
    ];

    /**
     * Get warehouse of stock transaction.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function warehouse()
    {
        return $this->belongsTo(
            Warehouse::class,
            'warehouse_id',
            'id'
        );
    }

    /**
     * Get item of stock transaction.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(
            Item::class,
            'item_id',
            'id'
        );
    }
}
