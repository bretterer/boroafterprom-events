<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Attendee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'event_id'
    ];

    /**
     * Get the ticket for the attendee
     * @return HasOne
     */
    public function ticket() : HasOne {
        return $this->hasOne(Ticket::class);
    }

    /**
     * Get the attendees guest
     * @return BelongsTo
     */
    public function guest() : BelongsTo {
        return $this->belongsTo(Attendee::class, 'guest_id');
    }

    /**
     * Get the attendees primary attendee
     * @return HasOne
     */
    public function primary() : HasOne {
        return $this->hasOne(Attendee::class, 'guest_id', 'id');
    }
}

