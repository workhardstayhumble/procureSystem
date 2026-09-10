<?php

namespace App\Models\Procurement;

use Illuminate\Database\Eloquent\Model;
use App\Models\Core\User;
use App\Models\Core\Department;

class PurchaseRequest extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'purchase_requests';

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
        'pr_no',
        'requester_id',
        'department_id',
        'request_date',
        'required_date',
        'status',
        'purpose',
        'total_estimate',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'requester_id' => 'integer',
        'department_id' => 'integer',
        'request_date' => 'datetime',
        'required_date' => 'datetime',
    ];

    /**
     * Get requester of purchase request.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function requester()
    {
        return $this->belongsTo(
            User::class,
            'requester_id',
            'id'
        );
    }

    /**
     * Get department of purchase request.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(
            Department::class,
            'department_id',
            'id'
        );
    }

    /**
     * Get items by purchase request.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseRequestItems()
    {
        return $this->hasMany(
            // PurchaseRequestItem::class, // 10-09-2026 14:58   waiting for PurchaseRequestItem model to be created
            'purchase_request_id',
            'id'
        );
    }

    /**
     * Get purchase orders by purchase request.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseOrders()
    {
        return $this->hasMany(
            // PurchaseOrder::class, // 10-09-2026 15:00   waiting for PurchaseOrder model to be created
            'purchase_request_id',
            'id'
        );
    }
}
