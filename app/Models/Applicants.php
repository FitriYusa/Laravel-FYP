<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    use HasFactory;

    protected $fillable = [
        'apply_status',
    ];

    protected $table = 'applicants';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(jobList::class, 'job_list_id');
    }

    // public static function isAppliedByUserJob($userId, $jobId)
    // {
    //     return static::where('user_id', $userId)->where('job_id', $jobId)->exists();
    // }


}
