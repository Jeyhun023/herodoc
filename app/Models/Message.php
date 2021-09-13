<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    
    public $table = "messages";
    
    protected $fillable = ['chat_id','user_id_from','user_id_to','content'];

    public function from_user()
    {
        return $this->belongsTo(User::class, 'user_id_from', 'id');
    }

    public function to_user()
    {
        return $this->belongsTo(User::class, 'user_id_to', 'id');
    }

}
