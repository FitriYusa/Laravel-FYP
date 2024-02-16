<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobList extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'description',
        'location',
        'type',
        'salary',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'is_active',//status
        
    ];

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id')->where('user_type', 'company');
    }

    public function applicants()
    {
        return $this->hasMany(Applicants::class);
    }
}
