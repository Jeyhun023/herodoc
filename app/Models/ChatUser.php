<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatUser extends Model
{
    use HasFactory;

    public $table = "chat_users";

    protected $fillable = ['user_id_from', 'user_id_to','last_activity'];
    protected $dates = ['last_activity']; 

    public function user_from()
    {
        return $this->belongsTo(User::class, 'user_id_from', 'id');
    }
    
    public function user_to()
    {
        return $this->belongsTo(User::class, 'user_id_to', 'id');
    }
    
    public function messages()
    {
        return $this->hasMany(ChatMessage::class, 'chat_id', 'id')->latest('id')->take(15);
    }

    public function last_message()
    {
        return $this->hasOne(ChatMessage::class, 'chat_id', 'id')->latest('id')->take(1);
    }
}
