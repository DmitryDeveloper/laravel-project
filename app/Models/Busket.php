<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Busket extends Model
{
    use HasFactory;

    protected $table="busket";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'product_id',
    ];

    /**
     * Get the category a product belongs to.
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public $timestamps = true;
}
