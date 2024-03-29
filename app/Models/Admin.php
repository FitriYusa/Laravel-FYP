<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'user_type'
    ];

    public function academy()
    {
        return $this->hasMany(Academy::class);
    }
}

