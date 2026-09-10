<?php

namespace App\Models\Procurement;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\Item;

class PurchaseRequestItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'purchase_request_items';

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
        'purchase_request_id',
        'item_id',
        'qty',
        'estimated_price',
        'notes',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'purchase_request_id' => 'integer',
        'item_id' => 'integer',
    ];

    /**
     * Get purchase request of this item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchaseRequest()
    {
        return $this->belongsTo(
            PurchaseRequest::class,
            'purchase_request_id',
            'id'
        );
    }

    /**
     * Get item of purchase request.
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
