<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Uom extends Authenticatable
{
    use Notifiable;
    
    protected $table        = 'uom';
    protected $primaryKey   = 'uom_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uom_val', 
        'description', 
        'status'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function productPrices()
    {
        return $this->hasMany('App\ProductPrice');
    }
}
