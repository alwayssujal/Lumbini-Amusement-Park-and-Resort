<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhaltiPayment extends Model
{
    use HasFactory;

    protected $fillable = ['productIdentity', 'productName', 'productUrl', 'amount'];
}
