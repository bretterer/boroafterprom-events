<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\CarbonTimeZone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->picked_up!= null ? $this->picked_up->setTimezone(new CarbonTimeZone('America/New_York'))->format('F d, Y') : 'N/A';
    }

    public function getDatePaidAttribute() {
        return $this->paid_on != null ? $this->paid_on->setTimezone(new CarbonTimeZone('America/New_York'))->format('F d, Y') : 'N/A';
    }

    public function getOrderDateAttribute() {
        return $this->created_at->format('F d, Y');
    }

}
