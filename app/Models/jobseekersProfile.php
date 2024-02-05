<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class jobseekersProfile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'profile_image',
        'age',
        'phone_number',
        'gender',
        'language',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


