<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_categories';

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
        'is_active',
    ];

    /**
     * Get items by category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function items()
    // {
    //     return $this->hasMany(Item::class, 'category_id', 'id');  //08-09-2026 11:59   waiting for Item model to be created
    // }
}
