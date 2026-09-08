<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'units';

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
    ];

    /**
     * Get items by unit.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function items()
    // {
    //     return $this->hasMany(Item::class, 'unit_id', 'id');   //08-09-2026 08:38   waiting for Item model to be created
    // }
}
