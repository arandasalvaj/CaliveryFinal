<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role_user extends Model
{
    use HasFactory;
    protected $table ='role_user';

    protected $fillable = ['id','role_id','user_id'];

    public function usuario()
    {
        return $this->hasOne(User::class);
    }
    public function rol()
    {
        return $this->hasOne(Role::class);
    }
}
