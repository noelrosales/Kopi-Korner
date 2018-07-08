<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TransactionHeader extends Authenticatable
{
    use Notifiable;
    
    protected $table        = 'transaction_header';
    protected $primaryKey   = 'transaction_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'transaction_date',
        'status'
    ];

    /**
     * Get the transaction of each user
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
