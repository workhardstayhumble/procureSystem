<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departments';

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
        'manager_user_id',
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

    /**
     * Get manager of department.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manager()
    {
        return $this->belongsTo(
            User::class,
            'manager_user_id',
            'id'
        );
    }

    /**
     * Get users by department.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(
            User::class,
            'department_id',
            'id'
        );
    }
}
