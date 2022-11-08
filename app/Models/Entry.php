<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'comment',
        'amount'
    ];

    public function category()
    {
        return $this->hasMany(Category::class)
    };


}
