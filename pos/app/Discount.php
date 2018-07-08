<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Discount extends Authenticatable
{
    use Notifiable;
    protected $table        = 'discount';
    protected $primaryKey   = 'discount_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'discount_type', 
        'percent_vat', 
        'vat_status', 
        'percent_discount', 
        'discount_status', 
        'status'
    ];
}
