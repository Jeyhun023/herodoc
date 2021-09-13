<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    use HasFactory;

    public $table = "user_comments";
    
    protected $fillable = ['from_user_id','to_user_id','content','rate'];

    public function user()
    {
        return $this->belongsTo(User::class, 'from_user_id', 'id');
    }
}
