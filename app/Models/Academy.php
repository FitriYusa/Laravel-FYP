<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        //'image',
        'location',
        'type',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'is_active',
        
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function applicants()
    {
        return $this->hasMany(AcademyApply::class);
    }

    public function isAppliedByUser($userId)
    {
        return $this->applicants()->where('user_id', $userId)->exists();
    }
    

    public function academyApplications()
    {
        return $this->hasMany(academyApply::class);
    }
}
