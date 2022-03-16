<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'payment_type',
        'payment_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'paid_on' => 'datetime',
    ];

    public function guest()
    {
        return $this->hasOne(Guest::class);
    }
}
