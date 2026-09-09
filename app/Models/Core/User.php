<?php

namespace App\Models\Core;

use Illuminate\Foundation\Auth\User as Authenticatable;
// use App\Models\Procurement\PurchaseRequest;
// use App\Models\Procurement\ApprovalLog;
// use App\Models\Warehouse\GoodsReceipt;
// use App\Models\Finance\SupplierInvoice;

class User extends Authenticatable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

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
        'username',
        'email',
        'password',
        'full_name',
        'department_id',
        'is_active',
    ];

    /**
     * The attributes that should be hidden.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'department_id' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Get department of user.
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
     * Get departments managed by user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function managedDepartments()
    {
        return $this->hasMany(
            Department::class,
            'manager_user_id',
            'id'
        );
    }

    /**
     * Get roles of user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'role_user',
            'user_id',
            'role_id'
        );
    }

    /**
     * Get purchase requests created by user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseRequests()
    {
        return $this->hasMany(
            // PurchaseRequest::class, //09-09-2026 16:55   waiting for PurchaseRequest model to be created
            'requester_id',
            'id'
        );
    }

    /**
     * Get approval logs by user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function approvalLogs()
    {
        return $this->hasMany(
            // ApprovalLog::class, //09-09-2026 16:55   waiting for ApprovalLog model to be created
            'approver_id',
            'id'
        );
    }

    /**
     * Get goods receipts received by user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function goodsReceipts()
    {
        return $this->hasMany(
            // GoodsReceipt::class, //09-09-2026 16:55   waiting for GoodsReceipt model to be created
            'received_by',
            'id'
        );
    }

    /**
     * Get supplier invoices verified by user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function supplierInvoices()
    {
        return $this->hasMany(
            // SupplierInvoice::class, //09-09-2026 16:55   waiting for SupplierInvoice model to be created
            'verified_by',
            'id'
        );
    }

    /**
     * Get activity logs by user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activityLogs()
    {
        return $this->hasMany(
            // ActivityLog::class,  //09-09-2026 16:55    waiting for ActivityLog model to be created
            'user_id',
            'id'
        );
    }

    /**
     * Get attachments uploaded by user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachments()
    {
        return $this->hasMany(
            // Attachment::class, //09-09-2026 16:55   waiting for Attachment model to be created
            'uploaded_by',
            'id'
        );
    }
}
