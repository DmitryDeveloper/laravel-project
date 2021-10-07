<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'category_id',
    ];

    /**
     * Get the category a product belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public $timestamps = false;
}
