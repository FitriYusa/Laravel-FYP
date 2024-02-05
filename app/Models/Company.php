<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'user_type'
    ];

    public function jobs()
    {
        return $this->hasMany(jobList::class);
    }
}
