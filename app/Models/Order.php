<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
   


    public function order_product()
    {
        return $this->hasMany(OrderProducts::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }



}

