<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['parent_id', 'status', 'name', 'slug', 'meta_desc'];

    public function subcat()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('sort', 'ASC');
    }
}
