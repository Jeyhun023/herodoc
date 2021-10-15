<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email2 extends Model
{
    use HasFactory;
    
    public $table = "emails2";

    protected $fillable = ['email', 'fullname'];
}
