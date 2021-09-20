<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cache;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'fullname',
        'username',
        'jobname',
        'description',
        'education',
        'skills',
        'languages',
        'city',
        'image',
        'email',
        'password',
    ];

    protected $guarded = ['isFreelance','rate'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments()
    {
        return $this->hasMany(UserComment::class, 'to_user_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
    
    public function chat_users()
    {
        return $this->hasMany(ChatUser::class);
    }

    public function chat_user()
    {
        return $this->hasOne(ChatUser::class);
    }
}
