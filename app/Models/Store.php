<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table ='store';
    protected $fillable = ['id','name','address','cellphone','banner','email','logo','user_id'];
    
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    
}
