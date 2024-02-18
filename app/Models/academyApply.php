<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class academyApply extends Model
{
    use HasFactory;

    protected $fillable = [
        'apply_status'
    ];
    protected $table = 'academy_applies';

    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
