<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_profile',
        'name',
        'age',
        'gender',
        'language',
        'location',
        'email',
        'password',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function jobseekersProfile()
    {
        return $this->hasOne(jobseekersProfile::class);
    }
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function jobApplications()
    {
        return $this->hasMany(academyApply::class);
    }
    
    public function jobLists()
    {
        return $this->hasMany(JobList::class, 'company_id');

    }

    public function academyApplies()
    {
        return $this->hasMany(academyApply::class, 'user_id');
    }

    public function applicants()
    {
        return $this->hasMany(Applicants::class, 'user_id');
    }

}
