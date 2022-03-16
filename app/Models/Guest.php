<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
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

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
