<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;

    /**
     * Get the ticket for the attendee
     */
    public function ticket() {
        return $this->hasOne(Ticket::class, 'id', 'ticket_id');
    }
}
