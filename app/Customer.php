<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    
    public $timestamps = false;
    
    protected $fillable = [
        'name', 'cnp'
    ];

    public function transactions() {
        return $this->hasMany(Transaction::class, 'customerId');
    }
}
