<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketBooking extends Model
{
    use HasFactory;

    protected $table = 'ticket_booking';

    protected $primaryKey = 'id';

    protected $fillable = ['orderNo', 'users_id', 'ticketDate', 'bookingDate', 'isCancelled', 'isPaid', 'paidDate', 'isVerified'];

    public function details(){
        return $this->hasMany(TicketBookingDetail::class);
    }
}
