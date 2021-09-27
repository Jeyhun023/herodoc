<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;
    
    public $table = "chat_messages";

    protected $fillable = ['chat_id', 'user_id','content'];
    
    public function chat()
    {
        return $this->belongsTo(ChatUser::class, 'chat_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
