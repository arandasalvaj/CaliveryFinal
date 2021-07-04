<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['quantity','subtotal','product_id','user_id'];
    protected $table ='cart';

    public function productos(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
