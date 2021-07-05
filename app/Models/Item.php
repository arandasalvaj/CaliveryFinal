<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    //id	name	quantity	price	detail	img	color	size	product_id	order_id	created_at	updated_at
    protected $fillable = ['name','quantity','price','detail','img','color','size'];
    protected $table ='item';
}
