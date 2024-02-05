<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobList extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'type',
        'salary',
        'start_date',
        'end_date',
        
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
