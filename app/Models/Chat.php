<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    
    public $table = "chats";
    
    protected $fillable = ['last_activity', 'code'];

    protected $dates = ['last_activity'];
    
    public function chat_users()
    {
        return $this->hasMany(ChatUser::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class)->latest()->take(15);
    }
    
    public function last_message()
    {
        return $this->hasOne(Message::class)->latest();
    }

    public function opponent_user()
    {
        return $this->hasOne(ChatUser::class)->where('user_id', '!=', auth()->user()->id)->latest();
    }
}
