<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Ticket extends Model
{
    use HasFactory;
    use Uuids;

    protected $fillable = [
        'event_id'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'paid_on' => 'datetime',
    ];

    /**
     * Get the attendee that the ticket belongs to
     */
    public function attendee() {
        return $this->belongsTo(Attendee::class);
    }

    public function getDatePickedUpAttribute() {
        return $this->picked_up!= null ? $this->picked_up->format('F d, Y') : 'N/A';
    }

    public function getDatePaidAttribute() {
        return $this->paid_on != null ? $this->paid_on->format('F d, Y') : 'N/A';
    }

}
