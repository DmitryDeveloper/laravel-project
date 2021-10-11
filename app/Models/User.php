<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public const ROLE_ADMIN = "admin";
    public const ROLE_MODERATOR = "moderator";
    public const ROLE_CUSTOMER = "customer";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'date',
        'updated_at' => 'date',
        'deleted_at' => 'date',
    ];

    /**
     * Set user password.
     *
     * @param string $value
     * @return void
     */
    public function setPasswordAttribute(string $value)
    {
        $this->attributes['password'] = password_hash($value, PASSWORD_DEFAULT);
    }
}
