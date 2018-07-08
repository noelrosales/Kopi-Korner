<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Receipt extends Authenticatable
{
    use Notifiable;
    
    protected $table        = 'receipt';
    protected $primaryKey   = 'receipt_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'receipt_no', 
        'transaction_id',
        'total_amount',
        'vat',
        'discount'
    ];
}
