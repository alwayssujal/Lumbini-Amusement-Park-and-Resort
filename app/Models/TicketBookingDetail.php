<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketBookingDetail extends Model
{
    use HasFactory;

    protected $table = 'ticket_booking_details';

    protected $primaryKey = 'id';

    protected $fillable = ['ticket_booking_id', 'ticket_id', 'quantity'];
}
