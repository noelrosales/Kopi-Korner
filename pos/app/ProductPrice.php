<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ProductPrice extends Authenticatable
{
    use Notifiable;
    protected $table        = 'product_price';
    protected $primaryKey   = 'product_price_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 
        'uom_id',
        'price',
        'promo_product',
        'status'
    ];

    /**
     * Get the uom
     */
    public function uom()
    {
        return $this->hasOne('App\Uom');
    }
    /**
     * Get the product
     */
    public function produc()
    {
        return $this->hasOne('App\Product');
    }
}
