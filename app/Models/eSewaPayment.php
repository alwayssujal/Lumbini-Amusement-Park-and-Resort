<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eSewaPayment extends Model
{
    use HasFactory;

    protected $fillable = ['amt', 'txAmt', 'psc', 'pdc', 'tAmt', 'pid', 'scd', 'su', 'fu'];
}
