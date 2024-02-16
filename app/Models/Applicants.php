<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
        'apply_status',
        'cv',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobList()
    {
        return $this->belongsTo(jobList::class);
    }
}
