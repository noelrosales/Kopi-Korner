<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Product extends Authenticatable
{
    use Notifiable;
    protected $table        = 'product';
    protected $primaryKey   = 'product_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 
        'product_name',
        'product_description',
        'status'
    ];

    /**
     * Get the product prices
     */
    public function productPrices()
    {
        return $this->hasMany('App\ProductPrice');
    }
    /**
     * Get the product category
     */
    public function products()
    {
        return $this->hasOne('App\Category');
    }
}

