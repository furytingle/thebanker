<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    
    public $timestamps = false;
    
    protected $fillable = [
        'customerId', 'amount'
    ];
    
    public function customer() {
        return $this->hasOne(Customer::class);
    }
}
