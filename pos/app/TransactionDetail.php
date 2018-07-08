<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TransactionDetail extends Authenticatable
{
    use Notifiable;
    
    protected $table        = 'transaction_detail';
    protected $primaryKey   = 'transaction_detail_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id', 
        'product_price_id'
    ];

    /**
     * Get product prices
     */
    public function productPrices()
    {
        return $this->hasMany('App\ProductPrice');
    }
}
