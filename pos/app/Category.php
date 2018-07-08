<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Category extends Authenticatable
{
    use Notifiable;

    protected $table        = 'category';
    protected $primaryKey   = 'category_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name', 
        'category_description'
    ];

    /**
     * Get the products in each category
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
