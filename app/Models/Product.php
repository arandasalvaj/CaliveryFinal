<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','stock','detail','status','img','category_id','size','store_id','price','id','color',];
    protected $table ='product';

    
}
