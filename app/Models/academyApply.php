<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class academyApply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'job_id', 
        'status', 
        'cover_letter'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }
}
