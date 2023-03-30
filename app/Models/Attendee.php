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

    protected $casts = [
        'checked_in' => 'datetime',
        'checked_out' => 'datetime',
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

    public function isGuest() {
        return $this->primary != null ? true : false;
    }

    /**
     * Get the attendees primary attendee
     * @return HasOne
     */
    public function primary() : HasOne {
        return $this->hasOne(Attendee::class, 'guest_id', 'id');
    }

    public function getDateCheckedInAttribute() {
        return $this->checked_in != NULL ? $this->checked_in->format('F d, Y h:i:s A') : 'N/A';
    }

    public function getDateCheckedOutAttribute() {
        return $this->checked_out != NULL ? $this->checked_out->format('F d, Y h:i:s A') : 'N/A';
    }

    public function getGuestNameAttribute() {
        return $this->guest != NULL ? $this->guest->first_name . ' ' . $this->guest->last_name : null;
    }

}

