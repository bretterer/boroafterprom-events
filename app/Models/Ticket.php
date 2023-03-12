<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    /**
     * Get the attendee that the ticket belongs to
     */
    public function attendee() {
        return $this->belongsTo(Attendee::class, 'id', 'ticket_id');
    }
}
