<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Relations\HasMany;
>>>>>>> d2046f5 (7 practice)

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
    ];
<<<<<<< HEAD
=======

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
>>>>>>> d2046f5 (7 practice)
}