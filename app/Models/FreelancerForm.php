<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerForm extends Model
{
    use HasFactory;

    public $table = "freelancer_forms";
    
    protected $fillable = ['fullname','education_level','education','skills','content','email','phone','address'];
}
